<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Item;
use App\Blog;
use App\Reservation;
use App\Contact;
use App\Review;
use App\Gallery;


class DashboardController extends Controller
{
    public function index(){
         $items = Item::count();
         $messages = Contact::count();
         $blogs = Blog::count();
         $reviews = Review::count();
         $reservations = Reservation::count();
         $gallery = Gallery::count();
         return view('admin.pages.dashboard.index')
         ->with('items', $items)
         ->with('messages', $messages)
         ->with('blogs', $blogs)
         ->with('reviews', $reviews)
         ->with('reservations', $reservations)
         ->with('gallery', $gallery);
    }
}
