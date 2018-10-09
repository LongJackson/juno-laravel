<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Image,Product};

class ImageController extends Controller
{
    //

    public function index()
    {	
    	$images = Image::all();
        $title = "Thư viện hình ảnh";
    	return view('backend.image.index', compact('images', 'title'));
    }

    public function formupload(Request $request)
    {
        if ($request->ajax()) {
            return view('backend.image.form.upload');
        }
    }

    public function image(Request $request)
    {
        if ($request->ajax()) {
            $images = Image::all();
            $id = $request->id;
            $select = [];
            if($id != 'false'){
                if ($request->type == 'thumbnail') {
                $select[] = Product::findOrFail($id)->prod_thumbnail;
                }
                if ($request->type == 'gallery') {
                    foreach (Product::findOrFail($id)->gallery as $gallery) {
                        $select[] = $gallery->img_id;
                    }
                }
            }
            
            return view('backend.image.form.media' , compact('images','select'))->render();
        }
    }

    public function store(Request $request)
    {
    	if ($request->ajax()) {
            if ($request->hasFile('file')) {
                $imageFiles = $request->file('file');

                foreach ($request->file('file') as  $file ) {

                    if ($file->isValid()) {
                    	$name = $file->getClientOriginalName();
                    	$type = $file->getClientOriginalExtension();
                       	$path = $file->storeAs('public/upload/images', $name);
                       Image::create([
                       		'img_name' => $name,
                       		'img_type' => $type
                       ]);
                    }
                }
            }
        }
    }
}
