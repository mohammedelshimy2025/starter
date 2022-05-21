<?php

namespace App\Http\Controllers;

use App\Events\VideoViewer;
use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use App\Models\Video;
use App\Traits\offerTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
class OfferController extends Controller
{

    use offerTrait;

    public function create(){
      return view('offers.create');
    }

    public function store(OfferRequest $request){

      // Get a validator for an incoming insert request.
//      $route = $this-> getRoute();
//      $messages = $this-> getMessagrs();
//      $validator = Validator::make($request->all(), $route , $messages);
//
//      if( $validator -> fails()){
//        return redirect()->back()->withErrors($validator)->withInputs($request->all());
//      }
        $file_name = $this -> saveImage(  $request -> photo , $request -> folder );

      // insert
      Offer::create([
          'photo' => $file_name,
          'name_ar' => $request -> name_ar,
          'name_en' => $request -> name_en,
          'price' => $request -> price,
          'details_ar' => $request -> details_ar,
          'details_en' => $request -> details_en,

        ]);
         return 'تم العرض بنجاح';
      }


      public function editOffer($id){

          $offer = Offer::find($id);

          if (!$offer)

              return redirect() -> back();


          $offer = Offer::select(
          'photo' ,
          'id',
          'name_ar',
          'name_en' ,
          'price',
          'details_ar',
          'details_en'
          )->find($id);

          return view('offers.edit' , compact('offer'));
      }

      public function delete($id){

        $offer = Offer::find($id);

        if(!$offer)

            return redirect() -> back() -> with(['error' => ' العرض ليس موجود ']);

        $offer -> delete();

        return redirect() -> route('offers.all') -> with(['success' => __('messages.offers deleted')]);


      }

      public function update(OfferRequest $request , $id){

          $offer = Offer::find($id);

          $file_name = $this -> saveImage(  $request -> photo , $request -> folder );


          $offer -> update([
              'photo' => $file_name,
              'name_ar' => $request -> name_ar,
              'name_en' => $request -> name_en,
              'price' => $request -> price,
              'details_ar' => $request -> details_ar,
              'details_en' => $request -> details_en,
          ]);

//          $offer->update($request->all());

          return redirect()->back() -> with(['success' => 'تم بنجاح']);
      }






//      protected function getRoute(){
//        return $route = [
//            'photo' => 'required|string|mimes:jpg,png,jpeg|max:2048',
//            'name_ar' => 'required|string|max:100|unique:offers,name_ar',
//            'name_en' => 'required|string|max:100|unique:offers,name_en',
//            'price' => 'required|numeric',
//            'details_ar' => 'required',
//            'details_en' => 'required',
//        ];
//      }
//
//      protected function getMessagrs(){
//         return $messages = [
//            'name_ar.required' => trans('messages.offer name_ar require'),
//            'name_en.unique' => trans('messages.offer name_en unique'),
//            'price.required' => trans('messages.offer price require'),
//            'price.numeric' => trans('messages.offer price numeric'),
//            'details_ar.required' => trans('messages.offer details require'),
//            'details_en.required' => trans('messages.offer details require'),
//            'details_ar.unique' => trans('messages.offer details_ar unique'),
//            'details_en.unique' => trans('messages.offer details_en unique'),
//        ];
//      }

      public function getalldb(){
        $offers = Offer::select(
            'photo',
          'id',
          'price',
          'name_'. LaravelLocalization::getCurrentLocale(). ' as name',
          'details_'. LaravelLocalization::getCurrentLocale(). ' as details'
          ) ->get();
        return view('offers.getAllOfferFromDB', compact('offers'));
      }


      // Event And Litsener

        public function eventAndListener(){

            $video = Video::first();
            event(new VideoViewer($video));
            return view('eventAndListener.video' , compact('video'));
        }





}
