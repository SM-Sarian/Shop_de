<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Poster\createRequestPoster;
use App\Http\Requests\Admin\Poster\updateRequestPoster;
use App\Http\Requests\Admin\Slider\createRequestSlider;
use App\Http\Requests\Admin\Slider\updateRequestSlider;
use App\Integration\Database\Post;
use App\Models\Poster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PosterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posters = Poster::all();
        return view('admin.posters.index')->with('posters',$posters);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posters.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(createRequestPoster $request)
    {

        Poster::create([
           'name'=>$request->name,
           'url'=>$request->url,
           'image'=>$request->image->store('posters'),
        ]);

        session()->flash('success', 'Poster erfolgreich erstellt');
        return redirect(route('posters.index'));
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
    public function edit(Poster $poster)
    {
        return view('admin.posters.create')->with('poster',$poster);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateRequestPoster $request, Poster $poster)
    {
        $poster->update([
            'name'=>$request->name,
            'url'=>$request->url,

        ]);
        if ($request->hasFile('image')){
            Storage::delete($poster->image);
            $poster->image = $request->image->store('posters');
            $poster->save();
        }

        session()->flash('success', 'Poster erfolgreich bearbeitet');
        return redirect(route('posters.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Poster $poster)
    {
       Storage::delete($poster->image);
       $poster->delete();
        session()->flash('success', 'Poster erfolgreich gelöscht');
        return redirect(route('posters.index'));
    }
}
