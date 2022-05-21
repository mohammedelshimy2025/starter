<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mp3;
class Mp3Controller extends Controller
{
  public function index()
  {
      $songs = MP3::paginate(8);
      return view('laravel7-iframe.index', compact('songs'));
  }

  public function store(Request $request)
  {
          $input = $request->all();
              // dd($input);
              $file = $request->file('file');

              $thumnail = $request->file('song_thumnail');

                  foreach ($file as $key => $image) {

                  $filename = $image->getClientOriginalName();
                  $filesize = $image->getSize();
                  $extension = $image->getClientOriginalExtension();


                  $file_title = time().'.' .$extension;
                  $image -> move('laravel7/mp3/' , $file_title);

                  foreach ($thumnail as  $logo) {
                  $thumnail_extension = $logo->getClientOriginalExtension();
                  $song_thumnail = date('y-m-d').'.' .$thumnail_extension;
                  $logo-> move('laravel7/thumnail/' , $song_thumnail);

                  // {
                      // dd($song_thumnail,$file_title); die;
                  $multi_images = Mp3::create([
                      'song_unique_name' => $filename,
                      'song_name' => $file_title,
                      'song_size' => $filesize,
                      'song_extension' => $extension,
                      'song_thumnail' => $song_thumnail,
                      'song_title' => $request->song_title[$key],
                      'artist_name' => $request->artist_name[$key],
                      'album_name' => $request->album_name[$key],
                      'album_year' => $request->album_year[$key]
                  ]);



                  if ($multi_images ){
                      echo "true";
                      return redirect()->back();
                  }
                }
              }

            }


            public function download($id)
          {
              $rand_number = Rand('001, 100');
              $mp3_download = Mp3::find($id);
             return response()->download($pathToFile, $mp3_download, $rand_number);
          }
}
