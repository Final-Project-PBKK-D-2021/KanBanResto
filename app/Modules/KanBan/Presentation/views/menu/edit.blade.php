@extends('base')

@section('title')
Edit Menu
@endsection

@section('header_title')
Edit Menu
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
                <form id="form_menu" action="{{route('owner.withBusiness.menu.update', ['business_id' => request()->route('business_id'), 'menu_id' =>  $menu->getId()])}}" method="POST" data-parsley-validate="" novalidate="">
                    @csrf
                    <div class="row row-xs">
                        <div class="col-10 col-sm-10 col-lg-10 d-flex align-items-center">
                            <div>
                            <p class="tx-medium tx-15">Menu Information</p>
                            </div>
                        </div>
                    </div>
                    <fieldset>
                        <input type="hidden" name="menu_id" id="menu_id" value="{{ old('menu_id', $menu->getId()) }}">
                        <input type="hidden" name="business_id" value="{{ request()->route('business_id') }}">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12">
                                    <label class="d-block tx-10 tx-spacing-1 tx-color-03 tx-uppercase tx-semibold" for="name">Menu Name</label>
                                    <input type="text" id="name" name="menu_name" class="form-control" value="{{ old('menu_name', $menu->getName()) }}" autocomplete="off" required="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12">
                                    <label class="d-block tx-10 tx-spacing-1 tx-color-03 tx-uppercase tx-semibold" for="description">Descripton</label>
                                    <input type="text" id="description" name="menu_description" class="form-control" value="{{ old('menu_name', $menu->getDescription()) }}"
                                           autocomplete="off" required="">
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
                                            <option value="{{ $product->id }}" {{ $menu->getProducts()[0] == $product->id ? 'selected' : '' }}>{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <button type="submit" form="form_menu" class="btn btn-primary tx-montserrat tx-semibold float-right">Simpan</button>
                </form>
                <a href="#" data-toggle="modal" data-animation="effect-scale" data-target="#modal-hapus" class="btn btn-danger tx-montserrat tx-semibold float-right mg-r-10">
                    Hapus
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Modal hapus -->
<div class="modal fade" id="modal-hapus" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg-white">
            <!-- Begin overlay-->
            <div class="modal-spinner" style="display: none;">
                <div class="spinner-alignment">
                    <span class="spinner-border tx-white"></span>
                </div>
            </div>
            <!-- End overlay-->
            <div class="modal-header">
                <div>
                    <h5 class="tx-montserrat tx-semibold">Delete Outlet</h5>
                    <a href="" role="button" class="close pos-absolute t-15 r-15" data-dismiss="modal"
                       aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </a>
                </div>
            </div>
            <div class="modal-body">
                <div>
                    <p>Are you sure to delete <b>{{ $menu->getName() }} menu</b>?</p>
                </div>
                <div>
                    <form id="form-hapus" method="POST" action="{{route('owner.withBusiness.menu.delete',['business_id' => request()->route('business_id'), 'menu_id' => $menu->getId()])}}">
                        @csrf
                        <input type="hidden" name="menu_id" value="{{ $menu->getId() }}">
                        <button class="btn btn-danger btn-block tx-montserrat tx-semibold form-submit-button"
                                type="submit" form="form-hapus">Delete
                        </button>
                    </form>
                </div>
            </div><!-- modal-body -->
        </div><!-- modal-content -->
    </div>
</div>
@endsection

