<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Setlist;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(){
        $membersCount = Member::count();
        $setlistsCount = Setlist::count();
        $userCount = User::where('role' , 'user')->count();

        // Calculate next birthdays
        $today = Carbon::now();
        $currentYear = $today->year;

        $members = Member::all()->map(function ($member) use ($currentYear, $today) {
            $birthDate = Carbon::parse($member->tanggal_lahir);
            $birthdayThisYear = $birthDate->copy()->year($currentYear);

            if ($birthdayThisYear->lt($today)) {
                $birthdayThisYear->addYear();
            }

            $member->next_birthday = $birthdayThisYear;
            return $member;
        });

        $sortedMembers = $members->sortBy('next_birthday')->values();
        $nextBirthdays = $sortedMembers->take(3);

        return view ('admin.index', compact('membersCount', 'setlistsCount', 'userCount', 'nextBirthdays'));
    }
}
