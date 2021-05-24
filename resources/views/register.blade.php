@extends('layouts.userscrud')

@section('pageContent')

    <div class="user-form vertical-center-middle">
        <div class="title text-center">Lembaga Kajian Islam dan Hukum Islam</div>
        <div class="sub-title text-center">Fakultas Hukum Universitas Indonesia</div>
        <form action="{{route('register')}}" method="post">
        @csrf
        <!-- Nama -->
            <div class="form-input @error('name') is-invalid @enderror">
                <input id="name" type="text" name="name"
                       value="{{ old('name') }}" autofocus placeholder="Nama Lengkap">
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <!-- Nama / -->

            <!-- Email -->
            <div class="form-input @error('email') is-invalid @enderror">
                <input id="email" type="email" name="email"
                       value="{{ old('email') }}" autocomplete="email" placeholder="E-Mail">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <!-- Email / -->

            <!-- Password -->
            <div class="form-input @error('password') is-invalid @enderror">
                <input id="password" type="password" name="password" value="{{ old('password') }}"
                       autocomplete="current-password" placeholder="Password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <!-- Password / -->

            <!-- Confirm Password -->
            <div class="form-input @error('password') is-invalid @enderror">
                <input id="password_confirmation" type="password" name="password_confirmation"
                       value="{{ old('password') }}"
                       autocomplete="current-password" placeholder="Confirm Password">
            </div>
            <!-- Confirm Password / -->

            <!-- Submit -->
            <div class="submit-btn">
                <button type="submit" class="form-btn d-block">
                    {{ __('Register') }}
                </button>
            </div>
            <!-- Submit / -->

            <!-- Login -->
            <div class="form-massage">
                <p>Sudah ada akun ? <a href="{{route('login')}}">Login!</a></p>
            </div>
            <!-- Login / -->
        </form>
    </div>
@endsection
