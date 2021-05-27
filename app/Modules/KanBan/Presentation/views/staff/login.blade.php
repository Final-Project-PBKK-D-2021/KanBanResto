<html>
<head>

</head>
<body>
<div class="user-form vertical-center-middle">
    <br>
    <div class="title text-center">Lembaga Kajian Islam dan Hukum Islam</div>
    <div class="sub-title text-center">Fakultas Hukum Universitas Indonesia</div>
    <form action="{{route('staff_login')}}" method="post">
    @csrf
    <!-- Email -->
        <div class="form-input @error('username') is-invalid @enderror">
            <input id="username" type="username" name="username"
                   value="{{ old('username') }}" autocomplete="username" autofocus placeholder="Username">
            @error('username')
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
