@extends('base')

@section('title', "Detail Outlet")

@section('header_title', 'This is your business outlet details!')

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $outlet->nama_outlet }}</h5>
            <p class="card-text">{{ $outlet->alamat_outlet }}</p>
            <p class="card-text">{{ $outlet->no_telepon_outlet }}</p>
            <a href="{{route('owner.withBusiness.outlet.edit', ['outlet' => $outlet->id])}}" class="btn btn-primary">Edit</a>
            <form action="{{route('owner.withBusiness.outlet.destroy', ['outlet' => $outlet->id])}}" method="post"
                  class="d-inline">
                @method('delete')
                @csrf
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            <a href="{{route('owner.withBusiness.outlet.index')}}" class="card-link">Back</a>
        </div>
    </div>
@endsection
