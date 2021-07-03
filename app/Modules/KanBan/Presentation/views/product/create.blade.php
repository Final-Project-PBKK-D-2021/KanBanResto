@extends('base')

@section('title')
Create Product
@endsection

@section('header_title')
Create Product
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
                <x-product-form form-action="owner.withBusiness.product.create" action-name="Create" product-id="" product-name=""
                    :product-price="NULL" product-description="" product-badge=""/>
            </div>
        </div>
    </div>
</div>
    
@endsection
