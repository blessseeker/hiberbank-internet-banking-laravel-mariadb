@extends('layouts.app')

@section('title') Register @endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">

                        <div class="form-group row">
                            <label for="nomor_rekening" class="col-md-4 col-form-label text-md-right">Nomor Rekening</label>

                            <div class="col-md-4">
                                <input id="nomor-rekening" type="text" class="form-control @error('nomor_rekening') is-invalid @enderror" name="nomor_rekening" value="{{ old('nomor_rekening') }}" required autocomplete="nomor_rekening" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4"><a id="btn-ceknorek" class="btn btn-primary" onclick="ceknorek()">
                                CEK NOMOR REKENING
                            </a></div>
                        </div>
                        <div id="error-message"></div>

                        <form method="POST" action="/register">
                            @csrf
                            <div id="registration-form"></div>
                    </form>
                </div>
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
            url: "/ceknorek",
            // dataType: 'json',
            cache: false,
            data: {
                _token: "{{ csrf_token() }}",
                nomor_rekening: nomor_rekening,
            },
        }).done(function(data) {
            $("#error-message").html('').removeClass();
            $("#registration-form").html(data.registration_form);
        }).fail(function(jqXHR, textStatus) {
            $("#error-message").html(jqXHR.responseText).addClass('alert').addClass(' alert-danger');
        });
    }
</script>
@endsection
