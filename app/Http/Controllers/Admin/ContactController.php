<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Models\Admin\Contact;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['contacts'] = DB::table('contacts')->orderByDesc('id')->paginate(4);
        return view('admin.contacts.list', $data);
    }

    public function view($id)
    {
        $contact = contact::find($id);
        $data = compact('contact');
        return view('admin.contacts.contact-view')->with($data);

    }


    public function contact_ajax(Request $request)
    {
        
        $query = DB::table('contacts');
        if ($request->from !='' AND $request->to !='') {
            $query->whereBetween('created_at', [$request->from.' 00:00:00', $request->to.' 23:59:59']);
        }
        if ($request->search != '') {
            $query->where('message','like','%'.$request->search.'%')
            ->orWhere('phonenumber','like','%'.$request->search.'%')
            ->orWhere('firstname','like','%'.$request->search.'%')
            ->orWhere('lastname','like','%'.$request->search.'%')
            ->orWhere('email','like','%'.$request->search.'%')
            ->orWhere('subject','like','%'.$request->search.'%');
        }
        $data['contacts'] = $query->orderBy('updated_at','DESC')->paginate(4);
        return view('admin.contacts.contact-list-ajax',$data)->render();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
