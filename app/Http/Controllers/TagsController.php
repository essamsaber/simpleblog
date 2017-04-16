<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use Session;
class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view ('tags.index', compact('tags')) ;
    }


    public function store(Request $request)
    {
        $this->validate($request, ['
            "name" => "required|max:255"
        ']);
        Tag::create(['name' => $request->name]);
        Session::flash('msg', 'Tag has been added successfully');
        return redirect()->back();
    }


    public function show($id)
    {
        $tag = Tag::find($id);
        return view ('tags.show', compact('tag'));
    }


    public function edit($id)
    {
        $tag = Tag::find($id);
        return view ('tags.edit', compact('tag'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $tag = Tag::find($id);
        $tag->update(['name' => $request->name]);
        Session::flash('msg', 'Tag has been updated successfully');
        return redirect()->back();
    }


    public function destroy($id)
    {
       $tag = Tag::find($id);
       $tag->posts()->detach();
       $tag->delete();
       Session::flash('msg', 'Tag has been deleted successfully');
       return redirect()->back();
    }
}
