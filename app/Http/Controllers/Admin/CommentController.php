<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Comment\createRequestComments;
use App\Http\Requests\Admin\Comment\updateRequestComments;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::orderBy('id','desc')->paginate('10');
        return view('admin.comments.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(createRequestComments $request, Comment $comment)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        return view('admin.comments.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        $comments = Comment::all();
        return view('admin.comments.edit',compact('comment','comments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(updateRequestComments $request, Comment $comment)
    {
        $comment->update([
            'content'=> $request->contents,
            'status'=> $request->status,
        ]);

        session()->flash('success','Kommentar erfolgreich bearbeitet');
        return redirect(route('comments.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        session()->flash('success','Der Kommentar wurde erfolgreich gelöscht');
        return redirect(route('comments.index'));
    }

    public function reply(Request $request, Comment $comment)
    {
        $this->validate($request,[
            'contents'=>['required']
        ]);

        Comment::create([
            'user_id'=> auth()->user()->id,
            'product_id'=> $comment->product_id,
            'content'=> $request->contents,
            'child'=> $comment->id,
            'status'=> 1,
        ]);

        session()->flash('success','Die gewünschte Antwort wurde erfolgreich erstellt');
        return redirect(route('comments.index'));
    }
}
