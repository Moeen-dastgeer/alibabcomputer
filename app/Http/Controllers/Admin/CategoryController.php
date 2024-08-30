<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\category;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        
        $data['category'] = DB::table('category')->orderBy('updated_at','DESC')->paginate(10);
        return view('admin.categories_view',$data);
        

    }

    
    public function create()
    {
        return view('admin.categories');
    }

    public function store(Request $req)
    {

        $req->validate(
            [
            'name' => 'required',
            'image' => 'required|image|dimensions:max_width=178,min_width=178,max_height=178,min_height=178'
            ],
            [
                'image.dimensions' => "Invalid Image size please upload 178 x 178 image",
            ]
        );
        
        $category = new category();
        $category->name = $req['name'];
        $imageName = time().'.'.$req->image->extension();  
        $req->image->move(public_path('assets/images/category'), $imageName);
        $category->image = $imageName;
        $category->slug = Str::slug($req['name']);
        $category->status = $req['status'];
        $category->show_on_nav = $req['show_on_nav']==1?1:0;
        $category->save();
        return redirect()->back()->with('success','Category Has been Inserted Successfully...');
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        category::find($id)->delete();
        return response()->json(['status'=>'success','message'=>'Category Has Been Deleted Successfully....']);

    }

    


    public function edit($id)
        {
            
            $category = category::find($id);
            $data = compact('category');
            return view('admin.category_update')->with($data);
        }





        public function update(Request $request)
        {
            $request->validate(
                [
                'name' => 'required',
                'image' => 'nullable|image|dimensions:max_width=178,min_width=178,max_height=178,min_height=178'
                ],
                [
                    'image.dimensions' => "Invalid Image size please upload 178 x 178 image",
                ]
            );
            
            $id = $request->id;  
            $category = category::find($id);
            $category->name = $request['name'];
            $category->slug = Str::slug($request['name']);
            if($request->hasfile('image'))
            {    
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('assets/images/category'), $imageName);
            $category->image = $imageName;   

            }
            else
            { 
            $image = $category->image;
            $category->image = $image;
            }        
            $category->status = $request['status'];
            $category->show_on_nav = $request['show_on_nav']==1?1:0;
            $category->save();
            return redirect('admin/categories/list')->with('success','Category Has been Updated Successfully...');

        }

        public function update_status(Request $request)
        {
            $id = $request->id;
            $category = category::find($id);
            $category->status = $request->status; 
            $category->save();
         return response()->json(['status'=>'success','message'=>'Status Updated Successfully....']);            
        }
        

        public function categories_ajax(Request $request)
        {
            $query = DB::table('category');
        if ($request->from !='' AND $request->to !='') {
            $query->whereBetween('created_at', [$request->from.' 00:00:00', $request->to.' 23:59:59']);
        }

        if ($request->s_status !='') {
            $query->where('status',$request->s_status);
        }
        
        if ($request->search != '') {
            $query->where('status','like','%'.$request->search.'%')
            ->orWhere('name','like','%'.$request->search.'%')
            ->orWhere('slug','like','%'.$request->search.'%');
        }
        // $data['orders'] = $query->orderBy('updated_at','DESC')->get();
        $data['category'] = $query->orderBy('updated_at','DESC')->paginate(10);
        return view('admin.category.categoryajax',$data)->render();

        }


}
