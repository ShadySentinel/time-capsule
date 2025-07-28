<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Capsule;
use App\Http\Controllers\Controller;
use App\Services\CapsuleService;

class CapsuleController extends Controller
{
    function getAllCapsules(){
    $capsules = CapsuleService::getAllCapsules();
    //return  $this->responseJSON($capsules,200);
    return $capsules;
    }

    function addCapsule(CapsuleCreateRequest $request){
    $capsule = CapsuleService::createCapsule($request);
    //return  $this->responseJSON($capsule,200);
    }

    function getCapsulesByUserId($userId) {
    $capsules = CapsuleService::getCapsulesByUserId($userId);
    //return $this->responseJSON($capsules, 200);
    return $capsules;
}


    function getAllPublicCapsules(Request $request){
    $capsules = CapsuleService::getAllPublicCapsules($request);
    //return  $this->responseJSON($capsules,200);
    return $capsules;
}

    function deleteCapsule($id){
    $capsule = CapsuleService::deleteCapsule($id);
    //return $this->responseJSON($capsule,200)
}
}
