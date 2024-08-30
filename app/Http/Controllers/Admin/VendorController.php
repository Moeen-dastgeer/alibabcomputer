<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function index()
    {
        $vendors = vendor::all();
        $data = compact('vendors');
        return view('admin.vendor_view')->with($data);
        
    }

    public function view($id)
    {
        $vendor = vendor::find($id);
        $data = compact('vendor');
        return view('admin.vendor_view1')->with($data);            

    }

    public function create()
    {
        return view('admin.vendor');
    }

    public function store(Request $req)
    {
        $req->validate(
            [
            'name' => 'required'
            ]
        );

        $vendor = new vendor;
        $vendor->name = $req['name'];
        $vendor->phone = $req['phone'];
        $vendor->telephone = $req['telephone'];
        $vendor->address = $req['address'];
        $vendor->city = $req['city'];
        $vendor->person_name = $req['person_name'];
        $vendor->status = $req['status'];
        $vendor->note = $req['note'];
        $vendor->save();

        return redirect()->back()->with('success','Vendor Has been Inserted Successfully...');
    }

        public function delete($id)
        {
            vendor::find($id)->delete();
            return redirect()->back()->with('success','Vendor Has been Deleted Successfully...');
            // return response()->json([
            //     'status'=>200,
            //     'message'=> "Data Deleted Successfully...",
            // ]);
            
        }

        public function edit($id)
        {
            
            $vendor = vendor::find($id);
            $data = compact('vendor');
            return view('admin.vendor_update')->with($data);
        }

        public function update($id, Request $req)
        {
            $req->validate(
            [
            'name' => 'required'
            ]
        );
        $vendor = vendor::find($id);
        $vendor->name = $req['name'];
        $vendor->phone = $req['phone'];
        $vendor->telephone = $req['telephone'];
        $vendor->address = $req['address'];
        $vendor->city = $req['city'];
        $vendor->address = $req['address'];
        $vendor->person_name = $req['person_name'];
        $vendor->status = $req['status'];
        $vendor->note = $req['note'];
        $vendor->save();
        
        return redirect('admin/vendor/list')->with('success','Vendor Has been Upated Successfully...');

        }


}
