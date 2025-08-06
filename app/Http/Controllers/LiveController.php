<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class LiveController extends Controller
{
    public function showroom()
    {
        // Ambil data terbaru dari API (sementara, tidak di-cache)
        $response = Http::get('https://www.showroom-live.com/api/live/onlives');

        if ($response->failed()) {
            $lives = Cache::get('jkt48_showroom_live', collect());
            return view('partials.live', [
                'lives' => $lives,
                'error' => 'Gagal ambil data baru, menampilkan dari cache.'
            ]);
        }

        $allLiveData = $response->json()['onlives'] ?? [];

        // Filter JKT48
        $newLives = collect($allLiveData)
            ->flatMap(fn ($group) => $group['lives'] ?? [])
            ->filter(fn ($live) => str_contains(strtolower($live['main_name']), 'jkt48'))
            ->unique(fn ($live) => $live['main_name']) // Remove duplicates by main_name
            ->values();

        $newCount = $newLives->count();
        $oldCount = Cache::get('jkt48_showroom_live_count', 0);

        // Kalau ada perubahan jumlah member live, refresh cache
        if ($newCount !== $oldCount) {
            Cache::put('jkt48_showroom_live', $newLives, now()->addSeconds(60));
            Cache::put('jkt48_showroom_live_count', $newCount, now()->addSeconds(60));
        }

        // Ambil dari cache
        $lives = Cache::get('jkt48_showroom_live', $newLives);

        return view('partials.live', [
            'lives' => $lives,
            'error' => null
        ]);
    }
    public function showroomApi()
    {
        // Ambil data terbaru dari API (sementara, tidak di-cache)
        $response = Http::get('https://www.showroom-live.com/api/live/onlives');

        if ($response->failed()) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal ambil data terbaru.'
            ], 500);
        }

        $allLiveData = $response->json()['onlives'] ?? [];

        // Filter JKT48
        $newLives = collect($allLiveData)
            ->flatMap(fn ($group) => $group['lives'] ?? [])
            ->filter(fn ($live) => str_contains(strtolower($live['main_name']), 'jkt48'))
            ->unique(fn ($live) => $live['main_name']) // Remove duplicates by main_name
            ->values();

        return response()->json([
            'success' => true,
            'data' => $newLives
        ]);
    }    
}
