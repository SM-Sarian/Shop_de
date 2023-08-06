<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\createRequestCategory;
use App\Http\Requests\Admin\Category\updateRequestCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('id','desc')->paginate('10');
        return view('admin.categories.index')->with('categories',$categories);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.categories.create')->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(createRequestCategory $request)
    {
        Category::create([
            'name'=>$request->name,
            'parent_id'=>$request->parent_id,
            ]);

        session()->flash('success','Kategorie erfolgreich erstellt');
        return redirect(route('categories.index'));
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
    public function edit(Category $category)
    {
        $categories = Category::where('parent_id', 0 )->get();
        return view('admin.categories.create')->with('categories',$categories)->with('category',$category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateRequestCategory $request, Category $category)
    {
        $category->update([
            'name'=>$request->name,
            'parent_id'=>$request->parent_id
        ]);

        session()->flash('success','Kategorie erfolgreich aktualisiert');
        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category->parents()->count()) {
            session()->flash('error','Diese Kategorie hat Unterkategorien. Um es zu löschen, müssen Sie zunächst seine Unterkategorien löschen.');
            return redirect(route('categories.index'));
        }else{
            $category->delete();
            session()->flash('success','Die Kategorie wurde erfolgreich gelöscht');
            return redirect(route('categories.index'));
        }
    }
}
