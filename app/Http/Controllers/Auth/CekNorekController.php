<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CekNorekController extends Controller
{
    public function checkAccountByNomorRekening(Request $request)
    {
        $nomor_rekening = $request->post('nomor_rekening');

        $customer = \App\Models\Customer::where('nomor_rekening', $nomor_rekening)->get()->first();

        if (null !== $customer) {
            if ('ACTIVE' === $customer['status']) {
                $user = \App\Models\User::where('customer_id', $customer['id'])->get()->first();
                if (null !== $user) {
                    return response('Nomor rekening Anda sudah terdaftar. Silakan lakukan <a href="/login">login</a>.', 400);
                }

                $registration_form = view('auth/ajax/registration_form', compact('customer'))->render();

                return response()->json(['registration_form' => $registration_form]);
            }

            return response('Status rekening Anda tidak aktif. hubungi Customer Service di cabang terdekat.', 400);
        }

        return response('Nomor rekening yang Anda masukkan salah', 400);
        // return $customer;
    }
}
