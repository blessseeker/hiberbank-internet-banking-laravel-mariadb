<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $user = new \App\Models\User();
        $user->username = 'kamaludinkhoir';
        $user->email = 'khoirkamaludin@gmail.com';
        $user->password = Hash::make('kamaludin');
        $user->customer_id = 1;
        $user->phone = '08112276780';
        $user->status = 'ACTIVE';
        $user->verifikasi_tempat_lahir = 'Tasikmalaya';
        $user->verifikasi_tanggal_lahir = '1993-12-20';
        $user->verifikasi_nama_ibu_kandung = 'Saodah';
        $user->verifikasi_foto_ktp = 'img.jpg';

        $user->save();

        $this->command->info('User kamaludinkhoir berhasil ditambahkan');
    }
}
