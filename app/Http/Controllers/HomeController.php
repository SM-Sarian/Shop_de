<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function welcome()
    {
        return view('welcome');
    }
    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all()->count();
        $products = Product::all()->count();
        $orders = Order::all()->count();;
        $comments = Comment::all()->count();
        $admin_users = User::where('role','Admin')->get()->count();
        $users = User::where('role','user')->get()->count();

        return view('home')
            ->with('users',$users)
            ->with('admin_users',$admin_users)
            ->with('comments',$comments)
            ->with('orders',$orders)
            ->with('products',$products)
            ->with('categories',$categories);
    }
}
