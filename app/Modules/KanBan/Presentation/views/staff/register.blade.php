@extends('base')

@section('title')
    Register New Staff
@endsection

@section('header_title')
    Register New Staff
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
            <form id="form_business"
                  action="{{route('owner.withBusiness.withOutlet.staff.register', ['business_id' => request()->route('business_id'), 'outlet_id' => request()->route('outlet_id')])}}"
                  method="POST" data-parsley-validate="" novalidate="">
                @csrf
                <div class="card bg-white">
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12">
                                    <label class="d-block tx-10 tx-spacing-1 tx-color-03 tx-uppercase tx-semibold"
                                           for="name">Staff Name</label>
                                    <input type="text" id="name" name="name" class="form-control"
                                           value="{{ old('name') }}" autocomplete="off" required="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12">
                                    <label class="d-block tx-10 tx-spacing-1 tx-color-03 tx-uppercase tx-semibold"
                                           for="name">Userame</label>
                                    <input type="text" id="name" name="username" class="form-control"
                                           value="{{ old('username') }}" autocomplete="off" required="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12">
                                    <select name="staff_role" class="form-control">
                                        <option value="cashier">Kasir</option>
                                        <option value="kitchen">Dapur</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12">
                                    <label class="d-block tx-10 tx-spacing-1 tx-color-03 tx-uppercase tx-semibold"
                                           for="name">Password</label>
                                    <input type="password" id="name" name="password" class="form-control"
                                           value="{{ old('password') }}" autocomplete="off" required="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-12">
                                    <label class="d-block tx-10 tx-spacing-1 tx-color-03 tx-uppercase tx-semibold"
                                           for="name">Confirm Password</label>
                                    <input type="password" id="name" name="password_confirmation" class="form-control"
                                           autocomplete="off" required="">
                                </div>
                            </div>
                        </div>
                        <div class="submit-btn">
                            <button type="submit" class="form-btn">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
@endsection
