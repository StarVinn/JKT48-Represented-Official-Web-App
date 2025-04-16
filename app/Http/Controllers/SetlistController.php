<?php

namespace App\Http\Controllers;

use App\Models\Setlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SetlistController extends Controller
{
    private function getCachedSetlists()
    {
        return Cache::remember('setlists_all', now()->addMinutes(10), function () {
            return Setlist::all();
        });
    }

    public function index()
    {
        // Fetch all setlists from the database
        $setlists = $this->getCachedSetlists();
        return response()->json([
            'success' => true,
            'data' => $setlists
        ]);
    }
    public function getSetlist()
    {
        // Fetch all setlists from the database
        $setlists = $this->getCachedSetlists();
        return view('partials.setlists', compact('setlists'));
    }
}
