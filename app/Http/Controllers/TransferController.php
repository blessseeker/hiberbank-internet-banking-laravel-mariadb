<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransferController extends Controller
{
    public function index()
    {
        return view('transfer');
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
}
