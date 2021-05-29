@extends('base-in')

@section('title')
Create Business
@endsection

@section('header_title')
Create Business
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
                <x-business-form form-action="owner.business.store" id="" name="" description="" since="" owner-name=""/>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
@endsection
