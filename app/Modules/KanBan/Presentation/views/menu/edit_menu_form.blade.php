@extends('base')
@section('title', 'Edit Menu')
{{--@section('header_title', 'Create Menu')--}}
@section('content')
    <x-menu-form form-action="owner.withBusiness.menu.update" action-name="Edit My" menu-id="{{$menu->getId()}}"
                 menu-name="{{$menu->getName()}}" menu-description="{{$menu->getDescription()}}"/>
@endsection
