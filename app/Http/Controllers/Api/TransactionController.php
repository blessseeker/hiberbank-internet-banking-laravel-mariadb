<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    protected $transactionModel;

    public function __construct()
    {
        $this->transactionModel = new \App\Models\Transaction();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param mixed $transactions
     * @param mixed $transaction
     *
     * @return \Illuminate\Http\Response
     */
    public function store($transaction)
    {
        $this->transactionModel->insert([
            'customer_id' => $transaction['customer_id'],
            'transaction_category_id' => $transaction['transaction_category_id'],
            'nominal' => $transaction['nominal'],
            'tanggal_transaksi' => $transaction['tanggal_transaksi'],
            'keterangan' => $transaction['keterangan'],
            'created_at' => $transaction['created_at'],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
