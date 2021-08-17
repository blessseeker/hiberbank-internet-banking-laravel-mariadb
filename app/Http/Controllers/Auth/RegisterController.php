<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'verifikasi_tempat_lahir' => ['required'],
            'verifikasi_tanggal_lahir' => ['required'],
            'verifikasi_nama_ibu_kandung' => ['required'],
            'verifikasi_foto_ktp' => ['required', 'image', 'max:2048'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $request = request();
        $verifikasi_foto_ktp = $request->file('verifikasi_foto_ktp');
        // $ktpSaveAsName = time().'_'.'ktp'.$verifikasi_foto_ktp->getClientOriginalExtension();
        $upload_path = 'uploads/';
        // $ktp_url = $upload_path.$ktpSaveAsName;
        $verifikasi_foto_ktp->move($upload_path, $verifikasi_foto_ktp);

        return User::create([
            'username' => $data['username'],
            'customer_id' => $data['customer_id'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
            'verifikasi_tempat_lahir' => $data['verifikasi_tempat_lahir'],
            'verifikasi_tanggal_lahir' => $data['verifikasi_tanggal_lahir'],
            'verifikasi_nama_ibu_kandung' => $data['verifikasi_nama_ibu_kandung'],
            'verifikasi_foto_ktp' => $verifikasi_foto_ktp,
            'status' => 'INACTIVE',
        ]);
    }
}
