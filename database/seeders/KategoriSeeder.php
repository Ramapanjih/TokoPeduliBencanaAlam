<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategoris')->insert([
        	'nama_kategori' => 'Update Banjir Bandang Sukabumi, Wilayah Terdampak Meluas di 13 Desa',
            'gambar' => 'BANJIR_BANDANG_SUKABUMI_SPTEMBER_2020.jpg',
        ]);

        DB::table('kategoris')->insert([
        	'nama_kategori' => 'Tanah Longsor di 4 Titik Kota Tarakan, 11 Orang Tewas',
            'gambar' => 'TANAH_LONGSOR_TARAKAN_KALIMANTAN_SEPTEMBER_2020.jpg',
        ]);
    }
}
