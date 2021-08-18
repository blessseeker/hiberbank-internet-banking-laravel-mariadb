<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\CustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class TransferController extends Api\TransactionController
{
    public function index()
    {
        $error_message = '';

        return view('transfer', compact('error_message'));
    }

    public function cekNomorRekening(Request $request)
    {
        $nomor_rekening = $request->post('nomor_rekening');

        $customerController = new CustomerController();

        $response = $customerController->getCustomerByNomorRekening($nomor_rekening);

        if (200 === $response->status()) {
            $customer = $response->getData();
            $transfer_form = view('ajax/transfer_form', compact('customer'))->render();

            return response()->json(['transfer_form' => $transfer_form]);
        }

        return $response;
    }

    public function kirimTransfer(Request $request)
    {
        if (!Auth::check()) {
            return response('Anda tidak memiliki wewenang untuk melakukan ini', 403);
        }

        $validation = Validator::make($request->all(), [
            'nominal' => 'required',
            'password' => 'required',
        ])->validate();

        if (!Hash::check($request->post('password'), Auth::user()->password)) {
            return back()->with('error', 'Password yang Anda masukkan salah');
        }

        $pengirim_id = $request->post('pengirim_id');
        $penerima_id = $request->post('penerima_id');
        $nominal = $request->post('nominal');

        $transactions = [
            [
                'customer_id' => $pengirim_id,
                'transaction_category_id' => 1,
                'nominal' => $nominal,
                'tanggal_transaksi' => date('Y-m-d'),
                'keterangan' => $request->post('keterangan'),
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'customer_id' => $penerima_id,
                'transaction_category_id' => 4,
                'nominal' => $nominal,
                'tanggal_transaksi' => date('Y-m-d'),
                'keterangan' => $request->post('keterangan'),
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ];

        foreach ($transactions as $transaction) {
            $this->store($transaction);
        }

        $customerController = new CustomerController();

        $pengirim = $customerController->getCustomerById($pengirim_id)->getData();
        $dataPengirim['balance'] = $pengirim->balance - $nominal;
        $customerController->update($dataPengirim, $pengirim_id);

        $penerima = $customerController->getCustomerById($penerima_id)->getData();
        $dataPenerima['balance'] = $penerima->balance + $nominal;
        $customerController->update($dataPenerima, $penerima_id);

        return redirect('/transfer/success');
    }

    public function success()
    {
        echo 'Transfer Berhasil!';
    }
}
