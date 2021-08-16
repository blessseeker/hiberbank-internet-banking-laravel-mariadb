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
                    <div class="form-group row">
                        <label for="no_ktp" class="col-md-4 col-form-label text-md-right">{{ __('No. KTP') }}</label>
                    
                        <div class="col-md-6">
                            {{ substr_replace($customer->no_ktp, str_repeat('*', strlen($customer->no_ktp)-8), 4, strlen($customer->no_ktp)-8) }}
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                    
                        <div class="col-md-6">
                            {{ substr_replace($customer->name, str_repeat('*', strlen($customer->no_ktp)-8), 4, strlen($customer->name)-8) }}
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>
                    
                        <div class="col-md-6">
                            {{ substr_replace($customer->alamat, str_repeat('*', strlen($customer->alamat)-16), 8, strlen($customer->alamat)-16) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header card-header-tabs card-header-primary">
                <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                    <span class="nav-tabs-title">VERIFIKASI DATA</span>
                </div>
                </div>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    
                    <div class="form-group row">
                        <label for="tempat_lahir" class="col-md-4 col-form-label text-md-right">{{ __('Tempat Lahir*') }}</label>
                    
                        <div class="col-md-6">
                            <input id="tempat_lahir" type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" value="" required>
                    
                            @error('alamat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                    <label for="tanggal_lahir" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal Lahir*') }}</label>
                
                    <div class="col-md-6">
                        <input type="date" id="tanggal_lahir" type="text" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" required>
                
                        @error('tanggal_lahir')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="nama_ibu_kandung" class="col-md-4 col-form-label text-md-right">{{ __('Nama Ibu Kandung*') }}</label>
                
                    <div class="col-md-6">
                        <input type="text" id="nama_ibu_kandung" type="text" class="form-control @error('nama_ibu_kandung') is-invalid @enderror" name="nama_ibu_kandung" required>
                
                        @error('nama_ibu_kandung')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div></div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header card-header-tabs card-header-primary">
                <div class="nav-tabs-navigation">
                <div class="nav-tabs-wrapper">
                    <span class="nav-tabs-title">BUAT AKUN</span>
                </div>
                </div>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <input type="hidden" name="customer_id" value="{{ $customer->id }}" />
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Username*') }}</label>
    
                        <div class="col-md-6">
                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username">
    
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address*') }}</label>
    
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
    
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
    
                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password*') }}</label>
    
                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
    
                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password*') }}</label>
    
                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
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
            {{ __('Register') }}
        </button>
    </div>
</div>