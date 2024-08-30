<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\admin\privacy;
use App\Http\Controllers\Controller;

class PrivacyController extends Controller
{
    public function index()
    {
        $privacy['privacy'] = privacy::all()->first();
        return view('admin.privacy-policy',$privacy);
    }
    public function update(Request $request)
    {
        $privacy = privacy::find($request->id);
        $privacy->privacy_policy = $request->privacy;
        $privacy->save();
        return redirect()->back()->with('success','Data has been Updated Successfully.....');

    }
}
