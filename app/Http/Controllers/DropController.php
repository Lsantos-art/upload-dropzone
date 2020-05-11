<?php

namespace App\Http\Controllers;

use App\ImageDrop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DropController extends Controller
{
    public function store(Request $request)
    {
        $prefix = 'https://lsantos-products.s3.amazonaws.com/';
        if($request->hasFile('file')){
            $file = $request->file('file');
            $completeFileName = $file->getClientOriginalName();
            $fileNameOnly = pathinfo($completeFileName, PATHINFO_FILENAME);
            $extension = $file->getClientOriginalExtension();
            $randomized = rand();
            $name = str_replace(' ', '', $fileNameOnly).'-'.$randomized.''.time().'.'.$extension;
            $path['name'] = $name;
            $path['link'] = $prefix.$file->storeAs('', $name, $options = ['ACL' => 'public-read']);
            $path['product_id'] = $request->id;
            ImageDrop::create($path);
            $test2 = $request->hasFile('file');
        }

        return json_encode($name);
    }

    public function test()
    {
       return view('drop');
    }

    public function delete(Request $request)
    {
        $name = $request->name;

        $image = ImageDrop::where('name', $name)->first();
        if ($image) {
            $image->delete();
            $data = Storage::delete($name);
            $data = 'Produto deletado com sucesso!';
        }else{
            $data = 'Ops, houve um erro!';
        }

        return json_encode($data);

    }
}
