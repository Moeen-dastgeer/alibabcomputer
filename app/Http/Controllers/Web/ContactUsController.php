<?php
namespace App\Http\Controllers\Web;
use Illuminate\Http\Request;
use App\Models\Admin\contactus;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ContactUsController extends Controller
{
    public function index(Request $request)
    {
        $data['contacts'] = contactus::all()->first();
       return view('admin.contact_us',$data);         
    }

    public function update(Request $request)
    {
        
        
        
        $contact = contactus::find($request->id);
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->phone1 = $request->phone1;
        $contact->address = $request->address;
        $contact->save();
        return redirect()->back()->with('success','Data Has been Updated Successfully...');
    }

    public function contact(Request $request){
        if ($request->post()) {
            if ($request->ajax()) 
            {
                $validator = Validator::make($request->all(),[
                    'first_name'=>'required|max:100',
                    'last_name'=>'required|max:100',
                    'email'=>'required|email|max:100',
                    'subject'=>'required|max:70',
                    'message'=>'required|max:400',
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
                    $date = date('Y-m-d H:i:s');
                    $contactData = [
                        'firstname'=>$request->first_name,
                        'lastname'=>$request->last_name,
                        'email'=>$request->email,
                        'phonenumber'=>$request->phone,
                        'subject'=>$request->subject,
                        'message'=>$request->message,
                        'read'=>FALSE,
                        'created_at'=>$date,
                        'updated_at'=>$date,
                    ];
                    DB::table('contacts')->insert($contactData);
                   
                    return response()->json(['status'=>'success','message'=>'Thanks for contact us! Your query has been submitted. we will get back you soon']);
                }
            }      
        }else{
            $data['contact'] = contactus::all()->first();
            return view('web.extrapages.contact',$data);
        }
    }
}
