@extends('base-in')

@section('title')
    KanbanResto
@endsection

@section('header_title')
    KanbanResto
@endsection

@section('content')
    <div class="row row-xs">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <p class="tx-color-its">QRCODE</p>
                    <div class="visible-print text-center">
                        <h5>Scan me to see the menu !</p>
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
