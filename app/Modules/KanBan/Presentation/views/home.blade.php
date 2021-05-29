@extends('base-in')

@section('title')
    Business List
@endsection

@section('header_title')
    Business List
@endsection

@section('header_right')

    <a href="{{ route('owner.business.create') }}" class="btn btn-primary tx-montserrat tx-semibold mg-r-5 mg-lg-r-10">
        <i data-feather="plus" class="wd-10 mg-r-5"></i>Tambah
    </a>

@endsection

@section('content')
    <div class="row row-xs">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                @if($businesss->count() != 0) 
                <div class="card-body card-list">
                @foreach ( $businesss as $business )
                    <div class="card-list-item">
                        <a href="{{route('owner.withBusiness.dashboard', ['business_id' => $business->id] )}}">
                            <div class="d-flex justify-content-between align-items-center sc-link">
                                <div class="media">
                                    <div
                                        class="wd-40 ht-40 bg-its-icon mg-r-15 mg-md-r-15 d-flex align-items-center justify-content-center rounded-its">
                                        <ion-icon name="business-outline" class="tx-24 tx-primary"></ion-icon>
                                    </div>
                                    <div class="media-body align-self-center">
                                        <p class="tx-montserrat tx-medium tx-15 mg-b-0 tx-color-02">{{ $business->name }}</p>
                                        <p class="tx-color-03 tx-13">{{ $business->description }}</p>
                                        <span class="tx-13 tx-medium tx-primary">{{ $business->since }}</span>
                                        <span class="tx-13 tx-color-03 mg-x-5">&bullet;</span>
                                        <span class="tx-13 tx-color-03">Owner: {{ $business->owner_name }}</span>
                                    </div>
                                </div>
                                <div class="btn btn-icon btn-its-icon btn-hover">
                                    <i data-feather="chevron-right"></i>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                </div>
                @else
                <div class="card-body">
                    <p class="tx-color-its">TIDAK ADA BISNIS</p>
                    <a href="{{ route('owner.business.create') }}" class="btn btn-primary tx-montserrat tx-semibold mg-r-5 mg-lg-r-10">
                        <i data-feather="plus" class="wd-10 mg-r-5"></i>Tambah
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
@endsection
