<?php

namespace App\Http\Controllers\Web\Auth;
use App\Models\Web\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;

class RegisteredUserController extends Controller
{
    /** 
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('web.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        if ($request->ajax()) 
        {
            $validator = Validator::make($request->all(),[
                'name' => ['required', 'string', 'max:255'],
                'lname' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
                'phone' => ['required'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'g-recaptcha-response' => 'required|captcha',
                'custom' => [
                    'g-recaptcha-response' => [
                        'required' => 'Please verify that you are not a robot.',
                        'captcha' => 'Captcha error! try again later or contact site admin.',
                    ],
                ],
            ]);
            if ($validator->fails()) 
            {
                return response()->json(['status'=>'error','errors'=> $validator->errors()->toArray()]);
            } 
            else 
            {
                $user = User::create([
                    'name' => $request->name,
                    'first_name'=>$request->name,
                    'last_name'=> $request->lname,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'password' => Hash::make($request->password),
                ]);
        
                event(new Registered($user));
               
                return response()->json(['status'=>'success','message'=>'Your account has been created please check your email for verification !!!']);
            }
        }

        // dd($request->all());
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'lname' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
        //     'phone' => ['required'],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ]);
 
        // DB::table('users')->insert():
        // $user = User::create([
        //     'name' => $request->name,
        //     'first_name'=>$request->name,
        //     'last_name'=> $request->lname,
        //     'email' => $request->email,
        //     'phone' => $request->phone,
        //     'password' => Hash::make($request->password),
        // ]);

        // event(new Registered($user));

        // Auth::login($user);
        // return redirect("/login")->withSuccess('Your account has been created please check your email for verification !!!');
        // return redirect(RouteServiceProvider::HOME);
    }
}
