<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MutationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/pages/mutation');
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
     * @param \Illuminate\Http\Request $request
     * @param mixed                    $mutation
     *
     * @return \Illuminate\Http\Response
     */
    public function store($mutation)
    {
        return DB::table('mutations')->insert([
            'customer_id' => $mutation['customer_id'],
            'transaction_id' => $mutation['transaction_id'],
            'updated_balance' => $mutation['updated_balance'],
            'created_at' => $mutation['created_at'],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int   $id
     * @param mixed $customer_id
     * @param mixed $dari
     * @param mixed $sampai
     *
     * @return \Illuminate\Http\Response
     */
    public function show($customer_id, $dari, $sampai)
    {
        if (!Auth::check()) {
            return response('Anda tidak memiliki hak akses ke halaman ini', 403);
        }
        $mutations = \App\Models\Mutation::where('customer_id', $customer_id)->whereBetween('created_at', [$dari, $sampai])->get();

        if (null !== $mutations) {
            $mutation_list = view('ajax/mutation_list', compact('mutations'))->render();

            return response()->json(['mutation_list' => $mutation_list]);
        }

        return response('Bad request', 400);
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
