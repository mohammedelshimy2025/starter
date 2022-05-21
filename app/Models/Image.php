<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
  protected $table = "images";

 protected $fillable = ['image_title','image_name',
                      'image_size','image_extension'];
}
