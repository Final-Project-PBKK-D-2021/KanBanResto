@component('mail::message')
    # Dear, {{ $name }}

    You are receiving this email because you've just registered as Staff in KanBanResto.
    This is your account detail:
    - Email : {{ $email }}
    - Password : {{ $password }}

    Don't tell anyone, this is confidential.

    We are delighted to have you among us.
    On behalf of all the members and the management,
    we would like to extend our warmest welcome and good wishes!

    Thanks,
    {{ config('app.name') }}

    @slot('footer')
        @component('mail::footer')
            ©KanBanResto 2021 All Right Reserved
        @endcomponent
    @endslot
@endcomponent
