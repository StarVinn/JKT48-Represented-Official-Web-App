<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Setlist;
class SetlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

public function run(): void
{
    $setlists = [
        [
            'setlist' => [
                'title' => 'Pajama Drive',
                'artist' => 'JKT48',
                'production_year' => 2012,
                'image' => 'pajama_drive.jpg',
            ],
            'songs' => [
                ['title' => 'Hari Pertama (Shonichi)', 'track_number' => 1, 'duration' => '03:45'],
                ['title' => 'Jurus Rahasia Teleport (Hissatsu Teleport)', 'track_number' => 2, 'duration' => '03:30'],
                ['title' => 'Putri Duyung yang Sedang Sedih (Gokigen Naname na Mermaid)', 'track_number' => 3, 'duration' => '03:50'],
                ['title' => 'Bersepeda Berdua (Futari Nori no Jitensha)', 'track_number' => 4, 'duration' => '03:40'],
                ['title' => 'Ekor Malaikat (Tenshi no Shippo)', 'track_number' => 5, 'duration' => '04:10'],
                ['title' => 'Pajama Drive (Pajama Drive)', 'track_number' => 6, 'duration' => '04:00'],
                ['title' => 'Prinsip Kesucian Hati (Junjou Shugi)', 'track_number' => 7, 'duration' => '03:55'],
                ['title' => 'Air Mata Kesendirian (Temodemo no Namida)', 'track_number' => 8, 'duration' => '04:05'],
                ['title' => 'Jeanne d\'Arc di Dalam Cermin (Kagami no Naka no Jeanne d\'Arc)', 'track_number' => 9, 'duration' => '03:50'],
                ['title' => 'Dua Tahun Kemudian (Two Years Later)', 'track_number' => 10, 'duration' => '03:35'],
                ['title' => 'Cara Menggunakan Hidup (Inochi no Tsukaimichi)', 'track_number' => 11, 'duration' => '04:20'],
                ['title' => 'Rugi Sudah Dicium (Kiss Shite Son Shichatta)', 'track_number' => 12, 'duration' => '03:45'],
                ['title' => 'Sakura Milikku (Boku no Sakura)', 'track_number' => 13, 'duration' => '04:00'],
                ['title' => 'Wasshoi J! (Wasshoi J!)', 'track_number' => 14, 'duration' => '03:30'],
                ['title' => 'Pelaut yang Bermimpi di Tengah Badai (Saifu wa Arashi ni Yume wo Miru)', 'track_number' => 15, 'duration' => '03:40'],
                ['title' => 'Kemeja Putih (Shiroi Shirts)', 'track_number' => 16, 'duration' => '04:15'],
            ]
        ],
        [
            // untuk menambahkan setlist lain
            /*'setlist' => [
                'title' => 'Setlist Lain',
                'artist' => 'Artis Lain',
                'production_year' => 2023,
            ],
            'songs' => [],*/
        ]
    ];
    // untuk menambahkan dengan foreach
    foreach ($setlists as $data) {
        // Check if 'setlist' key exists
        if (isset($data['setlist'])) {
            $setlist = Setlist::create($data['setlist']);
            $setlist->songs()->createMany($data['songs']);
        }
    }
}

}
