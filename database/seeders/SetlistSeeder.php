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
            'setlist' => [
                'title' => 'Renai Kinshi Jourei',
                'artist' => 'JKT48',
                'production_year' => 2012,
                'image' => 'rkj.jpg',
            ],
            'songs' => [
                ['title' => 'Cahaya Panjang (Nagai Hikari)', 'track_number' => 1, 'duration' => '03:50'],
                ['title' => 'Di Tengah Hujan Badai Tiba-Tiba (Squall no Aida ni)', 'track_number' => 2, 'duration' => '03:40'],
                ['title' => 'Gadis SMA Putri Tidur (JK Nemurihime)', 'track_number' => 3, 'duration' => '03:55'],
                ['title' => 'Jatuh Cinta Setiap Bertemu Denganmu (Kimi ni Au Tabi Koi wo Suru)', 'track_number' => 4, 'duration' => '04:00'],
                ['title' => 'Malaikat Hitam (Kuroi Tenshi)', 'track_number' => 5, 'duration' => '03:45'],
                ['title' => 'Virus Tipe Hati (Heart Gata Virus)', 'track_number' => 6, 'duration' => '03:30'],
                ['title' => 'Aturan Anti Cinta (Renai Kinshi Jourei)', 'track_number' => 7, 'duration' => '04:10'],
                ['title' => 'Tsundere!', 'track_number' => 8, 'duration' => '03:35'],
                ['title' => 'Mawar Natal Musim Panas (Manatsu no Christmas Rose)', 'track_number' => 9, 'duration' => '04:05'],
                ['title' => 'Switch', 'track_number' => 10, 'duration' => '03:50'],
                ['title' => '109 (Marukyuu)', 'track_number' => 11, 'duration' => '03:40'],
                ['title' => 'Jejak Awan Pesawat (Hikoukigumo)', 'track_number' => 12, 'duration' => '03:45'],
                ['title' => 'Sneakers Waktu Itu (Ano Koro no Sneakers)', 'track_number' => 13, 'duration' => '04:00'],
                ['title' => 'JKT Datang! (JKT Sanjou!)', 'track_number' => 14, 'duration' => '03:55'],
                ['title' => 'Nafas Dalam Air Mata (Namida no Shinkokyuu)', 'track_number' => 15, 'duration' => '04:15'],
                ['title' => 'Teriakan Berlian (Oogoe Diamond)', 'track_number' => 16, 'duration' => '04:20'],
            ],
        ],
        [
            'setlist' => [
                'title' => 'Aitakatta',
                'artist' => 'JKT48',
                'production_year' => 2023,
                'image' => 'aitakatta.jpg',
            ],
            'songs' => [
                ['title' => 'Boneka yang Sedih (Nageki no Figure)', 'track_number' => 1, 'duration' => '04:30'],
                ['title' => 'Air Mata Shounan (Namida no Shounan)', 'track_number' => 2, 'duration' => '04:08'],
                ['title' => 'Ingin Bertemu (Aitakatta)', 'track_number' => 3, 'duration' => '03:47'],
                ['title' => 'Cherry Tepi Pantai (Nagisa no Cherry)', 'track_number' => 4, 'duration' => '03:44'],
                ['title' => 'Kaca Berbentuk I Love You (Glass no I Love You)', 'track_number' => 5, 'duration' => '02:55'],
                ['title' => 'Rencana Cinta (Koi no Plan)', 'track_number' => 6, 'duration' => '04:06'],
                ['title' => 'Peluklah Aku Dari Belakang (Senaka Kara Dakishimete)', 'track_number' => 7, 'duration' => '03:27'],
                ['title' => 'Revolusi Rio (Rio no Kakumei)', 'track_number' => 8, 'duration' => '04:11'],
                ['title' => 'Tetapi (Dakedo)', 'track_number' => 9, 'duration' => '04:36'],
                ['title' => 'Dear My Teacher', 'track_number' => 10, 'duration' => '04:20'],
                ['title' => 'Pintu Masa Depan (Mirai no Tobira)', 'track_number' => 11, 'duration' => '05:02'],
                ['title' => 'JKT48 (Jakarta48)', 'track_number' => 12, 'duration' => '03:56'],
                ['title' => 'Rok Bergoyang (Skirt, Hirari)', 'track_number' => 13, 'duration' => '04:02'],

                

            ],
        ],
        [
            'setlist' => [
                'title' => 'Kira-Kira Girls',
                'artist' => 'JKT48',
                'production_year' => 2025,
                'image' => 'kira-kira-girls.png',
            ],
            'songs' => [
                ['title' => 'Boneka yang Sedih (Nageki no Figure)', 'track_number' => 1, 'duration' => '04:30'],
                ['title' => 'Air Mata Shounan (Namida no Shounan)', 'track_number' => 2, 'duration' => '04:08'],
                ['title' => 'Ingin Bertemu (Aitakatta)', 'track_number' => 3, 'duration' => '03:47'],
                ['title' => 'Cherry Tepi Pantai (Nagisa no Cherry)', 'track_number' => 4, 'duration' => '03:44'],
                ['title' => 'Kaca Berbentuk I Love You (Glass no I Love You)', 'track_number' => 5, 'duration' => '02:55'],
                ['title' => 'Rencana Cinta (Koi no Plan)', 'track_number' => 6, 'duration' => '04:06'],
                ['title' => 'Peluklah Aku Dari Belakang (Senaka Kara Dakishimete)', 'track_number' => 7, 'duration' => '03:27'],
                ['title' => 'Revolusi Rio (Rio no Kakumei)', 'track_number' => 8, 'duration' => '04:11'],
                ['title' => 'Tetapi (Dakedo)', 'track_number' => 9, 'duration' => '04:36'],
                ['title' => 'Dear My Teacher', 'track_number' => 10, 'duration' => '04:20'],
                ['title' => 'Pintu Masa Depan (Mirai no Tobira)', 'track_number' => 11, 'duration' => '05:02'],
                ['title' => 'JKT48 (Jakarta48)', 'track_number' => 12, 'duration' => '03:56'],
                ['title' => 'Rok Bergoyang (Skirt, Hirari)', 'track_number' => 13, 'duration' => '04:02'],

                

            ],
        ],
        [
            'setlist' => [
                'title' => 'Te wo Tsunaginagara',
                'artist' => 'JKT48',
                'production_year' => 2023,
                'image' => 'twt.jpg',
            ],
            'songs' => [
                ['title' => 'Angin Kita (Bokura No Kaze)', 'track_number' => 1, 'duration' => '04:40'],
                ['title' => 'Mango No. 2', 'track_number' => 2, 'duration' => '03:52'],
                ['title' => 'Sambil Menggandeng Erat Tanganku', 'track_number' => 3, 'duration' => '04:25'],
                ['title' => 'Bel Sekolah Adalah Love Song (Chime Wa Love Song)', 'track_number' => 4, 'duration' => '03:53'],
                ['title' => 'Glory Days', 'track_number' => 5, 'duration' => '04:56'],
                ['title' => 'Barcode Hati Ini (Kono Mune No Barcode)', 'track_number' => 6, 'duration' => '04:41'],
                ['title' => 'Ajak Aku Pergi Menuju ke Wimbledon', 'track_number' => 7, 'duration' => '04:12'],
                ['title' => 'Sang Pianis Hujan (Ame No Pianist)', 'track_number' => 8, 'duration' => '04:38'],
                ['title' => 'Keberadaan Cokelat Itu (Choco no Yukue)', 'track_number' => 9, 'duration' => '04:47'],
                ['title' => 'Innocence', 'track_number' => 10, 'duration' => '04:12'],
                ['title' => 'Romance Rocket', 'track_number' => 11, 'duration' => '05:03'],
                ['title' => 'Arah Sang Cinta dan Balasannya (Koi No Keikou To Taisaku)', 'track_number' => 12, 'duration' => '04:33'],
                ['title' => 'Aku Sangat Suka (Daisuki)', 'track_number' => 13, 'duration' => '04:17'],
                ['title' => 'Tali Persahabatan (Rope No Yuujoo)', 'track_number' => 14, 'duration' => '03:37'],
                ['title' => 'Malam Hari Selasa, Pagi Hari Rabu', 'track_number' => 15, 'duration' => '04:37'],
                ['title' => 'Di Tempat Yang Jauh Pun', 'track_number' => 16, 'duration' => '05:53'],
                
            ],
        ],
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
