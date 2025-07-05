<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Setlist;
use App\Services\Jkt48ScraperService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class JKT48Controller extends Controller
{
    protected Jkt48ScraperService $scraper;

    public function __construct(Jkt48ScraperService $scraper)
    {
        $this->scraper = $scraper;
    }

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
    private function getnews()
    {
        $data = $this->scraper->getAllNews();
        return $data;
    }
    public function index()
    {
        $setlists = $this->getCachedSetlists();
        $members = $this->getCachedMembers();
        $newsList = $this->getnews();

        return view('explore', compact('setlists', 'members', 'newsList'));
    }
}
