<?php

namespace App\Http\Controllers\backEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sall;
use App\Traits\offerTrait;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class backEndController extends Controller
{

    use offerTrait;


    public function create(){
      return view('backEnd.sound.create');
    }

    public function store(Request $request){
      // validate request before insert to database
      $validator = Validator::make($request->all(),
        $rules = [
            'photo' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'name_ar' => 'required|string|max:100|unique:salls,name_ar',
            'name_en' => 'required|string|max:100|unique:salls,name_en',
            'price' => 'required|numeric',
            'details_ar' => 'required',
            'details_en' => 'required',
      ],
        $messages = [
            'name_ar.required' => trans('messages.offer name_ar require'),
            'name_en.unique' => trans('messages.offer name_en unique'),
            'price.required' => trans('messages.offer price require'),
            'price.numeric' => trans('messages.offer price numeric'),
            'details_ar.required' => trans('messages.offer details require'),
            'details_en.required' => trans('messages.offer details require'),
            'details_ar.unique' => trans('messages.offer details_ar unique'),
            'details_en.unique' => trans('messages.offer details_en unique'),
      ]);

      if($validator->fails()){
        return redirect()->back()->withErrors($validator)->withInputs($Request->all());
      }

      $file_name = $this -> saveImage(  $request -> photo , $request -> folder );

      Sall::create([
        'photo' => $file_name,
        'name_ar' => $request -> name_ar,
        'name_en' => $request -> name_en,
        'price' => $request -> price,
        'details_ar' => $request -> details_ar,
        'details_en' => $request -> details_en,

      ]);

      return redirect()->back()->with(['success' => 'تم العرض بنجاح']);
    }
}
