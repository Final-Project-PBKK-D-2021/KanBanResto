@extends('base')

@section('title')
    Outlet Detail
@endsection

@section('header_title')
    Outlet Detail
@endsection

@section('header_right')
    @if(Auth::guard('owner')->check())
    <a href="{{route('owner.withBusiness.outlet.index', ['outlet' => $outlet->id, 'business_id' => request()->route('business_id')])}}" class="btn btn-white tx-montserrat tx-semibold d-none d-lg-block">
        <i data-feather="arrow-left" class="wd-10 mg-r-5"></i>Kembali
    </a>
    @endif
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row row-xs">
                <div class="col-10 col-sm-10 col-lg-10 d-flex align-items-center">
                    <div>
                    <h5 class="tx-medium tx-montserrat mg-b-5">Informasi Outlet</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <span class="tx-10 tx-spacing-1 tx-color-03 tx-uppercase tx-semibold">Nama</span> 
            <p class="card-text">{{ $outlet->nama_outlet }}</p>

            <div class="row row-xs">
                <div class="col-6">
                    <span class="tx-10 tx-spacing-1 tx-color-03 tx-uppercase tx-semibold">Alamat</span> 
                    <p class="card-text">{{ $outlet->alamat_outlet }}</p>
                </div>
                <div class="col-6">
                    <span class="tx-10 tx-spacing-1 tx-color-03 tx-uppercase tx-semibold">No. Telepon</span> 
                    <p class="card-txext">{{ $outlet->no_telepon_outlet }}</p>
                </div>
            </div>
            
            <div class="row row-xs mg-t-10">
                <a href="{{route('owner.withBusiness.outlet.edit', ['business_id' => request()->route('business_id'), 'outlet' => $outlet->id])}}" class="btn btn-outline-primary tx-montserrat tx-semibold mg-r-5 mg-lg-r-10">
                    Edit
                </a>
                <div>
                    <form id="form-hapus" method="POST" action="{{route('owner.withBusiness.outlet.destroy', ['business_id' => request()->route('business_id'), 'outlet' => $outlet->id])}}">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="business_id" value="{{ request()->route('business_id') }}">
                        <input type="hidden" name="outlet" value="{{ $outlet->id }}">
                        <button class="btn btn-outline-danger btn-block tx-montserrat tx-semibold form-submit-button"
                                type="submit" form="form-hapus">Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="card mg-t-20">
        <div class="card-header">
            <div class="row row-xs">
                <div class="col-10 col-sm-10 col-lg-10 d-flex align-items-center">
                    <div>
                    <h5 class="tx-medium tx-montserrat mg-b-5">Staff List Outlet</h5>
                    </div>
                </div>
                <div class="col-2 col-sm-2 col-lg-2">
                    <a href="{{route('owner.withBusiness.withOutlet.staff.index', ['business_id' => request()->route('business_id'), 'outlet_id' => $outlet->id ])}}" 
                        class="btn btn-white tx-montserrat tx-semibold float-right d-none d-lg-block"><i data-feather="users" class="wd-10 mg-r-5"></i> Show</a>
                    <a href="{{route('owner.withBusiness.withOutlet.staff.index', ['business_id' => request()->route('business_id'), 'outlet_id' => $outlet->id ])}}" 
                        class="btn btn-white btn-icon tx-montserrat tx-medium float-right d-lg-none"><i data-feather="users"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection
