<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;

class ImageController extends Controller
{
      public function index(){
        $images = Image::all();
        return view('laravel7.index', compact('images'));
    }

    public function store(Request $request){
      $input = $request->all();
        // dd($input);
        $file = $request->file('file');

        if($file)  {

            $filename = $file->getClientOriginalName();
            $filesize = $file->getClientSize();
            $extension = $file->getClientOriginalExtension();

            $file_title = time().'.' .$extension;

            $file -> move('laravel7/images/' , $file_title);

            $multi_images = Image::create([
                'image_title' => $filename,
                'image_name' => $file_title,
                'image_size' => $filesize,
                'image_extension' => $extension
            ]);

            if ($multi_images ){
                echo "true";
                return redirect()->back();
            }

          }

        }
}
