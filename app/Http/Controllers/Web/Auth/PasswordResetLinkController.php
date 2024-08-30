<?php

namespace App\Http\Controllers\Web\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Notifications\ResetPassword;

class PasswordResetLinkController extends Controller
{
    public function __construct(){
        ResetPassword::createUrlUsing(function ($user, string $token) {
            return url('reset-password/'.$token.'?email='.$user['email']);
        });
    }
    /**
     * Display the password reset link request view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('web.auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);
        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::broker('users')->sendResetLink(
            $request->only('email')
        );
        
        return $status == Password::RESET_LINK_SENT
                    ? redirect('login')->withsuccess("Plesae Check your Email for Reset Your Password")
                    : back()->withInput($request->only('email'))
                            ->withErrors(['email' => __($status)]);
    }
}
