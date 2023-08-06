<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\createRequestProduct;
use App\Http\Requests\Admin\Product\updateRequestProduct;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('id','desc')->paginate('10');
        return view('admin.products.index')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create')->with('categories',$categories);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(createRequestProduct $request)
    {
        Product::create([
            'category_id'=>$request->category_id,
            'user_id'=>auth()->user()->id,
            'title_de'=>$request->title_de,
            'title_en'=>$request->title_en,
            'body'=>$request->body,
            'first_price'=>$request->first_price,
            'price'=>$request->price,
            'image'=>$request->image->store('products'),
            'brand'=>$request->brand,
            'guarantee'=>$request->guarantee,
            'option'=>$request->option,
            'slug'=>$this->slug($request->title_de),
        ]);

        session()->flash('success','Produkt erfolgreich erstellt');
        return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories' , 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateRequestProduct $request, Product $product)
    {
        $product->update([
            'category_id'=>$request->category_id,
            'user_id'=>auth()->user()->id,
            'title_de'=>$request->title_de,
            'title_en'=>$request->title_en,
            'body'=>$request->body,
            'first_price'=>$request->first_price,
            'price'=>$request->price,
            'brand'=>$request->brand,
            'guarantee'=>$request->guarantee,
            'option'=>$request->option,
            'slug'=>$this->slug($request->title_de),
        ]);
        if ($request->hasFile('image')){
            Storage::delete($product->image);
            $product->image = $request->image->store('products');
            $product->save();
        }

        session()->flash('success','Das Produkt erfolgreich bearbeitet');
        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Storage::delete($product->image);
        $product->delete();
        session()->flash('success','Das Produkt erfolgreich gelöscht');
        return redirect(route('products.index'));
    }


    public function slug($title){

        $explode = explode(' ', $title);
        return $implode = implode('-',$explode);
    }
}
