<?php

namespace App\Http\Controllers\relations;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Phone;
use App\User;
use Illuminate\Http\Request;

class RelationController extends Controller
{
    public function hasOne($id){
        $users = User::find($id);

        $phone = Phone::find($id);

        return view('relations', compact('users' , 'phone'));
//        return response() -> json($users);
    }

    public function hasOneRelationReserve(){
            $users = User::whereHas('phone')-> get();

    //        return view('relations', compact('users'));
            return response() -> json($users);

        }

    public function getUserHasPhone(){
        $users = User::whereHas('phone')-> get();

//        $users ->makeVisible(['phone']);
//        $users ->makeHidden(['phone']);
        return response() -> json($users);

    }

    public function getUserNotHasPhone(){
        $users = User:: whereDoesntHave('phone')->get();
        return response() -> json($users);

    }

    public function getUserHasPhoneWithCondition(){
        $users = User::whereHas('phone' , function($q){
            $q ->where('code' , '02');
        })->get();
        return response() -> json($users);

    }



    ####################### Start Has many Relation ###########################

    public function gethospital(){
//        $hospitals = Hospital::find(1);

        $hospitals = Hospital::with('doctor')->find(1);

        $doctors =  $hospitals -> doctor;

        foreach ($doctors as $doctor){
            echo $doctor -> name.'<br>';
        }

    }

    public function hospital(){
        $hospitals = Hospital::select('id' , 'name' , 'address' )->get();

      return view('relation.hospital' , compact('hospitals'));
    }

    public function doctor($hospital_id){

        $hospital = Hospital::find($hospital_id);

        $doctors = $hospital -> doctor;

        return view('relation.doctor' , compact('doctors'));
    }


    //
    public function hospitalHasDoctors(){
        return Hospital::whereHas('doctor')->get();
    }

    public function hospitalNotHasDoctors(){
        return Hospital::whereDoesntHave('doctor')->get();
    }

    public function hospitalHasDoctorsMale(){
        return Hospital::whereHas('doctor' , function ($q){
           $q -> where('gender', 'male');
        })->get();
    }

    public function deleteHospital($hospital_id){
        $hospitals = Hospital::find($hospital_id);

        $hospitals -> doctor() -> delete();

        $hospitals -> delete();

        return redirect()-> back() -> with('success', 'تم المسح بنجاح');
    }

    public function getDoctorService(){
        $doctor = Doctor::find(2);

        return $doctor ->services;

    }

    ####################### End Has many Relation ###########################

}
