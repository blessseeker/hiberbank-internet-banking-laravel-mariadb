<div class="form-group row">
    <label for="no_ktp" class="col-md-4 col-form-label text-md-right">{{ __('No. KTP') }}</label>

    <div class="col-md-6">
        <input id="no_ktp" type="text" class="form-control @error('no_ktp') is-invalid @enderror" name="no_ktp" value="{{ substr_replace($customer->no_ktp, str_repeat('*', strlen($customer->no_ktp)-8), 4, strlen($customer->no_ktp)-8) }}" required readonly>

        @error('no_ktp')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

    <div class="col-md-6">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ substr_replace($customer->name, str_repeat('*', strlen($customer->no_ktp)-8), 4, strlen($customer->name)-8) }}" required readonly>

        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

    <div class="col-md-6">
        <textarea id="alamat" rows="5" class="form-control @error('alamat') is-invalid @enderror" name="alamat" required readonly>{{ substr_replace($customer->alamat, str_repeat('*', strlen($customer->alamat)-16), 8, strlen($customer->alamat)-16) }}</textarea>

        @error('alamat')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="tempat_lahir" class="col-md-4 col-form-label text-md-right">{{ __('Tempat Lahir') }}</label>

    <div class="col-md-6">
        <input id="tempat_lahir" type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" value="{{ substr_replace($customer->tempat_lahir, str_repeat('*', strlen($customer->tempat_lahir)-8), 4, strlen($customer->tempat_lahir)-8) }}" required readonly>

        @error('alamat')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="tanggal_lahir" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal Lahir') }}</label>

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
    <label for="nama_ibu_kandung" class="col-md-4 col-form-label text-md-right">{{ __('Nama Ibu Kandung') }}</label>

    <div class="col-md-6">
        <input type="text" id="nama_ibu_kandung" type="text" class="form-control @error('nama_ibu_kandung') is-invalid @enderror" name="nama_ibu_kandung" required>

        @error('nama_ibu_kandung')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
            {{ __('Register') }}
        </button>
    </div>
</div>