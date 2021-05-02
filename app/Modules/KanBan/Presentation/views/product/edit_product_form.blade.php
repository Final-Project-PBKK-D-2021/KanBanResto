@extends('base')
@section('title', 'Edit Product')
{{--@section('header_title', 'Create Product')--}}
@section('content')
    <x-product-form form-action="product.update" action-name="Edit " product-id="{{$product->getId()}}" product-name="{{$product->getName()}}" product-price="{{$product->getPrice()}}" product-description="{{$product->getDescription()}}" product-badge="{{$product->getBadge()}}"/>
@endsection