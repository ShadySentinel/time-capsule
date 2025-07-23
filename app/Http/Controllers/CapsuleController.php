<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Capsule;

class CapsuleController extends Controller
{
    public function store(Request $request)
    {
        return response()->json(['message' => 'Capsule saved! (mocked)']);
    }

    public function publicCapsules()
    {
        return response()->json([
            ['message' => 'See you in 2040 habibi!', 'reveal_at' => '2030-01-01']
        ]);
    }
}
