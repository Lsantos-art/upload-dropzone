<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Images;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function test()
    {
        return view('drop');
    }

    public function index()
    {
        $products = Products::get();
        return view('products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::get();
        return view('forms.formproducts', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());

        $product = Products::where('name', $request->name)->first();

        if ($product){
            return redirect()
                    ->route('products.form');
        }

        $categorie = Categories::find($request->categorie);
        $data['name'] = $request->name;
        $data['description'] = $request->description;
        $data['price'] = $request->price;
        $data['categorie'] = $categorie->name;
        $data['categ_id'] = $request->categorie;

        $result = Products::create($data);

        for ($i = 0; $i < count($request->allFiles()['images']); $i++) {
            $file = $request->file()['images'][$i];
            $extension = $file->extension();
            $name = mt_rand().'.'.$extension;
            $file->storeAs('lsantos-products', $name, $options = ['ACL' => 'public-read']);
            $imageData['name'] = $name;
            $imageData['link'] = Storage::url('lsantos-products/'.$name);
            $imageData['product_id'] = $result->id;
            Images::create($imageData);
        }

        dd('Registrado...');
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
        $product = Products::find($id);
        return view('showProduct', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
