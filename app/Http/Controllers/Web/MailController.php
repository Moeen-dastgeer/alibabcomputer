<?php

namespace App\Http\Controllers\Web;
use App\Mail\OrderMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public static function sendOrderEmail($name,$email,$id)
    {
        $data = [
            'name' =>$name,
            'email'=>$email,
            'id' => $id
        ];
        Mail::to($email)->send(new OrderMail($data));
    }

    //
}
