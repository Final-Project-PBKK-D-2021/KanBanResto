@extends('base')

@section('title', "Detail Outlet")

@section('header_title', 'This is your business outlet details!')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $outlet->nama_outlet }}</h5>
            <p class="card-text">{{ $outlet->alamat_outlet }}</p>
            <p class="card-text">{{ $outlet->no_telepon_outlet }}</p>
            <a href="{{route('owner.withBusiness.withOutlet.staff.index', ['business_id' => request()->route('business_id'), 'outlet_id' => $outlet->id])}}"
               class="nav-link">
                <i data-feather="coffee"></i>
                <span>staff</span>
            </a>
            <a href="{{route('owner.withBusiness.outlet.edit', ['business_id' => request()->route('business_id'), 'outlet' => $outlet->id])}}" class="btn btn-primary">Edit</a>
            <form action="{{route('owner.withBusiness.outlet.destroy', ['business_id' => request()->route('business_id'), 'outlet' => $outlet->id])}}" method="post"
                  class="d-inline" id="form-hapus">
                @method('delete')
                @csrf
                <input type="hidden" name="business_id" value="{{request()->route('business_id')}}">
                <input type="hidden" name="outlet" value="{{ $outlet->id }}">
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            <a href="{{route('owner.withBusiness.outlet.index', ['outlet' => $outlet->id, 'business_id' => request()->route('business_id')])}}" class="card-link">Back</a>
        </div>
    </div>
@endsection
