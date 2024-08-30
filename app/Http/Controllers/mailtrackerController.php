<?php

namespace App\Http\Controllers;

use App\Models\mailtracker;
use Illuminate\Http\Request;

class mailtrackerController extends Controller
{
    public function index()
    {
        $data['mails'] = mailtracker::all();
        return view('admin.mailtrack',$data);
    }

    public function update()
    {
        $id = $_GET['id'];
        $mailtracker = mailtracker::find($id);
        $mailtracker->status = "open";
        $mailtracker->save();
        // echo $id;
    }
}
