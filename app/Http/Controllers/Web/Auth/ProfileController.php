<?php

namespace App\Http\Controllers\Web\Auth;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    
    public function show()
    {
        $id = Auth()->user()->id;
        $data['user'] = DB::table('users')->where('id',$id)->first();
        return view('web.pages.profile',$data);
    }
    public function store(Request $request){
        $request->validate([
            'first_name' => ['required','max:255'],
            'last_name' => ['required','max:255'],
            'phone' => ['required','max:11','phone'],
            'address1' => ['nullable','max:255'],  
            'city' => ['nullable','max:255'],
            'state' => ['nullable','max:255'],
            'zipcode' => ['nullable','max:255'],
            'country' => ['nullable','max:255'],
        ]);
        $id = Auth()->user()->id;
        DB::table('users')->where('id',$id)->update([
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'phone'=>$request->phone,
            'address1'=>$request->address1,
            'address2'=>$request->address2,
            'city'=>$request->city,
            'state'=>$request->state,
            'zipcode'=>$request->zipcode,
            'country'=>$request->country,
        ]);
        return redirect()->back()->withSuccess('Profile Updated Successfully !!!');
    }
}
