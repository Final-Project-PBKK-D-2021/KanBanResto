@extends('base')

@section('content')

<img src="{{$qrCode}}" alt="QRCode">
  <div class="card-body">
    <p class="card-text">Scan disini untuk melihat detail pesanan Anda</p>
  </div>

@endsection