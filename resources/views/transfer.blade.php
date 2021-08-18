@extends('layouts.global')

@section('title') Transfer @endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Transfer</h4>
                <p class="card-category">Kirim Uang</p>
              </div>
              <div class="card-body">
                <form>
                  <div class="row">
                    <div class="col-md-10">
                      <div class="form-group">
                        <label class="bmd-label-floating">Masukkan Nomor Rekening Tujuan</label>
                        <input type="text" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="form-group">
                        <a href="#" class="btn btn-primary" onclick="">
                            <i class="material-icons">check</i></a>
                      </div>
                    </div>
                  </div>
                  {{-- <button type="submit" class="btn btn-primary pull-right">Update Profile</button> --}}
                  <div class="clearfix"></div>
                </form>
              </div>
            </div>
        </div>
    </div>
@endsection
