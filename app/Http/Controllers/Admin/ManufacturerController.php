<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Models\Admin\manufacturer;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ManufacturerController extends Controller
{
    public function index()
    {
        $data['manufacturer'] = DB::table('manufacturer')->orderBy('updated_at','DESC')->paginate(10);
        return view('admin.manufacturer_view')->with($data);
        
    }

    public function create()
    {
    return view('admin.manufacturer');
    }

    public function store(Request $req)
    {
        $req->validate(
            [
            'name' => 'required',
            'image' => 'required|image'
            ]
        );

        $manufacturer = new manufacturer();
        $manufacturer->name = $req['name'];
        $imageName = time().'.'.$req->image->extension();  
        $req->image->move(public_path('assets/images/manufacturer'), $imageName);
        $manufacturer->image = $imageName;
        $manufacturer->status = $req['status'];
        $manufacturer->save();

        return redirect()->back()->with('success','New Manufacturer Has been Added');
    }

    public function update_status(Request $request)
    {
        $id = $request->id;
        $manufacturer = manufacturer::find($id);
        $manufacturer->status = $request->status; 
        $manufacturer->save();
     return response()->json(['status'=>'success','message'=>'Status Updated Successfully....']);            
    }
    
    public function delete(Request $request)
    {
        $id = $request->id;
        manufacturer::find($id)->delete();
        return response()->json(['status'=>'success','message'=>'Manufacturer Has been Deleted']);
    }


    public function edit($id)
        {
            
            $manufacturer = manufacturer::find($id);
            $data = compact('manufacturer');
            return view('admin.manufacturer_update')->with($data);
        }

        
        public function update($id, Request $req)
        {
            $req->validate(
                [
                'name' => 'required',
                'image' => 'nullable|image'
                ]
            );
            
        $manufacturer = manufacturer::find($id);
        $manufacturer->name = $req['name'];

        if($req->hasfile('image'))
        {    
        $imageName = time().'.'.$req->image->extension();  
        $req->image->move(public_path('assets/images/manufacturer'), $imageName);
        $manufacturer->image = $imageName;   

        }
        else
        {
            
        $image = $manufacturer->image;
        $manufacturer->image = $image;
        }        


        $manufacturer->status = $req['status'];
        $manufacturer->save();
        
        return redirect('admin/manufacturer/list')->with('success','Manufacturer Has been Updated');

        }



        public function manufacturer_ajax(Request $request)
        {
            
                $query = DB::table('manufacturer');
                if ($request->from !='' AND $request->to !='') {
                $query->whereBetween('created_at', [$request->from.' 00:00:00', $request->to.' 23:59:59']);
                }

                if ($request->s_status !='') {
                    $query->where('status',$request->s_status);
                }

                if ($request->search != '') {
                    $query->where('status','like','%'.$request->search.'%')
                    ->orWhere('name','like','%'.$request->search.'%');
                }
               
                $data['manufacturer'] = $query->orderBy('updated_at','DESC')->paginate(10);

                return view('admin.manufacturer.manufacturerajax',$data)->render();
        }


}
