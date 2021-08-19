<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\MutationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class TransferController extends Api\TransactionController
{
    public function index()
    {
        if (!Auth::check()) {
            return response('Anda tidak memiliki hak akses ke halaman ini', 403);
        }
        $error_message = '';

        return view('pages/transfer', compact('error_message'));
    }

    public function cekNomorRekening(Request $request)
    {
        // Mencari data nasabah berdasarkan nomor rekening
        $nomor_rekening = $request->post('nomor_rekening');

        $customerController = new CustomerController();

        $response = $customerController->getCustomerByNomorRekening($nomor_rekening);

        // Jika response code nya 200, kembalikan form transfer
        if (200 === $response->status()) {
            $customer = $response->getData();
            $transfer_form = view('ajax/transfer_form', compact('customer'))->render();

            return response()->json(['transfer_form' => $transfer_form]);
        }

        // Jika response code selain 200, kembalikan nilai dari response
        return $response;
    }

    public function kirimTransfer(Request $request)
    {
        // Periksa apakah pengguna yang mengirimkan permintaan sudah terotentikasi?
        if (!Auth::check()) {
            return response('Anda tidak memiliki wewenang untuk melakukan ini', 403);
        }

        // Validasi form transfer
        $validation = Validator::make($request->all(), [
            'nominal' => 'required',
            'password' => 'required',
        ])->validate();

        // Cek bahwa password yang diinput sesuai dengan password user terotentikasi
        if (!Hash::check($request->post('password'), Auth::user()->password)) {
            return back()->with('error', 'Password yang Anda masukkan salah');
        }

        // Menyimpan data transfer ke tabel transactions
        $pengirim_id = $request->post('pengirim_id');
        $penerima_id = $request->post('penerima_id');
        $nominal = $request->post('nominal');

        $transaction = [
            'customer_id' => $pengirim_id,
            'penerima_id' => $penerima_id,
            'transaction_category_id' => 1,
            'nominal' => $nominal,
            'tanggal_transaksi' => date('Y-m-d'),
            'keterangan' => $request->post('keterangan'),
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $transaction_id = $this->store($transaction);

        // Jika transaksi berhasil disimpan
        if ($transaction_id) {
            // Kurangi saldo pengirim dan tambah saldo penerima transfer
            $customerController = new CustomerController();

            $pengirim = $customerController->getCustomerById($pengirim_id)->getData();
            $dataPengirim['balance'] = $pengirim->balance - $nominal;
            $customerController->update($dataPengirim, $pengirim_id);

            $penerima = $customerController->getCustomerById($penerima_id)->getData();
            $dataPenerima['balance'] = $penerima->balance + $nominal;
            $customerController->update($dataPenerima, $penerima_id);

            // Masukkan data mutasi kepada masing-masing customer
            $mutations = [
                [
                    'customer_id' => $pengirim_id,
                    'transaction_id' => $transaction_id,
                    'updated_balance' => $dataPengirim['balance'],
                    'created_at' => date('Y-m-d H:i:s'),
                ],
                [
                    'customer_id' => $penerima_id,
                    'transaction_id' => $transaction_id,
                    'updated_balance' => $dataPenerima['balance'],
                    'created_at' => date('Y-m-d H:i:s'),
                ],
            ];

            foreach ($mutations as $mutation) {
                $mutationController = new MutationController();

                $mutationController->store($mutation);
            }
        }

        // Redirect ke halaman berhasil transfer
        return redirect('/transfer/success')->with('data', $transaction);
    }

    public function success()
    {
        // $transaction = session('data');

        return view('pages/transfer_success');
    }
}
