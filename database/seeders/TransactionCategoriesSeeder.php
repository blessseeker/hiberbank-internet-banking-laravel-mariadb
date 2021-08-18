<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TransactionCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $transaction_categories = [[
            'category_name' => 'Transfer',
            'type' => 'DEBIT',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ], [
            'category_name' => 'Withdraw',
            'type' => 'DEBIT',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ], [
            'category_name' => 'Setor',
            'type' => 'CREDIT',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ], [
            'category_name' => 'Received Transfer',
            'type' => 'CREDIT',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]];
        $transactionCategoriesModel = new \App\Models\TransactionCategory();
        $transactionCategoriesModel::insert($transaction_categories);
    }
}
