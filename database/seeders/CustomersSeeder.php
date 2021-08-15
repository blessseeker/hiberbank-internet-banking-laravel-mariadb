<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $customer = new \App\Models\Customer();
        $customer->name = 'Kamaludin Khoir';
        $customer->nomor_rekening = '0389840499';
        $customer->no_ktp = '3278022012930016';
        $customer->name = 'Kamaludin Khoir';
        $customer->alamat = 'Kp. Gunung Tanjung RT 01/RW 09, Kel. Sukamanah, Kec. Cipedes, Kota Tasikmalaya';
        $customer->tempat_lahir = 'Tasikmalaya';
        $customer->tanggal_lahir = '1993-12-20';
        $customer->nama_ibu_kandung = 'Saodah';
        $customer->balance = '300000000';
        $customer->status = 'ACTIVE';

        $customer->save();

        $this->command->info('Customers 0389840899 berhasil ditambahkan');
    }
}
