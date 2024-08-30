<?php

namespace App\Http\Controllers\admin;
use App\Models\admin\term;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TermsController extends Controller
{
    public function index()
    {
        $term['term'] = term::all()->first();
        return view('admin.terms-conditions',$term);
    }

    public function update(Request $request)
    {
        $term = term::find($request->id);
        $term->term_condition = $request->term;
        $term->save();
        return redirect()->back()->with('success','Data has been Updated Successfully.....');

    }
}
