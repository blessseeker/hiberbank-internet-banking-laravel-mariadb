@extends('layouts.global')

@section('title') Mutasi Rekening @endsection

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
                <h4 class="card-title">Mutasi Rekening</h4>
                <p class="card-category">Melihat Mutasi Rekening Berdasarkan Rentang Waktu yang Anda Tentukan</p>
              </div>
              <div class="card-body">
                  <div class="row">
                      <input type="hidden" id="customer_id" value="{{Auth::user()->customer_id}}" />
                    <div class="col-md-5">
                      <div class="form-group">
                        <label class="bmd-label-floating">Dari</label>
                        <input type="date" class="form-control" id="dari" name="dari">
                      </div>
                    </div>
                    <div class="col-md-5">
                      <div class="form-group">
                        <label class="bmd-label-floating">Sampai</label>
                        <input type="date" class="form-control" id="sampai" name="sampai">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <a href="#" class="btn btn-primary" onclick="ceknorek()">
                            <i class="material-icons">check</i></a>
                      </div>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <div id="error-message"></div>

                  <form method="POST" action="/transfer">
                      @csrf
                      <div id="mutation-list"></div>
                    </form>
              </div>
            </div>
        </div>
    </div>
    <script> 
        function ceknorek() {
            // alert('cek');
            var customer_id = $("#customer_id").val();
            var dari = $('#dari').val();
            var sampai = $('#sampai').val();
    
            $.ajax({
                type: 'GET',
                url: "/mutasi/list/"+customer_id+"/"+dari+"/"+sampai,
                // dataType: 'json',
                cache: false,
                data: {
                    _token: "{{ csrf_token() }}",
                    customer_id: customer_id,
                    dari: dari,
                    sampai: sampai
                },
            }).done(function(data) {
                $("#error-message").html('').removeClass();
                $("#mutation-list").html(data.mutation_list);
            }).fail(function(jqXHR, textStatus) {
                $("#error-message").html(jqXHR.responseText).addClass('alert').addClass(' alert-danger');
                $("#mutation-list").html('');
            });
        }
    </script>
@endsection
