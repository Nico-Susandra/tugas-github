<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MusicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('music')->insert([
            [
                'nama_penyewa' => 'John Doe',
                'nama_alat_musik' => 'Gitar Akustik',
                'tanggal_pinjam' => '2024-01-01',
                'tanggal_kembali' => '2024-01-07',
                'harga_sewa' => 50000.00,
                'keterangan' => 'Penyewaan untuk konser akustik.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_penyewa' => 'Jane Smith',
                'nama_alat_musik' => 'Piano Elektrik',
                'tanggal_pinjam' => '2024-02-10',
                'tanggal_kembali' => '2024-02-15',
                'harga_sewa' => 150000.00,
                'keterangan' => 'Digunakan untuk acara pernikahan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_penyewa' => 'Michael Johnson',
                'nama_alat_musik' => 'Drum Set',
                'tanggal_pinjam' => '2024-03-05',
                'tanggal_kembali' => '2024-03-12',
                'harga_sewa' => 250000.00,
                'keterangan' => 'Untuk latihan band.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

