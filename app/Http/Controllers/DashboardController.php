<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Setlist;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $membersCount = Member::count();
        $setlistsCount = Setlist::count();
        $userCount = User::where('role' , 'user')->count();

        return view ('admin.index', compact('membersCount', 'setlistsCount', 'userCount'));
    }
}
