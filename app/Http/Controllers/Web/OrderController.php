<?php

namespace App\Http\Controllers\Web;
use App\Mail\OrderMail;
use App\Mail\StatusMail;
use App\Models\Web\item;
use App\Models\Web\order;
use App\Models\mailtracker;

use App\Models\Web\address;
use Illuminate\Http\Request;
use App\Models\Admin\product;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Web\MailController;
use Illuminate\Support\Facades\Hash;

class OrderController extends Controller
{

    public function index(Request $request)
    {
        $status = $request->get('status');
        if($status != ''){
            $data['orders'] = DB::table('orders as o')->join('addresses as a', 'o.id', '=','a.order_id')
            ->select('o.*','a.fname','a.lname')->where('o.status',$status)->orderBydesc('id')->paginate(10); 
        }
        else
        {
            $data['orders'] = DB::table('orders as o')->join('addresses as a', 'o.id', '=','a.order_id')
            ->select('o.*','a.fname','a.lname')->orderBydesc('id')->paginate(10); 
        }
        $data['items'] =  DB::table('items')->get();
        return view('admin.orders',$data);
    }

    public function orders_ajax(Request $request)
    {
        $query = DB::table('orders as o')->join('addresses as a', 'o.id', '=','a.order_id')
                ->select('o.*','a.fname','a.lname');
        if ($request->from !='' AND $request->to !='') {
            $query->whereBetween('o.created_at', [$request->from.' 00:00:00', $request->to.' 23:59:59']);
        }

        if ($request->s_status !='') {
            $query->where('o.status',$request->s_status);
        }
        
        if ($request->search != '') {
            $query->where('o.status','like','%'.$request->search.'%')
            ->orWhere('a.fname','like','%'.$request->search.'%')
            ->orWhere('a.lname','like','%'.$request->search.'%');
        }
        $data['orders'] = $query->orderBy('updated_at','DESC')->paginate(10);
        $data['items'] =  DB::table('items')->get();
        return view('admin.orderajax.ordersajax',$data)->render();
    }


    public function view($id)
    {
        $data['order'] =  DB::table('orders as o')
                        ->join('addresses as a', 'o.id','=', 'a.order_id')
                        ->where("order_id",$id)
                        ->select('o.*', 'a.fname','a.lname', 'a.email','a.phone','a.address1','a.city','a.post_code')
                        ->first(); 
        $data['items'] = DB::table('items as i')
                        ->join('products as p', 'p.id', '=', 'i.product_id')
                        ->select('i.*', 'p.name','p.image')
                        ->where("order_id",$id)->get();  
        return view('admin.order_view',$data);
    }

    public function insert(Request $req)
    {
        $validator = Validator::make($req->all(),[
            'fname' => 'required',
            'lname' => 'required',
            'email' => 'required|email',
            'phone' => 'required|min:11|max:13',
            'address' => 'required',
            'city' => 'required',
            'post_code' => 'required',
            'first_name' => 'required_if:check,==,1',
            'last_name' => 'required_if:check,==,1',
            'email1' => 'required_if:check,==,1',
            'address1' => 'required_if:check,==,1',
            'phone1' => 'required_if:check,==,1',
            ],
            [
                'first_name.required_if'=>'Please Fill First Name',
                'last_name.required_if'=>'Please Fill Last Name',
                'email1.required_if'=>'Please Fill Email Address',
                'phone1.required_if'=>'Please Fill Phone No',
                'address1.required_if'=>'Please Fill Your Address',

            ]
        );
        if ($validator->fails()) {
            return response()->json(['status'=>'errors','errors'=> $validator->errors()->toArray()]);
        } else 
        {
            
            $date = date('Y-m-d H:i:s');
            $address = new address;
            $order = new order;
            if($req->check==1)
            {
                $data = [
                    'name'=>$req->first_name,
                    'first_name'=>$req->first_name,
                    'last_name'=>$req->last_name,
                    'email'=>$req->email1,
                    'email_verified_at'=>$date,
                    'phone'=>$req->phone1,
                    'address1'=>$req->address1,
                    'password'=>Hash::make("12345678"),
                    'created_at'=>$date,
                    'updated_at'=>$date,
                ];
                $c = DB::table('users')->where('email',$req->email1)->count(); 
                if($c > 0)
                {
                    return response()->json(['status'=>'error','message'=>'This Email already exist please login your account']);
                }
                else
                {
                    $order->user_id = DB::table('users')->insertGetId($data);
                }
            }
            else if($req->check==2)
            {
                
                $data = [
                    'name'=>$req->fname,
                    'first_name'=>$req->fname,
                    'last_name'=>$req->lname,
                    'email'=>$req->email,
                    'email_verified_at'=>$date,
                    'phone'=>$req->phone,
                    'address1'=>$req->address,
                    'password'=>Hash::make("12345678"),
                    'created_at'=>$date,
                    'updated_at'=>$date,
                ];
                $c = DB::table('users')->where('email',$req->email)->count(); 
                    if($c > 0)
                    {
                        return response()->json(['status'=>'error','message'=>'This Email already exist please login your account']);
                    }
                    else
                    {
                        $order->user_id = DB::table('users')->insertGetId($data);
                    }
                
            }
            else
            {
                $order->user_id = Auth::guard('web')->user()->id;
            }

            $order->save();
            $order_id = $order::all()->last()->id;
            foreach(session('cart') as $id => $cart)
            {
                $item = new item();
                $item->order_id = $order_id;
                $item->product_id = $cart['id'];
                $item->qty = $cart['qty'];
                $item->price = $cart['price'];
                $item->memory = $cart['memory'];
                $item->save();
            }
            $address->order_id = $order_id;
            $address->fname = $req['fname'];
            $address->lname = $req['lname'];
            $address->email = $req['email'];
            $address->phone = $req['phone'];
            $address->address1 = $req['address'];
            $address->city = $req['city'];
            $address->post_code = $req['post_code'];
            $address->save();
            $id = $order_id;
            $data['order'] =  DB::table('orders as o')
            ->join('addresses as a', 'o.id','=', 'a.order_id')
            ->where("order_id",$id)
            ->select('o.*', 'a.fname','a.lname', 'a.email','a.phone','a.address1','a.city','a.post_code')
            ->first(); 
            $data['items'] = DB::table('items as i')
            ->join('products as p', 'p.id', '=', 'i.product_id')
            ->select('i.*', 'p.name','p.image')
            ->where("order_id",$id)->get(); 
            Mail::to($address->email)->send(new OrderMail($data));
            // return new OrderMail($data);
            // MailController::sendOrderEmail($address->fname,$address->email,$order_id);
            // MailController::sendOrderEmail($data);
    
            session()->forget('cart');
            // return redirect()->back()->with('success',"Your Order Has Been Placed Please Check Your Email....");
            return response()->json(['status'=>'success','message'=>'Your Order Has Been Placed Please Check Your Email....']);
            // return redirect()->back()->with('success',"Your Order Has Been Placed Please Check Your Email....");
        }
    } 

    public function update(Request $request)
    {
            $id = $request->id;
            $order = order::find($id);
            $order->status = $request->status; 
            $order->save();
            $address = address::where("order_id",$id)->get();
            $email = $address[0]['email'];
            $name = $address[0]['fname'].' ' .$address[0]['lname'];
            if($request->status != "pending")
            {
            $data = [
                'status' =>$request->status,
                'name'=> $name,
            ];
            // return new Statusmail($data);
            Mail::to($email)->send(new StatusMail($data));
            }
         return response()->json(['status'=>'success','message'=>'Status Updated Successfully....']);
    }

}
