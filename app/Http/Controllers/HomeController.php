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
        $status = Auth::user()->status;

        switch ($status) {
          case 'ACTIVE':
            return view('home');

            break;

          case 'INACTIVE':
            return view('pending_activation');

            break;

          default:
          return view('home');

          break;
        }
    }
}
