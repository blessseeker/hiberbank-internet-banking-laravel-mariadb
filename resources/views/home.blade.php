@extends('layouts.global')

@section('title') Dashboard @endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">account_balance_wallet</i>
                  </div>
                  <p class="card-category">Saldo Anda saat ini</p>
                  <h3 class="card-title">Rp {{number_format($customer->balance)}}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i> {{date('Y-m-d')}}
                  </div>
                </div>
              </div>
        </div>
    </div>
@endsection
