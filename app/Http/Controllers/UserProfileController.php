<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Member;
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller
{
    public function showProfile()
    {
        $user = Auth::user();
        $members = Member::all();
        $userOshimenIds = $user->oshimen()->pluck('member_id')->toArray();

        return view('user.profile', compact('user', 'members', 'userOshimenIds'));
    }

    public function showProfileDetail()
    {
        $user = Auth::user();
        $oshimenMembers = $user->oshimen()->get();

        return view('user.profile_show', compact('user', 'oshimenMembers'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'profile_picture' => 'nullable|image|max:2048',
            'oshimen' => 'nullable|array',
            'oshimen.*' => 'exists:members,id',
        ]);

        $user->name = $request->input('name');
        $user->bio = $request->input('bio');

        if ($request->hasFile('profile_picture')) {
            if ($user->profile_picture) {
                Storage::delete('public/profile_picture/' . $user->profile_picture);
            }
            $file = $request->file('profile_picture');
            $filename = $file->getClientOriginalName();
            $file->move(public_path('profile_picture'), $filename);
            $user->profile_picture = $filename;
        }

        $user->save();

        $user->oshimen()->sync($request->input('oshimen', []));

        return response()->json(['redirect' => route('user.profile.show'), 'message' => 'Profile updated successfully']);
    }
}
