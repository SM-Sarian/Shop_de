<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Category;
use App\Models\Comment;
use App\Models\contact;
use App\Models\Poster;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Term;
use Illuminate\Http\Request;


class IndexController extends Controller
{

    public function __construct(){

        $itemCarts = \Cart::getContent();
        $categories = Category::where('parent_id',0)->get();
        return compact('itemCarts','categories');
    }


    public function index()
    {
        $sliders = Slider::all();
        $posters = Poster::all();
        $category = Category::all();
        $products = Product::searched()->orderBy('id','desc')->limit(10)->get();
        $suggests = Product::inRandomOrder()->limit(2)->get();
        $discounts = Product::where('first_price','>',0)->limit(10)->get();
        return view('fronts.index')
            ->with($this->__construct())
            ->with('sliders', $sliders)
            ->with('posters', $posters)
            ->with('category', $category)
            ->with('products', $products)
            ->with('suggests', $suggests)
            ->with('discounts', $discounts);
    }

    public function product($slug)
    {
        $product = Product::where('slug',$slug)->first();
        $similars = Product::where('category_id' , $product->category_id)->orderBy('id', 'desc')->limit(7)->get();
        return view('fronts.product')
            ->with($this->__construct())
            ->with('product', $product)
            ->with('similars', $similars);
    }


    public function category (Category $category)
    {
        $itemCarts = \Cart::getContent();
        $categories = Category::where('parent_id',0)->get();
        $products = $category->products()->paginate(12);
        return view('fronts.category', ['categories'=>$categories , 'category'=>$category, 'products' => $products, 'itemCarts' => $itemCarts]);
    }

    public function cart()
    {
        $categories = Category::where('parent_id',0)->get();
        $itemCarts = \Cart::getContent();
        return view( 'fronts.cart', ['categories'=>$categories , 'itemCarts'=>$itemCarts]);
    }

    public function searchPage()
    {
        $products = Product::searched()->orderBy('id','desc')->paginate(12);
        return view('fronts.searchPage')->with($this->__construct())->with('products', $products);
    }


    public function comment(Request $request, Product $product)
    {
        $this->validate($request,[
            'contents'=>['required']
        ]);

        $comment = Comment::create([
            'user_id'=> auth()->user()->id,
            'product_id'=> $product->id,
            'content'=> $request->contents,
        ]);

        if (auth()->user()-> role == 'admin'){
            $comment->status = '1';
            $comment->save();
        }

        session()->flash('success', 'Ihr Kommentar wurde gespeichert und wartet auf Genehmigung');
        return back();
    }

    public function recent()
    {
        $products = Product::orderBy('updated_at','desc')->paginate(12);
        return view('fronts.recent')->with($this->__construct())->with('products', $products);
    }

    public function discountProduct()
    {
        $products = Product::where('first_price','>',0)->orderBy('updated_at','desc')->paginate(12);
        return view('fronts.discount')->with($this->__construct())->with('products', $products);
    }

    public function about()
    {
        $abouts = About::all();
        return view('fronts.about')->with($this->__construct())->with('abouts',$abouts);;
    }

    public function contact()
    {
        $contacts = Contact::all();
        return view('fronts.contact')->with($this->__construct())->with('contacts',$contacts);
    }

    public function terms()
    {
        $terms = Term::all();
        return view('fronts.terms')->with($this->__construct())->with('terms',$terms);
    }
}
