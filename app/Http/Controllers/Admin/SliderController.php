<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Slider\createRequestSlider;
use App\Http\Requests\Admin\Slider\updateRequestSlider;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.sliders.index')->with('sliders',$sliders);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(createRequestSlider $request)
    {
        Slider::create([
            'image'=>$request->image->store('sliders')
        ]);
        session()->flash('success','Slider-Bild erfolgreich erstellt');
        return redirect(route('sliders.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(slider $slider)
    {
        return view('admin.sliders.create')->with('slider',$slider);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateRequestSlider $request, Slider $slider)
    {
        if ($request->hasFile('image')){
            Storage::delete($slider->image);
            $slider->image = $request->image->store('sliders');
            $slider->save();
        }

        session()->flash('success','Slider-Bild erfolgreich bearbeitet');
        return redirect(route('sliders.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slider $slider)
    {
        Storage::delete($slider->image);
        $slider->delete();
        session()->flash('success','Slider-Bild erfolgreich gelöscht');
        return redirect(route('sliders.index'));
    }
}
