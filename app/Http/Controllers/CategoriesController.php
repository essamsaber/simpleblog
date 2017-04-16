<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Session;
class CategoriesController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view ('categories.index', compact('categories'));
    }

    public function store(Request $request)
    { 
        $this->validate($request, [
            'name' => 'required'
        ]);
        $category = new Category;
        $category->name = $request->name;
        $category->save();
        Session::flash('msg', 'New category has been added succesfully');
        return redirect()->back();
    }

       public function show($id)
    {
        //
    }

    public function edit($id)
    {

        $category = Category::find($id);
        return view ('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $category = Category::find($id);
        $category->update(['name' => $request->name]);
        Session::flash('msg', 'Category has been updated successfully');
        return redirect()->back();
    }

    public function destroy($id)
    {
       Category::destroy($id);
       Session::flash('msg', 'Category has been deleted successfully');
       return redirect()->back();
    }
}
