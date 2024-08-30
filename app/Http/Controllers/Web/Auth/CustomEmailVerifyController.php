<?php

namespace App\Http\Controllers\web\auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class CustomEmailVerifyController extends Controller
{
    public function __invoke(EmailVerificationRequest $request)
    {
        dd($request->all());
    //    $user = DB::table('users')->where('id',$id)->first();
        // if ($user->hasVerifiedEmail()) {
        //     return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
        // }

        // if ($user->markEmailAsVerified()) {
        //     event(new Verified($user));
        // }

        // return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
    }
}
