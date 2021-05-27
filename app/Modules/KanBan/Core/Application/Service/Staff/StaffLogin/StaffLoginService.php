<?php


namespace App\Modules\KanBan\Core\Application\Service\Staff\StaffLogin;


use Illuminate\Support\Facades\Auth;

class StaffLoginService
{
    public function execute(StaffLoginRequest $request)
    {
        if (Auth::guard('staff')->attempt(
            ['username' => $request->getUsername(), 'password' => $request->getPassword()]
        )) {
            request()->session()->regenerate();
        }
    }
}
