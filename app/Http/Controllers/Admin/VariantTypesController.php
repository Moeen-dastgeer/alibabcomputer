<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class VariantTypesController extends Controller
{
    public function index()
    {
        
        $data['variants'] = DB::table('variants_types')->orderBy('updated_at','DESC')->paginate(10);
        return view('admin.variants_view',$data);
        

    }

    
    public function create()
    {
        return view('admin.variants');
    }

    public function store(Request $request)
    {

        $request->validate(
            [
            'name' => 'required'
            ],
            [
            ]
        );
        
        $date = date('Y-m-d H:i:s');
        $Data = [
            'name' =>$request->name,
            'status'=>$request->status,
            'created_at'=>$date,
            'updated_at'=>$date,
        ];
        DB::table('variants_types')->insert($Data);
        return redirect()->back()->with('success','Product Variant Has been Inserted Successfully...');
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        DB::table('variants_types')->where('id', $id)->delete();
        return response()->json(['status'=>'success','message'=>'Product Variant Has Been Deleted Successfully....']);

    }

    


    public function edit($id)
        {
           
            $data['variant'] = DB::table('variants_types')->where('id',$id)->first();
            // dd($data['variant']);
            return view('admin.variant_update',$data);
        }





        public function update(Request $request)
        {
            $request->validate(
                [
                'name' => 'required'
                ],
                [
                ]
            );
            $id = $request->id;
            $date = date('Y-m-d H:i:s');
            $data = [
                'name'=>$request->name,
                'status'=>$request->status,
                'updated_at'=>$date
            ];
            DB::table('variants_types')->where('id', $id)->update($data);
            return redirect('admin/products-variant/list')->with('success','Product Variant Has been Updated Successfully...');

        }

        public function update_status(Request $request)
        {
            $id = $request->id;
            DB::table('variants_types')->where('id', $id)->update(array('status' =>$request->status));
         return response()->json(['status'=>'success','message'=>'Status Updated Successfully....']);            
        }
        

        public function variants_ajax(Request $request)
        {
            $query = DB::table('variants_types');
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
        $data['variants'] = $query->orderBy('updated_at','DESC')->paginate(10);
        return view('admin.variants.variants_ajax',$data)->render();

        }
}
