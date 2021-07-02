@extends('base-out')

@section('title')
    Register
@endsection

@section('header_title')
    Regsiter
@endsection

@section('header_right')
    <a href="{{ route('owner.business.create') }}" class="btn btn-primary tx-montserrat tx-semibold mg-r-5 mg-lg-r-10">
        <i data-feather="plus" class="wd-10 mg-r-5"></i>Tambah
    </a>
@endsection

@section('content')
    <div class="wrapper">
		<div class="box shadow-sm">
            <a href="{{ route('welcome') }}">
			<img src="{{ url('assets/img/logo.png') }}" alt="Logo Kanban Resto" class="logo">
			</a>
            <form action="{{route('register')}}" method="post" autocomplete="off">
                @csrf
                <!-- Nama -->
                <div class="inputbox form-input @error('name') is-invalid @enderror">
                    <label for="">Nama Lengkap</label>
                    <input id="name" type="text" name="name"
                        value="{{ old('name') }}" autocomplete="name" autofocus>
                </div>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <!-- Nama / -->

                <!-- Email -->
                <div class="inputbox @error('email') is-invalid @enderror">
                    <label for="">Email</label>
                    <input id="email" type="email" name="email"
                        value="{{ old('email') }}" autocomplete="email" autofocus>
                </div>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <!-- Email / -->

                <!-- Password -->
                <div class="inputbox @error('password') is-invalid @enderror">
                    <label for="">Password</label>
                    <input id="password" type="password" name="password" value="{{ old('password') }}"
                        autocomplete="current-password" autofocus>
                </div>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <!-- Password / -->

                <!-- Confirm Password -->
                <div class="inputbox @error('password') is-invalid @enderror">
                    <label for="">Konfirmasi Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation"
                        value="{{ old('password') }}" autocomplete="current-password" auto_focus> 
                </div>
                <!-- Confirm Password / -->
                
                <div class="inputbox">
                    <button type="submit" class="btn btn-its btn-block btn-hover">Daftar</button>
                </div>
            </form>

            <div class="row">
                <div class="column p-b-0" style="padding-top: 5px">
                    <a href="{{route('login')}}" style="font-weight: normal">Sudah punya akun? <b>Masuk</b></a>
                </div>
            </div>
		</div>
        @if ($errors->any())
        <div class="alert alert-danger mt-3" role="alert">
            <ul class="pd-l-15">
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif
		<footer class="m-sm-t-30">&copy; 2021 KanbanResto.</footer>
	</div>
@endsection

@section('scripts')
<script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
@endsection

