<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Session;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'store']);
    }

    public function index()
    {
        $comments = Comment::orderBy('id', 'desc')->paginate(10);
        return view ('comments.index', compact('comments'));
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required|min:3',
    		'email' => 'required|email',
    		'comment' => 'required| min:2'
		]);

		Comment::create($request->all());
		Session::flash('msg', 'Your commend has been addedd successfully, But we have to review it first!');
		return redirect()->back();
    }


    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        Session::flash('msg', 'The comment has been deleted succesfully');
        return redirect()->back();
    }

    public function update($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->approve = 1;
        $comment->save(); 
        Session::flash('msg', 'The comment has been approved');
        return redirect()->back();
    }
}
