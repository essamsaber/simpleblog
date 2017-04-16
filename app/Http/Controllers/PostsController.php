<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use App\Category;
use Session;
use Purifier;
use Intervention\Image\Facades\Image as Image;
use Storage;

class PostsController extends Controller
{

    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        return view ('posts.index', compact('posts'));
    }


    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create', compact('categories', 'tags'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'body' => 'required',
            'featured_image' => 'sometimes|image',

        ]);
        $post = new Post;
        $post->category_id = $request->category_id;
        $post->title = $request->title;
        $post->body =$request->body;
        if($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = time(). '.' . $image->getClientOriginalExtension();
            $location = 'images/'. $filename;
            Image::make($image)->resize(800, 400)->save($location);
            $post->image = $filename;
        }
        $post->save();
        $post->tags()->sync($request->tags, false);
        Session::flash('msg', 'The post has been created successfully');
        return redirect()->route('posts.show', $post->id);
    }


    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }


    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.edit', compact('post', 'categories', 'tags'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:255',
            'body' => 'required'
        ]);
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->body = $request->body;
        if($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = time(). '.' . $image->getClientOriginalExtension();
            $location = 'images/'. $filename;
            Image::make($image)->resize(800, 400)->save($location);
            $oldFilename = $post->image;
            $post->image = $filename;
            Storage::delete($oldFilename);
        }
        
        $post->save();
        
        if(isset($request->tags)){
            $post->tags()->sync($request->tags);
        } else {
            $post->tags()->sync([]);
        }
        
        $post->tags()->sync($request->tags, false);
        
        Session::flash('msg', 'Post has been updated successfully');
        return redirect()->back();
    }


    public function destroy($id)
    {
        $post = Post::find($id);
        $post->tags()->detach();
        $post->delete();
        Session::flash('msg', 'Post has been deleted successfully');
        return redirect('/posts');
    }
}
