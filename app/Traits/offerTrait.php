<?php

namespace App\Traits;


Trait offerTrait
{
  function  saveImage($photo , $folder){
      $file_extension =  $photo -> getClientOriginalExtension();
      $file_name = time().'.'.$file_extension;
      $folder ='images/offers';
      $path = $folder;
      $photo -> move($path , $file_name);

      return $file_name;
  }
}
