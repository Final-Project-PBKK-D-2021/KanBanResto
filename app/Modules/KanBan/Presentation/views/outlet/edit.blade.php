@extends('base')

@section('title', "Form Ubah Data Outlet")
@section('header_title', 'Form Ubah Data Outlet')
@section('content')
    <form method="post" action="{{route('owner.withBusiness.outlet.update', ['outlet' => $outlet->id, 'business_id' => request()->route('business_id')])}}">
        @method('patch')
        @csrf
        <div class="form-group mb-3">
            <label for="namaOutlet" class="form-label">Nama Outlet</label>
            <input type="text" class="form-control @error('namaOutlet') is-invalid @enderror" id="namaOutlet"
                   placeholder="Masukkan Nama Outlet" name="namaOutlet" value="{{ $outlet->nama_outlet }}">
            @error('namaOutlet')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="alamatOutlet" class="form-label">Alamat Outlet</label>
            <input type="text" class="form-control  @error('alamatOutlet') is-invalid @enderror" id="alamatOutlet"
                   placeholder="Masukkan Alamat Outlet" name="alamatOutlet" value="{{ $outlet->alamat_outlet}}">
            @error('alamatOutlet')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="noTelpOutlet" class="form-label">No Telepon Outlet</label>
            <input type="text" class="form-control  @error('noTelpOutlet') is-invalid @enderror" id="noTelpOutlet"
                   placeholder="Masukkan No Telepon Outlet" name="noTelpOutlet" value="{{ $outlet->no_telepon_outlet}}">
            @error('noTelpOutlet')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Ubah Data</button>
</form>
@endsection
