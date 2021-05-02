@extends('base')
@section('title', 'Create product')
{{--@section('header_title', 'Create product')--}}
@section('content')
    <x-product-form form-action="product.create" action-name="Create" product-id="" product-name="" :product-price="NULL" product-description="" product-badge="" />
@endsection
