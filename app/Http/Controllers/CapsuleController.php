<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Capsule;
use App\Http\Controllers\Controller;

class CapsuleController extends Controller
{
    function getAllCapsules(){
    $capsules = CapsuleService::getAllCapsules();
    return  $this->responseJSON($capsules,200);
    }

    function addCapsule(CapsuleCreateRequest $request){
    $capsule = CapsuleService::createCapsule($request);
    return  $this->responseJSON($capsule,200);
    }

    function getCapsulesByUserId($userId) {
    $capsules = CapsuleService::getCapsulesByUserId($userId);
    return $this->responseJSON($capsules, 200);
}


    function getAllPublicCapsules(Request $request){
    $capsules = CapsuleService::getAllPublicCapsules($request);
    return  $this->responseJSON($capsules,200);
}

    function deleteCapsule($id){
    $capsule = CapsuleService::deleteCapsule($id);
    return $this->responseJSON($capsule,200);
}
}
