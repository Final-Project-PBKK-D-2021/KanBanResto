@extends('base-out-alternatif')

@section('title')
    Business List
@endsection

@section('header_title')
    Business List
@endsection

@section('header_right')
    @if(Auth::guard('owner')->check())
    <a href="{{ route('owner.business.create') }}" class="btn btn-primary tx-montserrat tx-semibold mg-r-5 mg-lg-r-10">
        <i data-feather="plus" class="wd-10 mg-r-5"></i>Tambah
    </a>
    @endif
@endsection

@section('content')
    <div class="row row-xs mg-t-40 mg-lg-t-60 mg-md-t-40 mg-sm-t-40">
        <div class="col-sm-12 col-lg-12">
            <!-- /.card-header -->
            <div class="card">
                <div class="card-header">
                    <div class="row row-xs">
                        <div class="col-10 col-sm-10 col-lg-10 d-flex align-items-center">
                            <div>
                            <h5 class="tx-medium tx-montserrat mg-b-5">Business List</h5>
                            <p class="card-text">Choose the business that you want to get the menu</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body card-list">
                    @foreach ( $businesss as $business )
                        <div class="card-list-item">
                            <a href="{{route('menu_list', ['business_id' => $business->id] )}}">
                                <div class="d-flex justify-content-between align-items-center sc-link">
                                    <div class="media">
                                        <div
                                            class="wd-40 ht-40 bg-its-icon mg-r-15 mg-md-r-15 d-flex align-items-center justify-content-center rounded-its">
                                            <ion-icon name="business-outline" class="tx-24 tx-primary"></ion-icon>
                                        </div>
                                        <div class="media-body align-self-center">
                                            <p class="tx-montserrat tx-medium tx-15 mg-b-0 tx-color-02">{{ $business->name }}</p>
                                            <p class="tx-color-03 tx-13">{{ $business->description }}</p>
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

@section('scripts')
<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
@endsection
