<?php

namespace App\Http\Controllers;

use App\Http\Requests\GoogleKeepRequest;
use App\Models\Category;
use App\Models\GoogleKeep;
use Illuminate\Http\Request;

class GoogleKeepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('googlekeep.index' , [
            'categories' => Category::all(),
            'googlekeeps' => GoogleKeep::all(),
        ]);
    }


    public function categorySearch($id) {
        $googlekeeps = GoogleKeep::where('category_id' , $id)->get();
        $categories = Category::all();
        return view('googlekeep.index', compact('googlekeeps', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GoogleKeepRequest $request)
    {
        // Create in DB
        $googlekeep = new GoogleKeep();
        $googlekeep->category_id = $request->category_id;
        $googlekeep->title = $request->title;
        $googlekeep->note = $request->note;
        $googlekeep->status = 'active';
        $googlekeep->save();

        // // Redirect with flash
        session()->flash('success', 'Category has been created successfully !');
        return redirect()->route('index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GoogleKeep  $googleKeep
     * @return \Illuminate\Http\Response
     */
    public function edit(GoogleKeep $googleKeep)
    {
        return $googleKeep;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GoogleKeep  $googleKeep
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GoogleKeep $googleKeep)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GoogleKeep  $googleKeep
     * @return \Illuminate\Http\Response
     */
    public function destroy(GoogleKeep $googleKeep)
    {
       echo 'hello';
    //    dd($googleKeep);
        // if ($googleKeep) {
        //     $googleKeep->delete();
        //     session()->flash('success', 'GoogleKeep has been deleted successfully !');
        // }

        // return back();
    }
}
