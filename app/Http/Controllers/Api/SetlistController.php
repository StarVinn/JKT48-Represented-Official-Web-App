<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Setlist;

class SetlistController extends Controller
{
    public function index()
    {
        $setlists = Setlist::with('songs')->get();

        return response()->json([
            'success' => true,
            'data' => $setlists
        ]);
    }

    public function show($id)
    {
        $setlist = Setlist::with('songs')->find($id);

        if (!$setlist) {
            return response()->json([
                'success' => false,
                'message' => 'Setlist not found.'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $setlist
        ]);
    }
}

