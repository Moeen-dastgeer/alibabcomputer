<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin\brand;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class brandController extends Controller
{
    public function index()
    {
        $data['brands'] = brand::all();
        return view('admin.brand_view',$data);
    }

    public function create()
    {
        return view('admin.brand');
    }
    
    
    public function store(Request $req)
    {
        $req->validate(
            [
            'main_image'=>'required|min:1|max:1',
            'main_image.*'=>'mimes:jpeg,png,jpg',
            'description' => 'required'
            ]
        );

        
        if($req->hasFile('main_image'))
        {
            $files = $req->file('main_image');
            $file = $files[0];
            $orginalImageName = $file->getClientOriginalName();
            $newImgName = Str::slug(date('YmdHis').'-'.$orginalImageName).'.'.$file->extension();
            $file->storeAs('public/images/products', $newImgName);
        }

        $brand = new brand;
        $brand->image = $newImgName;    
        $brand->description = $req->description;    
        $brand->status = $req->status;    
        $brand->save();

        return redirect()->back()->with('success','brand Has been Inserted Successfully...');
    }


    public function delete($id)
        {
            brand::find($id)->delete();
            return redirect()->back()->with('success','brand Has been Deleted Successfully...');
            // return response()->json([
            //     'status'=>200,
            //     'message'=> "Data Deleted Successfully...",
            // ]);
            
        }

        public function edit($id)
        {
            
            $data['brand'] = brand::find($id);
            return view('admin.brand_update',$data);
        }

        public function update($id, Request $req)
        {
            $req->validate(
                [
                'main_image'=>'nullable|min:1|max:1',
                'main_image.*'=>'mimes:jpeg,png,jpg',
                'description' => 'required'
                ]
            );   
        $brand = brand::find($id);
        
        if($req->hasFile('main_image'))
        {

            if(File::exists("storage/images/products/".$brand->image))
            {

                File::delete("storage/images/products/".$brand->image);
            }

            $files = $req->file('main_image');
            $file = $files[0];
            $orginalImageName = $file->getClientOriginalName();
            $newImgName = Str::slug(date('YmdHis').'-'.$orginalImageName).'.'.$file->extension();
            $file->storeAs('public/images/products', $newImgName);
            $req['main_image'] = $newImgName;
    
        }
        else
        {
            
            $newImgName = $brand->image;
           
        }
        $brand->image = $newImgName;
        $brand->description = $req['description'];
        $brand->status = $req['status'];
        $brand->save();
        return redirect('admin/brand/list')->with('success','brand Has been Upated Successfully...');

        }

}
