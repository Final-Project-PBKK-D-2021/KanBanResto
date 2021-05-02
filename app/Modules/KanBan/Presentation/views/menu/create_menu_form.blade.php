@extends('base')
@section('title', 'Create Menu')
{{--@section('header_title', 'Create Menu')--}}
@section('content')
    <x-menu-form form-action="menu.create" action-name="Create My" menu-id="" menu-name="" menu-description=""/>
@endsection
