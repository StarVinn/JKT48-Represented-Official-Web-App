<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use App\Exports\MembersExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Cache;


class MemberController extends Controller
{
    // Method to get all members with caching
    private function getCachedMembers()
    {
        return Cache::remember('members_all', now()->addMinutes(1200), function () {
            return Member::select('id','name','tanggal_lahir','golongan_darah','horoskop','tinggi_badan','nama_panggilan','foto')->get();
        });
    }
    private function getCachedMembersSelect()
    {
        return Cache::remember('members_all', now()->addMinutes(1200), function () {
            return Member::select('id','name','foto','role')->get();
        });
    }

    public function index()
    // untuk menampilkan semua member di api
    {
        $member = $this->getCachedMembers();
        return response()->json([
            'success' => true,
            'data' => $member
        ]);
    }
    public function explore(){
    // menampilkan semua member di halaman explore
        $members = $this->getCachedMembersSelect();
        return view('explore', compact('members'));
    }
    public function getMembers(){
    // menampilkan semua member di halaman dashboard
        $members = $this->getCachedMembersSelect();
        return view('partials.members', compact('members'));
    }
    public function export() 
    {
        // Export all members to an Excel file
        return Excel::download(new MembersExport, 'members.xlsx');
    }
    public function detailmembers()
    {
        // Redirect to a default member detail or show a message
        $firstMember = Member::first();
        if ($firstMember) {
            return redirect()->route('user.detailmember', ['id' => $firstMember->id]);
        } else {
            abort(404, 'No members found');
        }
    }

    public function createMultiple()
    {
        return view('admin.create_multiple');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required',
            'tanggal_lahir' => 'required',
            'golongan_darah' => 'required',
            'horoskop' => 'required',
            'tinggi_badan' => 'required',
            'nama_panggilan' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'role' => 'required',
            'twitter' => 'required',
            'instagram' => 'required',
        ]);

        $member = new Member();
        $member->name = $request->name;
        $member->tanggal_lahir = $request->tanggal_lahir;
        $member->golongan_darah = $request->golongan_darah;
        $member->horoskop = $request->horoskop;
        $member->tinggi_badan = $request->tinggi_badan;
        $member->nama_panggilan = $request->nama_panggilan;
        $member->role = $request->role;
        $member->twitter = $request->twitter;
        $member->twitter = $request->twitter;
        // Simpan foto jika ada
        if ($request->hasFile('foto')) {
            $filename = time() . '_' . $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move(public_path('images'), $filename);
            $member->foto = $filename;
        }

        $member->save();
        
        Cache::forget('members_all');

        return response()->json([
            'success' => true,
            'message' => 'Member created successfully',
            'data' => $member
        ]);
        
    }
    public function storeMultiple(Request $request)
    {
        $membersData = $request->members;

        foreach ($membersData as $index => $data) {
            $member = new Member();

            $member->name = $data['name'];
            $member->tanggal_lahir = $data['tanggal_lahir'];
            $member->golongan_darah = $data['golongan_darah'];
            $member->horoskop = $data['horoskop'];
            $member->tinggi_badan = $data['tinggi_badan'];
            $member->nama_panggilan = $data['nama_panggilan'];
            $member->role = $data['role'];
            $member->twitter = $data['twitter'];
            $member->instagram = $data['instagram'];

            // Simpan foto jika ada
            if (isset($data['foto']) && $request->hasFile("members.$index.foto")) {
                $file = $request->file("members.$index.foto");
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('images/'), $filename);
                $member->foto = $filename;
            }

            $member->save();
        }

    return redirect()->route('members.index')->with('success', 'Semua member berhasil ditambahkan.');
    }

    
    public function show($id)
    {
        // Find the member by ID
        $member = Member::find($id);
        if (!$member) {
            return response()->json([
                'success' => false,
                'message' => 'Member not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $member
        ]);
    }

    public function destroy($id)
    {
        // Delete the member by ID
        $member = Member::find($id);
        if (!$member) {
            return response()->json([
                'success' => false,
                'message' => 'Member not found'
            ], 404);
        }

        if ($member->foto && file_exists(public_path('images/' . $member->foto))) {
            unlink(public_path('images/' . $member->foto));
        }
        
        $member->delete();

        Cache::forget('members_all');

        return response()->json([
            'success' => true,
            'message' => 'Member deleted successfully'
        ]);
    }

    public function detailmember($id)
    {
        $member = Member::find($id);
        if (!$member) {
            abort(404, 'Member not found');
        }
        return view('user.detailmembers', compact('member'));
    }
}
