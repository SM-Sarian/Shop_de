<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Term;
use Illuminate\Http\Request;

class TermController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $terms = Term::all();
        return view('admin.terms.index')->with('terms',$terms);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.terms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $terms = Term::create([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        session()->flash('success', 'Der Inhalt der Seite Bedingungen wurde erfolgreich erstellt');
        return redirect(route('terms.index'));
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
    public function edit(Term $term)
    {
        return view('admin.terms.create',)->with('term',$term);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Term $term)
    {
        $term->update([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        session()->flash('success','Der Inhalt der Seite Bedingungen wurde erfolgreich bearbeitet');
        return redirect(route('terms.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Term $term)
    {
        $term->delete();
        session()->flash('success','Der Inhalt der Seite Bedingungen wurde erfolgreich gelöscht');
        return redirect(route('terms.index'));
    }
}
