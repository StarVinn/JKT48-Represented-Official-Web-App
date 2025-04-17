<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Setlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class JKT48Controller extends Controller
{
    private function getCachedMembers()
    {
        return Cache::remember('members_all', now()->addMinutes(10), function () {
            return Member::all();
        });
    }
    private function getCachedSetlists()
    {
        return Cache::remember('setlists_all', now()->addMinutes(10), function () {
            return Setlist::all();
        });
    }
    public function index()
    {
        $setlists = $this->getCachedSetlists();
        $members = $this->getCachedMembers();

        return view('explore', compact('setlists', 'members'));
    }
}
