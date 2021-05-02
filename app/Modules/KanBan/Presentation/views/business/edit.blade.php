@extends('base')

@section('title')
Create Business
@endsection

@section('header_title')
Edit Business
@endsection

@section('header_right')

@endsection

@section('prestyles')
    <link rel="stylesheet" href="{{ asset('lib/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
@endsection

@section('content')
<div class="row row-xs">
    @if ($errors->any())
        <div class="alert alert-danger mt-3" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="col-sm-12 col-lg-12 mg-b-10">
        <div class="card bg-white">
            <div class="card-body">
                <x-business-form form-action="business.update" id="{{ $business->getId() }}" name="{{ $business->getName() }}" description="{{ $business->getDescription() }}" since="{{ $business->getSince() }}" owner-name="{{ $business->getOwnerName() }}"/>
                <a href="#" data-toggle="modal" data-animation="effect-scale" data-target="#modal-hapus" class="btn btn-danger tx-montserrat tx-semibold float-right mg-r-10">Hapus</a>
            </div>
        </div>
    </div>
</div>
<!-- Modal beasiswa -->
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
                        <h5 class="tx-montserrat tx-semibold">Delete Business</h5>
                        <a href="" role="button" class="close pos-absolute t-15 r-15" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </a>
                    </div>
                </div>
                <div class="modal-body">
                    <div>
                        <p>Are you sure to delete <b>{{ $business->getName() }}</b>?</p>
                    </div>
                    <div>
                        <form id="form-hapus" method="POST" action="{{ route('business.delete') }}">
                            @csrf
                            <input type="hidden" name="business_id" value="{{ $business->getId() }}">
                            <button class="btn btn-danger btn-block tx-montserrat tx-semibold form-submit-button" type="submit" form="form-hapus">Delete</button>
                        </form>
                    </div>
                </div><!-- modal-body -->
            </div><!-- modal-content -->
        </div>
    </div>
@endsection

@section('scripts')
<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
@endsection