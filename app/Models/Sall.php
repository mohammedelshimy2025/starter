<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sall extends Model
{
  protected $table = "salls";
  protected $fillable = ['name_ar' , 'name_en' , 'photo' , 'price' , 'details_ar' , 'details_en' , 'crated_at' , 'updated_at'];
  protected $hidden = ['crated_at' , 'updated_at'];
}
