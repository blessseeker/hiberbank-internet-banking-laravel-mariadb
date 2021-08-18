
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                    <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                        <span class="nav-tabs-title">INFORMASI NASABAH</span>
                    </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                            <input type="hidden" name="pengirim_id" value="{{Auth::user()->customer_id}}">
                            <input type="hidden" name="penerima_id" value="{{$customer->id}}">
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama Nasabah :') }}</label>
                            
                                <div class="col-md-6">
                                    {{ $customer->name }}
                                </div>
                            </div>                  
                            <div class="form-group row">
                                <label for="nominal" class="col-md-4 col-form-label text-md-right">{{ __('Masukkan Nominal Transfer*') }}</label>
                            
                                <div class="col-md-6">
                                    <input id="nominal" type="number" class="form-control @error('nominal') is-invalid @enderror" name="nominal" value="" required>
                            
                                    @error('nominal')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>               
                            <div class="form-group row">
                                <label for="keterangan" class="col-md-4 col-form-label text-md-right">{{ __('Keterangan') }}</label>
                            
                                <div class="col-md-6">
                                    <input id="keterangan" type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" value="">
                            
                                    @error('keterangan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>           
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Masukkan Password Anda*') }}</label>
                            
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="" required>
                            
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Selesaikan Transfer') }}
            </button>
        </div>
    </div>