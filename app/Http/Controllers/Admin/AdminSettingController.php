<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdminSettingController extends Controller
{
    public function changePassword(Request $request)
    {
        if ($request->post()) {
            $id = auth()->user()->id;
            $request->validate([
                'currentPassword'=>'required:min:8',
                'password' => 'required|confirmed|min:8',
                'password_confirmation' => 'required|min:8'
            ]);
            $user = DB::table('users')->where('id',$id)->first();

            if(Hash::check($request->currentPassword,$user->password)){
                $password = $request->post('password'); 
                DB::table('users')->where('id',$id)->update(['password'=>Hash::make($password)]);
                return redirect()->back()->withSuccess('Password Updated !!!');
            }else{
                 return redirect()->back()->withSuccess('Current Password is not correct !!!');
            } 
        } else {
            return view('admin.settings.change-password');
        } 
    }


    public function profile(Request $request)
    {
        if ($request->post()) {
            $id = auth()->user()->id;
            $request->validate([
                'name'=>'required',
                'email'=>'required|email'
            ]);
            DB::table('users')->where('id',$id)->update(['name'=>$request->name,'email'=>$request->email]);
            return redirect()->back()->withSuccess('Profile Updated !!!');
        } else {
            return view('admin.settings.profile');
        }
    }

}
