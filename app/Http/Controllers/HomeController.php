<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        switch ($user->status) {
          case 'ACTIVE':
            $customer = \App\Models\Customer::find($user->customer_id);

            return view('pages/home', compact('customer'));

            break;

          case 'INACTIVE':
            return view('pending_activation');

            break;

          default:
          return view('pending_activation');

          break;
        }
    }
}
