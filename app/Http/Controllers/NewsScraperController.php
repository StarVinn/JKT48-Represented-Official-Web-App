<?php

namespace App\Http\Controllers;

use App\Services\Jkt48ScraperService;
use Illuminate\Http\Request;
use App\Models\Member;
use Carbon\Carbon;

class NewsScraperController extends Controller
{
    protected Jkt48ScraperService $scraper;

    public function __construct(Jkt48ScraperService $scraper)
    {
        $this->scraper = $scraper;
    }

    public function view()
    {
        $data = $this->scraper->getAllNews();

        // Get today's date and current year
        $today = Carbon::now();
        $currentYear = $today->year;

        // Fetch all members and calculate next birthday date for sorting
        $members = Member::all()->map(function ($member) use ($currentYear, $today) {
            $birthDate = Carbon::parse($member->tanggal_lahir);
            // Set birthday this year
            $birthdayThisYear = $birthDate->copy()->year($currentYear);

            // If birthday this year already passed, set to next year
            if ($birthdayThisYear->lt($today)) {
                $birthdayThisYear->addYear();
            }

            $member->next_birthday = $birthdayThisYear;
            return $member;
        });

        // Sort members by next birthday date ascending
        $sortedMembers = $members->sortBy('next_birthday')->values();

        // Take first 3 members with upcoming birthdays
        $nextBirthdays = $sortedMembers->take(3);

        return view('user.dashboard', [
            'newsList' => $data,
            'nextBirthdays' => $nextBirthdays,
        ]);
    }

    public function index()
    {
        $data = $this->scraper->getAllNews();
        return view('admin.news', ['newsList' => $data]);
    }
}
