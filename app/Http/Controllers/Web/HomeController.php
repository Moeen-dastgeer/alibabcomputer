<?php

namespace App\Http\Controllers\Web;
use App\Models\Web\cart;
use App\Models\Web\review;
use Illuminate\Support\Str;
use App\Models\Admin\images;
use Illuminate\Http\Request;
use App\Models\Admin\product;
use App\Models\Admin\category;
use App\Models\Admin\contactus;
use App\Models\Admin\manufacturer;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        
        $data['reviews'] = DB::table('reviews as v')->join('products as p','v.product_id','=','p.id')->select('v.id as v_id','v.comment','v.product_id','v.rating','v.status','p.id as p_id','p.name as p_name')->where('v.status','complete')->get();
        // dd($data['reviews']);
    
        $data['categories'] = DB::table('products as p')->join('category as c', 'p.cat_id','=','c.id')
                        ->select('c.*')->distinct()->where('c.status','enable')->get();
        $data['products'] = DB::table('products as p')->join('category as c', 'p.cat_id','=','c.id')->select('p.*','c.id as c_id','c.slug as c_slug')->get();
        // dd($data['products']);
        $data['sliders'] = DB::table('sliders')->orderByDesc('id')->get();
        $data['category'] = DB::table('category')->where('status','enable')->paginate(6);
        $data['brands'] = DB::table('brands')->orderByDesc('id')->get();
        $data['recommended'] = DB::table('products')->orderByDesc('id')->paginate(8);
        $data['toprated'] = DB::table('products')->orderByDesc('id')->get();
        $data['bestselling'] = DB::table('products')->orderByDesc('id')->get();
        //popular products
        $data['features'] = DB::table('products')->where("featured","1")->get();
        $data['latest'] = DB::table('products')->skip(0)->take(5)->orderByDesc('id')->get();

        return view('web.home',$data); 
    }

    public function shopFilter(Request $request){
        // $data['products'] = DB::table('products as p')
        // ->join('category as c', 'p.cat_id','=','c.id')
        // ->select('p.*','c.id as c_id','c.slug as c_slug')->paginate(5);
        // return response()->json(['shop filter']);
        $query = DB::table('products');
        if ($request->categories != NULL) {
            $query->whereIn('cat_id',$request->categories);
        }
        if ($request->manufacturers != NULL) {
            $query->whereIn('manufac_id',$request->manufacturers);
        }
        
        if ($request->min != NULL && $request->max != NULL) {
            $query->whereBetween('price', [$request->min,$request->max]);
        }
        $data['products'] = $query->paginate(5);

        $data['reviews'] = DB::table('reviews as v')
        ->join('products as p','v.product_id','=','p.id')
        ->select('v.id as v_id','v.comment','v.product_id','v.rating','v.status','p.id as p_id','p.name as p_name')
        ->where('v.status','complete')->get();
        // return response()->json('hello');
        return view('web.ajax.products',$data)->render();
    }

    public function search_product(Request $req,$name=null)
    {
        $data['categories'] = category::all();
        $data['manufacturer'] = manufacturer::all();
        $data['selectedCategory'] = $name;
        $data['products1'] = DB::table('products')->get();
        $data['reviews'] = DB::table('reviews') ->where('status','complete')->get();
        $data['products'] = product::where('name', 'LIKE', '%'.$req->name.'%')
                                     ->orWhere('short_desc', 'LIKE', '%'.$req->name.'%')                           
                                     ->orWhere('long_desc', 'LIKE', '%'.$req->name.'%')                           
                                     ->orWhere('keyword', 'LIKE', '%'.$req->name.'%')                           
                                     ->paginate(10);
        $data['search'] = $req->name;                             
        return view('web.extrapages.shop',$data);

    }

    public function shop(Request $request){
        $qry = DB::table('products as p');
        $name = $request->get('category');
        if($name != ''){
            $qry->join('category as c', 'p.cat_id', '=', 'c.id')->where('c.slug',$name);
        }
        $data['products'] = $qry->select('p.*')->orderByDesc('created_at')->paginate(5);
        $data['products1'] = DB::table('products')->get();
        // dd($data['products']);
        $data['reviews'] = DB::table('reviews as v')->join('products as p','v.product_id','=','p.id')
                        ->select('v.id as v_id','v.comment','v.product_id','v.rating','v.status','p.id as p_id','p.name as p_name')
                        ->where('v.status','complete')->get();
        $data['selectedCategory'] = $name;
        $data['categories'] = category::all();
        $data['manufacturer'] = manufacturer::all();  
        return view('web.extrapages.shop',$data); 
    }



    public function filter_data(Request $request)
    {
        $query = DB::table('products');
        if ($request->cat != NULL) {
            $query->whereIn('cat_id',$request->cat);
        }
        if ($request->manufac != NULL) {
            $query->whereIn('manufac_id',$request->manufac);
        }
        
        if ($request->min != NULL && $request->max != NULL) {
            $query->whereBetween('price', [$request->min,$request->max]);
        }
        $data['products'] = $query->paginate(5);
        $data['reviews'] = DB::table('reviews as v')->join('products as p','v.product_id','=','p.id')->select('v.id as v_id','v.comment','v.product_id','v.rating','v.status','p.id as p_id','p.name as p_name')->where('v.status','complete')->get();
        return view('web.ajax.filterproduct',$data)->render();
    }

    public function product($slug){
        
        $data['product'] = product::where('slug',$slug)->get()->first();
        if($data['product']==null)
        {
            return view('errors.404');
        }
        $data['related'] = DB::table('products')->where('cat_id',$data['product']->cat_id)->get();
        $data['reviews1'] = $review = review::where('product_id',$data['product']->id)->get();
        $data['reviews'] = $review = review::where('product_id',$data['product']->id)->where('status','complete')->get();
        $data['variants_values'] =  DB::table('productvariantvalues as p')->join('variants as v', 'p.variant_id', '=','v.id')
                                    ->select('p.*','v.variant_name')
                                    ->where('p.product_id',$data['product']->id)
                                    ->get();
        $data['variants_count'] =  count($data['variants_values']);
        // $data['variants'] =  DB::table('variants')->get();
        $data['images'] = images::where("product_id",$data['product']->id)->get();
        $count = 0;
        $rating = 0;
        $sum = 0;
        foreach($review as $rev)
        {
            $sum+=$rev->rating;
            $count++;
        }
        if($count>0)
        {
            $rating = $sum/$count;
        }

        $data['count'] = $count;
        $data['rating'] = $rating;
        return view('web.extrapages.product',$data); 
    }

    public function product_price_filter(Request $request)
    {
        $slug = $request->slug;
        $price = $request->size;
        $qty = $request->qty;
        $data['product'] = product::where('slug',$slug)->get()->first();
        // if($price==0)
        // {
        //     $data['price'] = $data['product']->price * $qty;
        // }
        // else
        // {
        //     $data['price'] = ($price + $data['product']->price) * $qty;
        // }
        $data['price'] = $price;
        $data['qty'] = $qty;  
        // if($data['product']==null)
        // {
        //     return view('errors.404');
        // }
        $data['reviews'] = $review = review::where('product_id',$data['product']->id)->where('status','complete')->get();
        $data['variants_values'] =  DB::table('productvariantvalues as p')->join('variants as v', 'p.variant_id', '=','v.id')
                                    ->select('p.*','v.variant_name')
                                    ->where('p.product_id',$data['product']->id)
                                    ->get();
        $data['variants_count'] =  count($data['variants_values']);
        // $data['variants'] =  DB::table('variants')->get();
        $data['images'] = images::where("product_id",$data['product']->id)->get();
        $count = 0;
        $rating = 0;
        $sum = 0;
        foreach($review as $rev)
        {
            $sum+=$rev->rating;
            $count++;
        }
        if($count>0)
        {
            $rating = $sum/$count;
        }

        $data['count'] = $count;
        $data['rating'] = $rating;

        return view('web.ajax.singleproductajax',$data)->render();
    }

    public function myaccount()
    {
        return view('web.myaccount');
    }


    public function cart()
    {

        return view('web.extrapages.cart');
    }

    public function addcart(Request $request)
    {
        //add to cart data with session
        $cart = session()->get('cart');
        $id = $request['p_id'];
        $product = product::where('id',$id)->get()->first();

        if(1<=$request['qty'])
        {   
            if(isset($cart[$id])) 
            {
                $cart[$id]['qty'] += $request['qty'];
            } else {
                    if($request->price1==null)
                    {
                        $cart[$id] = [
                            'id'=>$request['p_id'],
                            'name'=> $product->name,
                            'image'=> $product->image,
                            'price'=> $request->price!=null?$product->price:$product->price+$request->price,
                            'slug'=> $product->slug,
                            'qty'=> $request['qty'],
                            'memory'=>null    
                        ];
                    }
                    else
                    {
                       
                        $cart[$id] = [
                            'id'=>$request['p_id'],
                            'name'=> $product->name,
                            'image'=> $product->image,
                            'price'=> $request->price1,
                            'slug'=> $product->slug,
                            'qty'=> $request['qty'],
                            'memory'=>$request->memory   
                        ];
                    }
            }  

            session()->put('cart',$cart);

            $wid = $request['w_id'];
            if($wid!=null)
            {
                $wish = session()->get('wish');
                if(isset($wish[$wid])) 
                {
                    unset($wish[$wid]);
                    session()->put('wish', $wish);
                }
            }
        }   


        // if($req->url == "http://127.0.0.1:8000")
            return response()->json(['status'=>'success','message'=>'Product Added into Cart Successfully....']);
            // else
            // return redirect()->back()->with('success',"Product Added into Cart Successfully...");

    }


    public function addwish(Request $request)
    {
        //add to cart data with session
        $wish = session()->get('wish');
        $id = $request['p_id'];
        $product = product::where('id',$id)->get()->first();
        $wish[$id] = [
                        'id'=>$request['p_id'],
                        'name'=> $product->name,
                        'image'=> $product->image,
                        'price'=> $product->price,
                        'slug'=> $product->slug
                ];

            session()->put('wish',$wish);
        // if($req->url == "http://127.0.0.1:8000")
            return response()->json(['status'=>'success','message'=>'Product Added into Wish List Successfully....']);
            // else
            // return redirect()->back()->with('success',"Product Added into Cart Successfully...");

    }



    
    public function fetch_data()
    {
        return view('web.ajax.cart')->render();
    }

    public function wish_data()
    {
        return view('web.ajax.wish')->render();
    }

    
    public function cart_fetch_data()
    {
        return view('web.ajax.cart1')->render();
    }


    public function delete_cart(Request $request)
    {
        //delete cart data using database

        // cart::find($id)->delete();
        // return redirect()->back();


        //delete cart data using session
        $id = $request->id;
        $cart = session()->get('cart');
        if(isset($cart[$id])) 
        {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }
        // return redirect()->back()->with('success',"Product Deleted into Cart Successfully...");
        return response()->json(['status'=>'success','message'=>'Product Deleted into Cart Successfully...']);
    }

    public function delete_wish(Request $request)
    {
        //delete cart data using session
        $id = $request->id;
        $wish = session()->get('wish');
        if(isset($wish[$id])) 
        {
            unset($wish[$id]);
            session()->put('wish', $wish);
        }
        // return redirect()->back()->with('success',"Product Deleted into Cart Successfully...");
        return response()->json(['status'=>'success','message'=>'Product Deleted into Wish List Successfully...']);
    }

    public function update_cart(Request $req)
    {
        $qty = $req->qty;
        $id = $req->id;
        $cart = session()->get('cart');
        if(isset($cart[$id])) 
        {
            $cart[$id]['qty'] = $qty;
            session()->put('cart', $cart);
        }
        return response()->json(['status'=>'success','message'=>'Cart Has Been Updated Successfully....']);

    }

    public function clear_cart()
    {
        session()->forget('cart');
        return redirect()->back();
        
    }



   public function checkout()
    {
       //checkout with database
        // $id = Auth::guard('web')->user()->id;
        // $cart = cart::where('user_id',$id)->get();
        // $data = compact('cart');


        //checkout without databse
        // if(Auth::guard('web')->user())
        return view('web.extrapages.checkout');
        // else
        // return redirect('login');
    }


    
    public function login()
    {
        return view('web.login');
    }


    public function signup()
    {
        return view('web.signup');
    }


    // public function contact()
    // {
    //     $data['contact'] = contactus::all()->first();
    //     return view('web.extrapages.contact',$data);
    // }


    public function about()
    {
        return view('web.about');
    }


    public function passwordforget()
    {
        return view('web.password-forget');
    }

public function ordermail()
{
    return view('web.mail.ordermail');
}    




}
