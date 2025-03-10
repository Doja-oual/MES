<?php

namespace App\Http\Controllers;

use App\Models\articale;
use App\Models\category;
use Illuminate\Http\Request;

class ArticaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=articale::with('category')->get();
        return view('articales.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      $categories=category::all();
      return view('articles.create',compact($categories));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated=$request->validate([
            'name'=>'require|string|max:10',
            'description'=>'require|string|min:25',
            'category_id'=>'require|existe:categories,id',

        ]);

        articale::create($validated);
        return redirect()->route('articales.index');
    }

    /**
     * Display the specified
     *  resource.
     */
    public function show(articale $articale)
    {
        return view('articales.show',compact('articale'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(articale $articale)
    {
       $categories=category::all();
       return view('articales.edit',compact('categories','articale'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, articale $articale)
    {
        $validated=$request->validate([
            'name'=>'require|string|max:10',
            'description'=>'require|string|min:25',
            'category_id'=>'require|existe:categories,id',

        ]);
        $articale->update($validated);
        return redirect()->route('articales.index');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(articale $articale)
    {
        $articale->delete();
        return redirect()->route('articales.index');
    }
}
