<?php

namespace App\Http\Controllers;

use App\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::get();
        return view('categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forms.formcateg');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $categories = Categories::class;

        $categorie = Categories::where('name', $request->name)->first();
        if ($categorie){
            return redirect()
                    ->route('categ.form');
        }

        $data['name'] = $request->name;
        $data['slug'] = $request->slug;
        Categories::create($data);
            return redirect()
                        ->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorie = Categories::find($id);
        return view('forms.form-edit-categ', compact('categorie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //dd($request->all());
        $categorie = Categories::find($request->id);
        if (!$categorie){
            return redirect()
                    ->route('categories');
        }

        $data['name'] = $request->name;
        $data['slug'] = $request->slug;
        $categorie->update($data);
            return redirect()
                    ->route('categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categorie = Categories::find($id);
        if ($categorie) {
            $categorie->delete();
            return redirect()
                    ->route('categories');
        }

        return redirect()
                    ->route('categories');
    }
}
