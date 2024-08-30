<?php

namespace App\Http\Controllers\Admin;
use App\Models\Admin\slider;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class slidercontroller extends Controller
{
    public function index()
    {
        $data['sliders'] = slider::all();
        return view('admin.slider_view',$data);
    }

    public function create()
    {
        return view('admin.slider');
    }
    
    
    public function store(Request $req)
    {
        $req->validate(
            [
            'main_image'=>'required|min:1|max:1',
            'main_image.*'=>'mimes:jpeg,png,jpg',
            'intro' => 'required',
            'title' => 'required',
            'status' => 'required'
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

        $slider = new slider;
        $slider->image = $newImgName;    
        $slider->intro = $req->intro;    
        $slider->title = $req->title;    
        $slider->status = $req->status;    
        $slider->save();

        return redirect()->back()->with('success','slider Has been Inserted Successfully...');
    }


    public function delete($id)
        {
            slider::find($id)->delete();
            return redirect()->back()->with('success','slider Has been Deleted Successfully...');
            // return response()->json([
            //     'status'=>200,
            //     'message'=> "Data Deleted Successfully...",
            // ]);
            
        }

        public function edit($id)
        {
            
            $data['slider'] = slider::find($id);
            return view('admin.slider_update',$data);
        }

        public function update($id, Request $req)
        {
            
        $slider = slider::find($id);
        
        if($req->hasFile('main_image'))
        {

            if(File::exists("storage/images/products/".$slider->image))
            {

                File::delete("storage/images/products/".$slider->image);
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
            
            $newImgName = $slider->image;
           
        }
        $slider->image = $newImgName;
        $slider->intro = $req['intro'];
        $slider->title = $req['title'];
        $slider->status = $req['status'];
        $slider->save();
        return redirect('admin/slider/list')->with('success','slider Has been Upated Successfully...');

        }

}
