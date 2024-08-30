<?php

namespace App\Http\Controllers\Web;

use App\Models\Web\User;
use App\Models\Web\review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class reviewsController extends Controller
{
    public function index()
    {
        $data['reviews'] = DB::table('reviews')->orderBy('updated_at','DESC')->paginate(10);
        return view('admin.reviews',$data);

    }

    
    public function filter(Request $request)
    {
        $query = DB::table('reviews');

        if ($request->from !='' AND $request->to !='') {
            $query->whereBetween('created_at', [$request->from.' 00:00:00', $request->to.' 23:59:59']);
        }

        if ($request->s_status !='') {
            $query->where('status',$request->s_status);
        }
        
        if ($request->search != '') {
            $query->where('status','like','%'.$request->search.'%')
            ->orWhere('name','like','%'.$request->search.'%')
            ->orWhere('comment','like','%'.$request->search.'%')
            ->orWhere('email','like','%'.$request->search.'%');
        }
        // $data['orders'] = $query->orderBy('updated_at','DESC')->get();
        $data['reviews'] = $query->orderBy('updated_at','DESC')->paginate(10);

        return view('admin.review.reviewajax',$data)->render();
        
    }


    public function view($id)
    {
        $review = review::find($id);
        $data = compact('review');
        return view('admin.review_view')->with($data);
        

    }

    public function delete(Request $request)
    {
        $id = $request->id;
        review::find($id)->delete();
        return response()->json(['status'=>'success','message'=>'Review Has Been Deleted Successfully....']);

    }

    public function store(Request $request)
    {
        
        $user = User::find($request->uid);
        $review = new review;
        $name = $user->name;
        $email = $user->email;
        $review->name = $name;
        $review->email = $email;
        $review->user_id = $request->uid;
        $review->product_id = $request->pid;
        $review->rating = $request->rating;
        $review->comment = $request->comment;
        $review->save();
        return redirect()->back();

    }

    public function update(Request $request)
    {
            $id = $request->id;
            $review = review::find($id);
            $review->status = $request->status; 
            $review->save();         
            return response()->json(['status'=>'success','message'=>'Status Updated Successfully....']);

    }
}
