@extends('base')

@section('title', "Outlet")

@section('header_title', 'Outlet Bisnis')
@section('content')
<a href="{{route('outlet.create')}}" class="btn btn-primary my-3">Tambah Data Outlet</a>
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<ol class="list-group list-group-numbered">
 @foreach($outlets as $outlet)
    <li class="list-group-item d-flex justify-content-between align-items-start">
        <div class="fw-bold">{{ $outlet->nama_outlet }}</div>
        <a href="{{route('outlet.show', ['outlet' => $outlet->id])}}" class="badge badge-info">detail</a>
    </li>
 @endforeach
</ol>
@endsection