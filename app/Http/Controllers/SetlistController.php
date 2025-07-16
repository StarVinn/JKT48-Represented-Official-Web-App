<?php

namespace App\Http\Controllers;

use App\Models\Setlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class SetlistController extends Controller
{
    private function getCachedSetlists()
    {
        return Cache::remember('setlists_all', now()->addMinutes(1200), function () {
            return Setlist::all();
        });
    }
    private function getCachedSetlistsNotAll()
    {
        return Cache::remember('setlists_all', now()->addMinutes(1200), function () {
            return Setlist::select('id','title', 'artist', 'production_year','image')->get();
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
        $setlists = $this->getCachedSetlistsNotAll();
        return view('partials.setlists', compact('setlists'));
    }
}
