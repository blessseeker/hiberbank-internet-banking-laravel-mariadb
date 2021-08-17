@extends('layouts.app')

@section('title') Pending Verification @endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="alert alert-warning">
                    <span>
                      Data Anda sedang dalam proses verifikasi.<br>
                      Hubungi Call Center atau CS kami jika proses verifikasi ini telah melampaui tiga hari kerja.<hr>
                      <a href="/home">Klik untuk Refresh</a>
                    </span>
                  </div>
            </div>
        </div>
    </div>
</div>
@endsection
