<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Models\Admin\images;
use App\Models\Admin\vendor;
use Illuminate\Http\Request;
use App\Models\Admin\product;
use App\Models\Admin\category;
use App\Models\Admin\manufacturer;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

use function PHPSTORM_META\elementType;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    public function index()
    {
        $data['products'] = DB::table('products')->orderBy('id', 'DESC')->paginate(10);
        $data['category'] = category::all();
        $data['manufacturer'] = manufacturer::all();
        return view('admin.products_view', $data);
    }


    public function filter(Request $request)
    {
        $query = DB::table('products');
        if ($request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('price', 'like', '%' . $request->search . '%')
                ->orWhere('keyword', 'like', '%' . $request->search . '%')
                ->orWhere('short_desc', 'like', '%' . $request->search . '%');
        }
        if ($request->category != 'all') {
            $data['products'] = $query->Where('cat_id', $request->category);
        }
        if ($request->manufacturer != 'all') {
            $data['products'] = $query->Where('manufac_id', $request->manufacturer);
        }
        if ($request->status != 'all') {
            $data['products'] = $query->Where('status', $request->status);
        }
        if ($request->entries != 'all') {
            $data['products'] = $query->orderBy('updated_at', 'DESC')->paginate($request->entries);
        } else {
            $data['products'] = $query->orderBy('updated_at', 'DESC')->get();
        }
        return view('admin.productsajax.products_ajax', $data)->render();
    }

    public function create()
    {
        $data['manufacturer'] = manufacturer::all();
        $data['category'] = category::all();
        $data['vendor'] = vendor::all();
        $data['variant_type'] = DB::table('variants_types')->get();
        $data['variants'] = DB::table('variants')->get();
        return view('admin.products')->with($data);
    }

    public function store(Request $req)
    {
      
    //   return response()->json(['status' => 'success', 'message' => $a]);
        if ($req->ajax()) {
            $validator = Validator::make($req->all(), [
                'name' => 'required|min:20',
                'price' => 'required',
                'category' => 'required',
                'manufacturer' => 'required',
                'vendor' => 'required',
                'short_des' => 'required',
                'long_des' => 'required',
                'main_image' => 'required|max:1',
                'main_image.*' => 'mimes:jpeg,png,jpg,webp',
                'product_images' => 'required|max:100',
                'product_images.*' => 'mimes:jpeg,png,jpg,webp',
            ], []);

            if ($validator->fails()) {
                return response()->json(['status' => 'error', 'errors' => $validator->errors()->toArray()]);
            } else {
                if ($req->hasFile('main_image')) {
                    $files = $req->file('main_image');
                    $file = $files[0];
                    $orginalImageName = $file->getClientOriginalName();
                    $newImgName = Str::slug(date('YmdHis') . '-' . $orginalImageName) . '.' . $file->extension();
                    $file->storeAs('public/images/products', $newImgName);
                }
                $date = date('Y-m-d H:i:s');
                $data = [
                    "name" => $req->name,
                    'slug' => Str::slug($req->name . '-' . date('YmdHis')),
                    "price" => $req->price,
                    "discount_price" => $req->price_discount != null ? $req->price_discount : 0,
                    "short_desc" => $req->short_des,
                    "long_desc" => $req->long_des,
                    "keyword" => $req->keywords,
                    "status" => $req->status,
                    "qty" => $req->qty,
                    "cat_id" => $req->category,
                    "manufac_id" => $req->manufacturer,
                    "vendor_id" => $req->vendor,
                    "featured" => $req->feature != null ? $req->feature : 0,
                    "image" => $newImgName,
                    'created_at' => $date,
                    'updated_at' => $date
                ];

                $pid = DB::table('products')->insertGetId($data);
                // $a = count($req->v_name);
                foreach( $req->variant_name as $index => $v_name ) {
                    $variantdata = [
                        'product_id' =>$pid,
                        'variant_type_id'=>$req->attr_name,
                        'variant_id'=>$v_name,
                        'price'=>$req->variant_price[$index],
                        'created_at'=>$date,
                        'updated_at'=>$date
                    ];
                    DB::table('productvariantvalues')->insert($variantdata);
                 }
             

                if ($req->hasFile('product_images')) {
                    $product = product::all()->last();
                    //multiple images upload method
                    $files = $req->file('product_images');
                    foreach ($files as $file) {
                        $orginalImageName = $file->getClientOriginalName();
                        $newImgName = Str::slug(date('YmdHis') . '-' . $orginalImageName) . '.' . $file->extension();
                        $file->storeAs('public/images/products', $newImgName);
                        // $imageName = time().'.'.$file->extension();  
                        // $file->move(public_path('assets/images/products'), $imageName); 
                        $imgdata['product_id'] = $product->id;
                        $imgdata['images'] = $newImgName;
                        images::create($imgdata);
                        // DB::table('images')->insert($imgdata);
                    }
                }
            }
            return response()->json(['status' => 'success', 'message' => 'Product Has Been Created Successfully...']);
        }
        // return redirect()->back()->with('success', 'Product Has been Inserted Successfully...');
    }


    public function delete(Request $request)
    {
        $id = $request->id;
        $product = product::findOrFail($id);
        $img = images::where("product_id", $product->id);
        if (File::exists("storage/images/products/" . $product->image)) {
            File::delete("storage/images/products/" . $product->image);
        }
        $images = $img->get();
        foreach ($images as $image) {
            if (File::exists("stoarge/images/products/" . $image->images)) {
                File::delete("storage/images/products/" . $image->images);
            }
        }
        $product->delete();
        $img->delete();
        DB::table('productvariantvalues')->where('product_id',$id)->delete();
        // return back()->with('success','Product Has been Deleted Successfully...');
        return response()->json(['status' => 'success', 'message' => 'Product Has been Deleted Successfully...']);
    }

    public function update_status(Request $request)
    {
        $id = $request->id;
        $product = product::find($id);
        $product->status = $request->status;
        $product->save();
        return response()->json(['status' => 'success', 'message' => 'Status Updated Successfully....']);
    }

    public function edit($id)
    {
        $data['product'] = product::findOrFail($id);
        // $images = images::all();
        $data['images'] = images::where("product_id", $id)->get();
        // dd($images);
        $data['category'] = DB::table('category')->get();
        $data['manufacturer'] = DB::table('manufacturer')->get();
        $data['vendor'] = DB::table('vendor')->get();
        $data['variant_type'] = DB::table('variants_types')->get();
        $data['variants'] = DB::table('variants')->get();
        $data['variants_values'] = DB::table('productvariantvalues')->where('product_id',$id)->orderBy('price','ASC')->get();
        $data['variants_values_count'] = count($data['variants_values']);
        $data['variant_value'] = DB::table('productvariantvalues')->where('product_id',$id)->first();
        return view('admin.product_update', $data);
    }

    public function update($id, Request $req)
    {
        if ($req->ajax()) {
            $validator = Validator::make($req->all(), [
                'name' => 'required|min:20',
                'price' => 'required',
                'category' => 'required',
                'manufacturer' => 'required',
                'vendor' => 'required',
                'short_des' => 'required',
                'long_des' => 'required',
                'main_image' => 'nullable|max:1',
                'main_image.*' => 'mimes:jpeg,png,jpg,webp',
                'product_images' => 'nullable|max:100',
                'product_images.*' => 'mimes:jpeg,png,jpg,webp',
            ], []);

            if ($validator->fails()) {
                return response()->json(['status' => 'error', 'errors' => $validator->errors()->toArray()]);
            } else {

                $product = product::findOrFail($id);
                if ($req->hasFile('main_image')) {

                    if (File::exists("assets/images/products/" . $product->image)) {

                        File::delete("assets/images/products/" . $product->image);
                    }

                    $files = $req->file('main_image');
                    $file = $files[0];
                    $orginalImageName = $file->getClientOriginalName();
                    $newImgName = Str::slug(date('YmdHis') . '-' . $orginalImageName) . '.' . $file->extension();
                    $file->storeAs('public/images/products', $newImgName);
                    $req['image'] = $newImgName;
                } else {
                    $newImgName = $product->image;
                }
                $date = date('Y-m-d H:i:s');
                $data = [

                    "name" => $req->name,
                    'slug' => Str::slug($req->name . '-' . date('YmdHis')),
                    "price" => $req->price,
                    "discount_price" => $req->price_discount,
                    "short_desc" => $req->short_des,
                    "long_desc" => $req->long_des,
                    "keyword" => $req->keywords,
                    "status" => $req->status,
                    "qty" => $req->qty,
                    "cat_id" => $req->category,
                    "manufac_id" => $req->manufacturer,
                    "vendor_id" => $req->vendor,
                    "image" => $newImgName,
                    'updated_at' => $date
                ];

                DB::table('products')->where('id', $id)->update($data);

                if ($req->hasFile('product_images')) {
                    //multiple images upload method
                    $files = $req->file('product_images');
                    foreach ($files as $file) {
                        $orginalImageName = $file->getClientOriginalName();
                        $newImgName = Str::slug(date('YmdHis') . '-' . $orginalImageName) . '.' . $file->extension();
                        $file->storeAs('public/images/products', $newImgName);
                        $imgdata['product_id'] = $id;
                        $imgdata['images'] = $newImgName;
                        images::create($imgdata);
                    }
                }

                foreach( $req->variant_name as $index => $v_name ) {
                    $variant_updatedata = [
                        'variant_type_id'=>$req->attr_name,
                        'variant_id'=>$v_name,
                        'price'=>$req->variant_price[$index],
                        'updated_at'=>$date
                    ];
                    
                    DB::table('productvariantvalues')->where('id',$req->variant_id[$index])->update($variant_updatedata);
                 }
                 if($req->variant_name_new!=null)
                 {
                     foreach ($req->variant_name_new as $key => $v_name) {
                        $variant_insertdata = [
                            'product_id'=>$id,
                            'variant_type_id'=>$req->attr_name,
                            'variant_id'=>$v_name,
                            'price'=>$req->variant_price_new[$key],
                            'created_at'=>$date,
                            'updated_at'=>$date
                        ];
                        DB::table('productvariantvalues')->insert($variant_insertdata);
                     }
                 }
            }
            // return redirect('admin/products/list')->with('success', 'Product Has been Updated Successfully...');
            return response()->json(['status'=>'success','message'=>'Product Has Been Updated Successfully...']);
        }
    }



    public function image_delete($id)
    {
        $images = images::findOrFail($id);
        if (File::exists("storage/images/products/" . $images->images)) {
            File::delete("storage/images/products/" . $images->images);
        }
        $images->delete();
        return response()->json(['status' => 'success', 'message' => 'Image Deleted Successfully....']);
    }

    public function variant_delete(Request $request)
    {
        
        DB::table('productvariantvalues')->where('id',$request->id)->delete();
        return response()->json(['status' => 'success', 'message' => 'Variant Deleted Successfully....']);
    }
}
