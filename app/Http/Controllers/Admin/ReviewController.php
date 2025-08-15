<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Review;
use DB;

class ReviewController extends Controller
{
     public function reviews(){
         $reviews = DB::table('reviews')
             ->orderby('id', 'desc')
             ->get();
        return view('admin.pages.reviews.index')
        ->with('reviews', $reviews);
    }
    
    public function review($id){
         $review = DB::table('reviews')
             ->where('id', $id)
             ->first();
        return view('admin.pages.reviews.review')
        ->with('review', $review);
    }
    
    public function reviewStatus($id){
        $review = Review::find($id);
        $review->status =!($review->status);
        $review->save();
        return redirect()->back()->with('success','Updated Successfully !');
    }
    
    public function reviewFeatured($id){
        $review = Review::find($id);
        $review->featured =!($review->featured);
        $review->save();
        return redirect()->back()->with('success','Updated Successfully !');
    }
}
