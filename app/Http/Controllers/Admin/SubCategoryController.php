<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\Subcategory;
use App\Models\Admin\category;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        $subcat = Subcategory::all();
        $data = compact('subcat');
        return view('admin.sub-categories_view')->with($data);
    }

    public function create()
    {
        $cat = category::all();
        $data = compact('cat');
        return view('admin.sub-categories')->with($data);
    }


    public function store(Request $req)
    {
        
        
        $subcat = new Subcategory();
        $subcat->cat_id = $req->subcat;
        $subcat->name = $req['name'];
        $imageName = time().'.'.$req->image->extension();  
        $req->image->move(public_path('assets/images/subcategory'), $imageName);
        $subcat->image = $imageName;
        $subcat->status = $req['status'];
        $subcat->save();

        return redirect('admin/sub-categories');
    }


    
    public function delete($id)
    {
        Subcategory::find($id)->delete();
        return redirect()->back();
    }
    


}

