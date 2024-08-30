<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ProductVariantController extends Controller
{
    public function index()
    {
        
        $data['variants'] = DB::table('variants')->orderBy('id','ASC')->paginate(10);
        $data['variants_type'] = DB::table('variants_types')->get();
        return view('admin.productvariants_view',$data);
        
    }

    public function create()
    {
        $data['variants'] = DB::table('variants_types')->get();
        return view('admin.productvariant',$data);
    }

    public function store(Request $request)
    {

        $request->validate(
            [
            'name' => 'required',
            'variant_type' => 'required'
            ],
            [
            ]
        );
        
        $date = date('Y-m-d H:i:s');
        $Data = [
            'variant_type_id' =>$request->variant_type,
            'variant_name' =>$request->name,
            'status'=>$request->status,
            'created_at'=>$date,
            'updated_at'=>$date,
        ];
        DB::table('variants')->insert($Data);
        return redirect()->back()->with('success','Product Variant Has been Inserted Successfully...');
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        DB::table('variants')->where('id', $id)->delete();
        return response()->json(['status'=>'success','message'=>'Product Variant Has Been Deleted Successfully....']);

    }

    


    public function edit($id)
        {
           
            $data['variant'] = DB::table('variants')->where('id',$id)->first();
            // dd($data['variant']);
            return view('admin.productvariant_update',$data);
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
                'variant_name'=>$request->name,
                'status'=>$request->status,
                'updated_at'=>$date
            ];
            DB::table('variants')->where('id', $id)->update($data);
            return redirect('admin/products-variant/list')->with('success','Product Variant Has been Updated Successfully...');

        }


        public function variants_ajax(Request $request)
        {
            $query = DB::table('variants');
        if ($request->from !='' AND $request->to !='') {
            $query->whereBetween('created_at', [$request->from.' 00:00:00', $request->to.' 23:59:59']);
        }

        if ($request->s_status !='') {
            $query->where('status',$request->s_status);
        }
        
        if ($request->search != '') {
            $query->where('status','like','%'.$request->search.'%')
            ->orWhere('variant_name','like','%'.$request->search.'%');
        }
        $data['variants'] = $query->orderBy('id','ASC')->paginate(10);
        $data['variants_type'] = DB::table('variants_types')->get();
        return view('admin.productvariants.productvariants_ajax',$data)->render();

        }
}
