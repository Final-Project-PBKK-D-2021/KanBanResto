@extends('base')
@section('title', 'Create order')
{{--@section('header_title', 'Create order')--}}
@section('content')
    <x-order-form form-action="order.create" action-name="Create" order-id="" order-name=""
                    :order-total_price="NULL" />
@endsection
