<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{

    protected $table = "offers";
    protected $fillable = ['name_ar' , 'name_en' , 'photo' , 'price' , 'details_ar' , 'details_en' , 'crated_at' , 'updated_at'];
    protected $hidden = ['crated_at' , 'updated_at'];

    // protected $table = "offers";
    // protected $fillable = ['name' , 'price' , 'details' , 'crated_at' , 'updated_at'];
    // protected $hidden = ['crated_at' , 'updated_at'];
}
