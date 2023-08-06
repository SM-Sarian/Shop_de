<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\About\createRequestAbout;
use App\Http\Requests\Admin\About\updateRequestAbout;
use App\Models\About;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $abouts = About::all();
        return view('admin.about.index')->with('abouts',$abouts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(createRequestAbout $request)
    {
        $abouts = About::create([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $request->image->store('About'),
        ]);

        session()->flash('success', 'Der Seiteninhalt Über uns wurde erfolgreich erstellt');
        return redirect(route('about.index'));
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
    public function edit(About $about)
    {

        return view('admin.about.create',)->with('about',$about);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateRequestAbout $request, About $about)
    {
        $about->update([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        if ($request->hasFile('image')){
            Storage::delete($about->image);
            $about->image = $request->image->store('About');
            $about->save();
        }

        session()->flash('success','Die Seite Über uns wurde erfolgreich bearbeitet');
        return redirect(route('about.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(About $about)
    {
        Storage::delete($about->image);
        $about->delete();
        session()->flash('success','Der Inhalt der Seite Über uns wurde erfolgreich gelöscht');
        return redirect(route('about.index'));
    }
}
