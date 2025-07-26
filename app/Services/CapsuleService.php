<?php

namespace App\Services;

use App\Models\Capsule;
use Illuminate\Http\Request;

class CapsuleService
{
    public static function getAllCapsules()
    {
        return Capsule::findAll();
    }

    public static function createCapsule($request)
    {
        $data = $request->validated();
        return Capsule::create($data);
    }

    public static function getCapsulesByUserId($userId)
    {
        return Capsule::where('user_id', $userId)->with('ipLocation')->get();
    }

    public static function getAllPublicCapsules(Request $request)
    {
        $filters = $request->only(['country', 'mood', 'start_date', 'end_date']);
        return Capsule::filter($filters)->findAll(true);
    }

    public static function deleteCapsule($id)
    {
        $capsule = Capsule::find($id);
        $capsule->delete();
        return ['message' => 'Capsule deleted successfully'];
    }
}