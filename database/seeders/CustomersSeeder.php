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
        $customers = [[
            'nomor_rekening' => '0389840499',
            'no_ktp' => '3278022012930016',
            'name' => 'Customer Aktif Sudah jadi User',
            'alamat' => 'Kp. Gunung Tanjung RT 01/RW 09, Kel. Sukamanah, Kec. Cipedes, Kota Tasikmalaya',
            'tempat_lahir' => 'Tasikmalaya',
            'tanggal_lahir' => '1993-12-20',
            'nama_ibu_kandung' => 'Saodah',
            'balance' => '300000000',
            'status' => 'ACTIVE',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ], [
            'nomor_rekening' => '0389840899',
            'no_ktp' => '3278022012930017',
            'name' => 'Customer Aktif Belum jadi User',
            'alamat' => 'Panorama Ari Blok C-10, Desa Sawahdadap, Kec. Cimanggung, Kab. Sumedang',
            'tempat_lahir' => 'Bandung',
            'tanggal_lahir' => '1995-10-20',
            'nama_ibu_kandung' => 'Aminah',
            'balance' => '2500000',
            'status' => 'ACTIVE',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ], [
            'nomor_rekening' => '0389840896',
            'no_ktp' => '3278022012930018',
            'name' => 'Customer Inaktif',
            'alamat' => 'Panorama Ari Blok C-26, Desa Sawahdadap, Kec. Cimanggung, Kab. Sumedang',
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => '1990-10-20',
            'nama_ibu_kandung' => 'Siti Hajar',
            'balance' => '35000',
            'status' => 'INACTIVE',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]];
        $customerModel = new \App\Models\Customer();
        $customerModel::insert($customers);

        // save();

        // $this->command->info('Customers 0389840899 berhasil ditambahkan');
    }
}
