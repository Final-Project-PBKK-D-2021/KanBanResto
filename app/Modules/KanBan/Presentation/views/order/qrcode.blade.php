@extends('base-in')

@section('title')
    QRCode Order
@endsection

@section('header_title')
    QRCode Order
@endsection

@section('header_right')
    <a href="{{url()->previous()}}" class="btn btn-white tx-montserrat tx-semibold d-none d-lg-block">
        <i data-feather="arrow-left" class="wd-10 mg-r-5"></i>Kembali
    </a>
@endsection

@section('content')
    <div class="row row-xs">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="visible-print text-center">
                        <h5>Scan Me to See Order Dtails !</p>
                        {!! $qrCode !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
@endsection
