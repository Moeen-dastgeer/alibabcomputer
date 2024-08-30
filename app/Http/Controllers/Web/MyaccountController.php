<?php

namespace App\Http\Controllers\Web;

use App\Models\Web\item;
use App\Models\Web\User;
use App\Models\Web\order;
use App\Models\Web\address;
use Illuminate\Http\Request;
use App\Models\Admin\product;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MyaccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = date('Y-m-d ');
        $user_id = Auth::guard('web')->user()->id;
        $orders = DB::table('orders')->where('user_id',$user_id)
                ->whereBetween('created_at',[$date.' 00:00:00',$date.' 23:59:59'])
                ->get(); 
        // dd($orders);       
        $d = $orders;
    
        $a = 0;
       $total =  [];
    if(0<count($d))
    {        

        foreach ($d as $order) 
        {
            $total[$a] = 0;
            $id = $order->id;
            $item = item::where("order_id",$id)->get();
            foreach($item as $item)
            {
                $total[$a] += ($item->price * $item->qty);
            }    
            $arr[] = (object) array_merge( (array)$order, array( 'total' => $total ) );
            $a = $a+1;
            
        }

        $data['recentorders'] = $arr;

    }
    else
    {
    $data['recentorders'] = $d;
    }

    $totalorders = DB::table('orders')->where('user_id',$user_id)->get();   
        
    // dd($orders);       
    $p = $totalorders;

    $a1 = 0;
   $total1 =  [];
if(0<count($p))
{        

    foreach ($p as $order) 
    {
        $total1[$a1] = 0;
        $id = $order->id;
        $item = item::where("order_id",$id)->get();
        foreach($item as $item)
        {
           
            $total1[$a1] += ($item->price * $item->qty);
        }    
        $arr1[] = (object) array_merge( (array)$order, array( 'total' => $total1 ) );
        $a1 = $a1+1;
        
    }

    $data['orders'] = $arr1;

}
else
{
$data['orders'] = $p;
}
        
        return view('web.myaccount.myaccount')->with($data);
    }

    public function orders()
    {
        $user_id = Auth::guard('web')->user()->id;
        // $orders = DB::table('orders as o')->join('addresses as a', 'o.id', '=','a.order_id')
        //         ->select('o.*','a.fname','a.lname')
        //         ->where('o.user_id',$user_id)
        //         ->get(); 
         $orders = DB::table('orders')->where('user_id',$user_id)->get();   
        
        // dd($orders);       
        $d = $orders;
    
        $a = 0;
       $total =  [];
    if(0<count($d))
    {        

        foreach ($d as $order) 
        {
            $total[$a] = 0;
            $id = $order->id;
            $item = item::where("order_id",$id)->get();
            foreach($item as $item)
            {
               
                $total[$a] += ($item->price * $item->qty);
            }    
            $arr[] = (object) array_merge( (array)$order, array( 'total' => $total ) );
            $a = $a+1;
            
        }

        $data['orders'] = $arr;

    }
    else
    {
    $data['orders'] = $d;
    }
        
        return view('web.myaccount.myorders')->with($data);

    }

    
    public function order_view($id)
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
        return view('web.myaccount.myorder_view',$data);
    }


    // public function profile()
    // {
    //     return view('web.myaccount.profile');
    // }

    // public function change_password()
    // {
    //     return view('web.myaccount.change-password');
    // }


    public function password_update(Request $request)
    {
        // dd('hello');
        $request->validate([
            'old_password' => ['required'],
            'password' => ['required', 'string', 'min:8','required_with:password_confirmation','same:password_confirmation'],
            'password_confirmation' => ['required', 'string', 'min:8'],
        ]);

                    $user = User::find($request->id);
                
                    $pass = Hash::check($request->old_password, $user->password);
                    
                    if($pass) 
                    {
                        
                        $user->password = Hash::make($request->password);
                        $user->save();
                        return redirect()->back()->with('success',"Password Has been Changed Successfully...");
                    } 
                    else 
                    {
                        return redirect()->back()->with('error',"Old Password is Incorrect...");
                    }
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
