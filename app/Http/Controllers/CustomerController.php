<?php

namespace App\Http\Controllers;

class CustomerController extends Controller
{
    public function getCustomerByNomorRekening($nomor_rekening)
    {
        $customer = \App\Models\Customer::where('nomor_rekening', $nomor_rekening)->get()->first();

        if (null !== $customer) {
            if ('ACTIVE' === $customer['status']) {
                return response()->json($customer, 200);
            }

            return response('Status rekening yang Anda masukkan tidak aktif.', 400);
        }

        return response('Nomor rekening yang Anda masukkan salah', 400);
        // return $customer;
    }
}
