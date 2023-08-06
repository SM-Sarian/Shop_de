<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Contact\createRequestContact;
use App\Http\Requests\Admin\Contact\updateRequestContact;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('admin.contact.index')->with('contacts',$contacts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.contact.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(createRequestContact $request)
    {
        Contact::create([
            'title' => $request->title,
            'body' => $request->body,
            'image' => $request->image->store('contact'),
        ]);

        session()->flash('success', 'Der Inhalt der Kontaktseite wurde erfolgreich erstellt');
        return redirect(route('contact.index'));
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
    public function edit(Contact $contact)
    {

        return view('admin.contact.create',)->with('contact',$contact);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateRequestContact $request, Contact $contact)
    {
        $contact->update([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        if ($request->hasFile('image')){
            Storage::delete($contact->image);
            $contact->image = $request->image->store('contact');
            $contact->save();
        }

        session()->flash('success','Die Bearbeitung unserer Kontaktseite wurde erfolgreich durchgeführt');
        return redirect(route('contact.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        Storage::delete($contact->image);
        $contact->delete();
        session()->flash('success','Der Inhalt der Kontaktseite wurde erfolgreich gelöscht');
        return redirect(route('contact.index'));
    }
}
