@extends('base-out')

@section('title')
    Masuk
@endsection

@section('header_title')
    Masuk
@endsection

@section('content')
    <div class="wrapper">
		<div class="box shadow-sm">
            <a href="{{ route('welcome') }}">
			<img src="{{ url('assets/img/logo.png') }}" alt="Logo Kanban Resto" class="logo">
			</a>
						
            <form method="post" action="{{route('login')}}" autocomplete="off">
                @csrf
                <!-- Email -->
                <div class="inputbox form-input @error('email') is-invalid @enderror">
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
                    <input id="password" type="password" name="password" value="{{ old('password') }}" class="inputbox"
                        autocomplete="current-password" autofocus>
                </div>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                
                <div class="inputbox">
                    <button type="submit" class="btn btn-its btn-block btn-hover">Masuk</button>
                </div>
            </form>

            <div class="row">
                <div class="column p-b-0" style="padding-top: 5px">
                    <a href="{{route('register')}}" style="font-weight: normal">Belum punya akun? <b>Daftar</b></a>
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

