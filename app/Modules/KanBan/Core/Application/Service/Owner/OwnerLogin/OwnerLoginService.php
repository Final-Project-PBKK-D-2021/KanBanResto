<?php


namespace App\Modules\KanBan\Core\Application\Service\Owner\OwnerLogin;


use Illuminate\Support\Facades\Auth;

class OwnerLoginService
{
    public function execute (OwnerLoginRequest $request){
        Auth::guard('owner')->attempt(['email' => $request->getEmail(), 'password' => $request->getPassword()]);
    }
}
