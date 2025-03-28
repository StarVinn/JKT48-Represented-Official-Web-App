<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
{
    public function index()
    {
        $member = Member::all();
        return response()->json([
            'success' => true,
            'data' => $member
        ]);
    }
    public function explore(){
        $members = Member::all();
        return view('explore', compact('members'));
    }
    public function createMultiple()
    {
        return view('members.create_multiple');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'tanggal_lahir' => 'required',
            'golongan_darah' => 'required',
            'horoskop' => 'required',
            'tinggi_badan' => 'required',
            'nama_panggilan' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'role' => 'required',
        ]);

        $member = new Member();
        $member->name = $request->name;
        $member->tanggal_lahir = $request->tanggal_lahir;
        $member->golongan_darah = $request->golongan_darah;
        $member->horoskop = $request->horoskop;
        $member->tinggi_badan = $request->tinggi_badan;
        $member->nama_panggilan = $request->nama_panggilan;
        $member->role = $request->role;

        if ($request->hasFile('foto')) {
            $filename = time() . '_' . $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move(public_path('images'), $filename);
            $member->foto = $filename;
        }

        $member->save();

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

        return response()->json([
            'success' => true,
            'message' => 'Member deleted successfully'
        ]);
    }
}
