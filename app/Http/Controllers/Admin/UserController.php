<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('id','desc')->paginate('10');;
        return view('admin.users.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(User $user)
    {
        return view('admin.users.edit')
            ->with('user',$user)
            ->with('roles' , [
                'admin'=>'Admin',
                'user'=>'User'
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request,[
            'name'=>['required'],
            'email'=>['required'],
            'role'=>['required'],
            'phone'=>['required'],
            'postcode'=>['required'],
            'state'=>['required'],
            'city'=>['required'],
            'address'=>['required'],
        ]);
        if (!empty($request->password)){
            $user->password = Hash::make($request->password);
            $user->save();
        }

      $user->update([
        'name'=>$request->name,
        'email'=>$request->email,
        'role'=>$request->role,
        'phone'=>$request->phone,
        'postcode'=>$request->postcode,
        'state'=>$request->state,
        'city'=>$request->city,
        'address'=>$request->address,
      ]);

      session()->flash('success','Benutzerinformationen wurden erfolgreich bearbeitet');
      return redirect(route('users.index'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        session()->flash('success','Benutzer erfolgreich gelöscht');
        return redirect(route('users.index'));
    }
}
