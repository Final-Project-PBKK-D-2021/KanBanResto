@extends('base')

@section('title')
    Outlet List
@endsection

@section('header_title')
    Outlet List
@endsection

@section('header_right')
    @if(Auth::guard('owner')->check())
    <a href="{{ route('owner.withBusiness.outlet.create', ['business_id' => request()->route('business_id')]) }}" class="btn btn-primary tx-montserrat tx-semibold mg-r-5 mg-lg-r-10">
        <i data-feather="plus" class="wd-10 mg-r-5"></i>Tambah
    </a>
    @endif
@endsection
@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="row row-xs">
        <div class="col-sm-12 col-lg-12">
            <div class="card">
                <div class="card-body card-list">
                    @foreach ( $outlets as $outlet )
                        <div class="card-list-item">
                            <a href="{{route('owner.withBusiness.outlet.show', ['business_id' => request()->route('business_id'), 'outlet' => $outlet->id])}}">
                                <div class="d-flex justify-content-between align-items-center sc-link">
                                    <div class="media">
                                        <div
                                            class="wd-40 ht-40 bg-its-icon mg-r-15 mg-md-r-15 d-flex align-items-center justify-content-center rounded-its">
                                            <i data-feather="shopping-bag"></i>
                                        </div>
                                        <div class="media-body align-self-center">
                                            <p class="tx-montserrat tx-medium tx-15 mg-b-0 tx-color-02">{{ $outlet->nama_outlet }}</p>
                                            <p class="tx-color-03 tx-13">{{ $outlet->alamat_outlet }}</p>
                                            <span class="tx-13 tx-medium tx-primary">{{ $outlet->no_telepon_outlet }}</span>
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
            </div>
        </div>
    </div>
@endsection
