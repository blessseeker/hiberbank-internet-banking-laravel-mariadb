@extends('layouts.global')

@section('title') Transfer Berhasil @endsection

@section('content')
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="card-header card-header-success">
                <h4 class="card-title">Transfer Berhasil</h4>
                <p class="card-category">Telah Dilakukan Transfer</p>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">ID Transaksi</label>
                      <a class="pull-right">ID Transaksi</a>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label class="bmd-label-floating">Tanggal Transaksi</label>
                      <a class="pull-right">Tanggal Transaksi</a>
                    </div>
                  </div>
                </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="bmd-label-floating">Dari</label>
                        <a class="pull-right">No. Rekening (Nama Pengirim)</a>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="bmd-label-floating">Kepada</label>
                        <a class="pull-right">No. Rekening (Nama Penerima)  </a>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="bmd-label-floating">Nominal</label>
                        <strong class="pull-right">Nominal</strong>
                      </div>
                    </div>
                  </div>
                  <a type="submit" class="btn btn-primary pull-right"><i class="material-icons">print</i></a>
                  <div class="clearfix"></div>
                  <div id="error-message"></div>

                  <form method="POST" action="/transfer">
                      @csrf
                      <div id="transfer-form"></div>
                    </form>
              </div>
            </div>
        </div>
    </div>
    <script> 
        function ceknorek() {
            // alert('cek');
            var nomor_rekening = $('#nomor-rekening').val();
    
            $.ajax({
                type: 'POST',
                url: "/transfer/ceknorek",
                // dataType: 'json',
                cache: false,
                data: {
                    _token: "{{ csrf_token() }}",
                    nomor_rekening: nomor_rekening,
                },
            }).done(function(data) {
                $("#error-message").html('').removeClass();
                $("#transfer-form").html(data.transfer_form);
            }).fail(function(jqXHR, textStatus) {
                $("#error-message").html(jqXHR.responseText).addClass('alert').addClass(' alert-danger');
                $("#transfer-form").html('');
            });
        }
    </script>
@endsection
