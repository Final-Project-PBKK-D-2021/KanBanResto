@extends('base')

@section('title')
    Dashboard
@endsection

@section('header_title')
    Dashboard
@endsection

@section('content')
    <div class="row row-xs">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <p class="tx-color-03">Selamat Datang {{Auth::guard('owner')->user()->name}} di Dashboard Bisnis Anda</p>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
@endsection
