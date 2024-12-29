<?php

namespace Database\Seeders;

use App\Models\Anggota;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Anggota::create([
            "f_id" => '1',
            "f_nama" => 'fitri',
            "f_username" => 'pitri',
            "f_password" => Hash::make('pitri'),
            "f_tempatlahir" => 'Pondok Bambu, Jakarta',
            "f_tanggallahir" => Carbon::createFromFormat('Y-m-d', '2006-08-03'),
        ]);
    }
}
