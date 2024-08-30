<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    
    public function show()
    {
        return view('admin.auth.change-password');
    }
    public function store(Request $request){
        $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'string', 'min:8','required_with:password_confirmation','same:password_confirmation'],
            'password_confirmation' => ['required', 'string', 'min:8'],  
        ]);
        $id = Auth()->user()->id;
        $user = DB::table('teams')->where('id',$id)->first();
        if(Hash::check($request->current_password,$user->password)){
            DB::table('teams')->where('id',$id)->update(['password' => Hash::make($request->password)]);
            Auth::logoutOtherDevices($request->password);
            return redirect()->back()->withSuccess('Password Updated !!!');
        }else{
            return redirect()->back()->withFail('Current Password is not correct !!!');
        } 
        // 'password' => Hash::make($request->password),
    }
}
