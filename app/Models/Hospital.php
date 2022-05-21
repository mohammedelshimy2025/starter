<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    protected $fillable = ['name' , 'address' , 'created_at'];
//    protected $hidden = [''];

    public $timestamps = false;

    ######################## Start Relations ##########################

    public function doctor(){
        return $this-> hasMany('App\Models\Doctor', 'hospital_id' );
    }

    ######################## End Relations ############################

}
