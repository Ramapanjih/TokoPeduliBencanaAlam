<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        
        DB::table('produks')->insert([
            'nama_produk' => 'Beras Berlian SAE - 25KG',
            'harga' => '250000',
            'ukuran' => '25 KG',
            'kategori_id' => $faker->randomElement(['1', '2']),
            'gambar' => 'Beras_Berlian_SAE-25KG.png',
        ]);

        DB::table('produks')->insert([
            'nama_produk' => 'Minyak Goreng Bimoli 5 Liter',
            'harga' => '70000',
            'ukuran' => '5 Liter',
            'kategori_id' =>  $faker->randomElement(['1', '2']),
            'gambar' => 'Minyak_Goreng_Bimoli-5Liter.jpg',
        ]);

        DB::table('produks')->insert([
            'nama_produk' => 'Mukenah Dewasa Polos Terkini',
            'harga' => '120000',
            'ukuran' => 'Dewasa',
            'kategori_id' =>  $faker->randomElement(['1', '2']),
            'gambar' => 'Mukenah_Dewasa_Polos.png',
        ]);

        DB::table('produks')->insert([
            'nama_produk' => 'SGM Ananda 0 - 6 Bulan 1000 Gram',
            'harga' => '83500',
            'ukuran' => '1000 Gram',
            'kategori_id' =>  $faker->randomElement(['1', '2']),
            'gambar' => 'SGM_Ananda_0-6Bulan_1000Gram.png',
        ]);

        DB::table('produks')->insert([
            'nama_produk' => 'Kaos Pria Polos - Berbahan Cotton',
            'harga' => '35000',
            'ukuran' => 'XL',
            'kategori_id' =>  $faker->randomElement(['1', '2']),
            'gambar' => 'Kaos_Polos_Cotton.png',
        ]);

        DB::table('produks')->insert([
            'nama_produk' => 'Indomie Goreng 1 Dus Isi 40 Bungkus',
            'harga' => '95000',
            'ukuran' => '1 Dus / 40 Bungkus ',
            'kategori_id' =>  $faker->randomElement(['1', '2']),
            'gambar' => 'Indomie-Goreng_1Dus_Isi_40Bungkus.png',
        ]);

        DB::table('produks')->insert([
            'nama_produk' => 'Air Mineral Aqua - 1 dus/12 Botol/1.5Ltr',
            'harga' => '50000',
            'ukuran' => '1 Dus / 12 Botol / 1.5 Liter',
            'kategori_id' =>  $faker->randomElement(['1', '2']),
            'gambar' => 'Air_Mineral_Aqua-1Kardus@12Botol@1.5Liter.png',
        ]);

        DB::table('produks')->insert([
            'nama_produk' => 'Baju Kokoh - Pria Dewasa',
            'harga' => '110000',
            'ukuran' => 'XL',
            'kategori_id' =>  $faker->randomElement(['1', '2']),
            'gambar' => 'Baju_Kokoh_Dewasa.png',
        ]);

    }
}

