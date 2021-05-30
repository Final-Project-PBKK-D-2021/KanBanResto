@extends('base')

@section('title', "Form Tambah Outlet")

@section('header_title', 'Form Tambah Outlet')

@section('content')
    <form method="post"
          action="{{route('owner.withBusiness.outlet.store', ['business_id' => request()->route('business_id')])}}">
        @csrf
        <input type="hidden" name="business_id" id="business_id" value="{{request()->route('business_id')}}">
        <div class="mb-3">
            <label for="namaOutlet" class="form-label">Nama Outlet</label>
            <input type="text" class="form-control @error('namaOutlet') is-invalid @enderror" id="namaOutlet"
                   placeholder="Masukkan Nama Outlet" name="namaOutlet" value="{{old('namaOutlet')}}">
            @error('namaOutlet')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="alamatOutlet" class="form-label">Alamat Outlet</label>
            <input type="text" class="form-control @error('alamatOutlet') is-invalid @enderror " id="alamatOutlet"
                   placeholder="Masukkan Alamat Outlet" name="alamatOutlet" value="{{old('alamatOutlet')}}">
            @error('alamatOutlet')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="noTelpOutlet" class="form-label">No Telepon Outlet</label>
            <input type="text" class="form-control @error('noTelpOutlet') is-invalid @enderror " id="noTelpOutlet"
                   placeholder="Masukkan No Telepon Outlet" name="noTelpOutlet" value="{{old('noTelpOutlet')}}">
            @error('noTelpOutlet')
            <div class="invalid-feedback">{{ $message }}</div>
    @enderror
  </div>
  <button type="submit" class="btn btn-primary">Tambah Data</button>
</form>
@endsection
