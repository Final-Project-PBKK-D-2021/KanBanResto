@extends('base')

@section('title')
Create Menu
@endsection

@section('header_title')
Create Menu
@endsection

@section('header_right')

@endsection

@section('prestyles')
    <link rel="stylesheet" href="{{ asset('lib/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
@endsection

@section('content')
<div class="row row-xs">
    <div class="col-sm-12 col-lg-12 mg-b-10">
        <div class="card bg-white">
            <div class="card-body">
                <form id="form_menu" action="{{route('owner.withBusiness.menu.create', ['business_id' => request()->route('business_id')])}}" method="POST" data-parsley-validate="" novalidate="">
                    @csrf
                    <div class="row row-xs">
                        <div class="col-10 col-sm-10 col-lg-10 d-flex align-items-center">
                            <div>
                            <p class="tx-medium tx-15">Menu Information</p>
                            </div>
                        </div>
                    </div>
                    <fieldset>
                        <input type="hidden" name="business_id" value="{{ request()->route('business_id') }}">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12">
                                    <label class="d-block tx-10 tx-spacing-1 tx-color-03 tx-uppercase tx-semibold" for="name">Menu Name</label>
                                    <input type="text" id="name" name="menu_name" class="form-control" value="" autocomplete="off" required="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12">
                                    <label class="d-block tx-10 tx-spacing-1 tx-color-03 tx-uppercase tx-semibold"
                                           for="description">Descripton</label>
                                    <input type="text" id="description" name="menu_description" class="form-control"
                                           value="" autocomplete="off" required="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12">
                                    <label class="d-block tx-10 tx-spacing-1 tx-color-03 tx-uppercase tx-semibold">Product
                                        1</label>
                                    <select class="form-control custom-select" name="products[]" required="" multiple>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                    </fieldset>

                    <button type="submit" form="form_menu" class="btn btn-primary tx-montserrat tx-semibold float-right">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
