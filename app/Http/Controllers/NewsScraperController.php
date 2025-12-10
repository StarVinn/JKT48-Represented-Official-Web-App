<?php

namespace App\Http\Controllers;

use App\Services\Jkt48ScraperService;
use App\Models\Member;
use Carbon\Carbon;

class NewsScraperController extends Controller
{
    protected Jkt48ScraperService $scraper;

    public function __construct(Jkt48ScraperService $scraper)
    {
        $this->scraper = $scraper;
    }

    // ===============================
    // USER DASHBOARD (NEWS + 3 BIRTHDAY)
    // ===============================
    public function view()
    {
        $news = $this->scraper->getAllNews();

        $today = Carbon::now();
        $currentYear = $today->year;

        // Hitung next birthday semua member
        $members = Member::all()->map(function ($member) use ($currentYear, $today) {
            $birthDate = Carbon::parse($member->tanggal_lahir);

            $thisYear = $birthDate->copy()->year($currentYear);

            if ($thisYear->lt($today)) {
                $thisYear->addYear();
            }

            $member->next_birthday = $thisYear;
            return $member;
        });

        $nextBirthdays = $members->sortBy('next_birthday')->take(3);

        return view('user.dashboard', [
            'newsList'      => $news,
            'nextBirthdays' => $nextBirthdays,
        ]);
    }

    // ===============================
    // ADMIN LIST NEWS
    // ===============================
    public function index()
    {
        $news = $this->scraper->getAllNews();
        return view('admin.news', ['newsList' => $news]);
    }

    // ===============================
    // API NEWS LIST
    // ===============================
    public function api()
    {
        $news = $this->scraper->getAllNews();

        return response()->json([
            'success' => true,
            'data'    => $news,
        ]);
    }
}
