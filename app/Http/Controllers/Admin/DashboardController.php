<?php
namespace App\Http\Controllers\Admin;
use App\Models\Web\item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard(Request $request){
        $date = date('Y-m-d ');
        $orders = DB::table('orders as o')->join('addresses as a', 'o.id', '=','a.order_id')
                ->select('o.*','a.fname','a.lname')
                ->whereBetween('o.created_at',[$date.' 00:00:00',$date.' 23:59:59'])
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

        $data['orders'] = $arr;

    }
    else
    {
    $data['orders'] = $d;
    }
     
        //dd($data);        
        return view('admin.dashboard',$data);
    }



 
}
