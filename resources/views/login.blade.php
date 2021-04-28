<html>
<head>

</head>
<body>
<div class="user-form vertical-center-middle">
    <div class="text-center">
        <img src="{{asset('assets/images/logo-lkihi.png')}}">
    </div>
    <br>
    <div class="title text-center">Lembaga Kajian Islam dan Hukum Islam</div>
    <div class="sub-title text-center">Fakultas Hukum Universitas Indonesia</div>
    <form action="{{route('login')}}" method="post">
    @csrf
    <!-- Email -->
        <div class="form-input @error('email') is-invalid @enderror">
            <input id="email" type="email" name="email"
                   value="{{ old('email') }}" autocomplete="email" autofocus placeholder="E-Mail">
            @error('email')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <!-- Email / -->
        <!-- Password -->
        <div class="form-input @error('password') is-invalid @enderror">
            <input id="email" type="password" name="password" value="{{ old('password') }}"
                   autocomplete="current-password" placeholder="Password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <!-- Password / -->
        <!-- Submit -->
        <div class="submit-btn">
            <button type="submit" class="form-btn">
                {{ __('Login') }}
            </button>
        </div>
    </form>
</div>
</body>
</html>
