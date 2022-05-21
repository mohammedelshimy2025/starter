<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = ['name' , 'title' , 'hospital'];
//    protected $hidden = [''];

    public $timestamps = false;


    ######################## Start Relations ##########################

    public function hospitals(){
        return $this-> belongsTo('App\Models\Hospital', 'hospital_id' );
    }

    public function services(){
        return $this ->belongsToMany('App\Models\Service', 'doctor_service' , 'doctor_id' , 'service_id');
    }

    ######################## End Relations ############################


}

