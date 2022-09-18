<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\GoogleKeep;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('id', 'desc')->paginate(10);
        return view('categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required'
        ]);
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->save();

        // Session a success/error
        // return back();
        session()->flash('success_status', 'Category created successfully.');
        return redirect()->route('categories.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        GoogleKeep::where('category_id' , $category->id)->delete();
        $category->delete();
        // Session a success/error
        // return back();
        session()->flash('success', 'Category created successfully.');
        return redirect()->route('categories.create');
    }
}
