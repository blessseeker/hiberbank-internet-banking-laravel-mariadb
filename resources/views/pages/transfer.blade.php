@extends('layouts.global')

@section('title') Transfer @endsection

@section('content')
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Transfer</h4>
                <p class="card-category">Kirim Uang</p>
              </div>
              <div class="card-body">
                  <div class="row">
                    <div class="col-md-10">
                      <div class="form-group">
                        <label class="bmd-label-floating">Masukkan Nomor Rekening Tujuan</label>
                        <input type="text" class="form-control" id="nomor-rekening" name="nomor_rekening">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <a href="#" class="btn btn-primary" onclick="ceknorek()">
                            <i class="material-icons">check</i></a>
                      </div>
                    </div>
                  </div>
                  {{-- <button type="submit" class="btn btn-primary pull-right">Update Profile</button> --}}
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
