<?php


namespace App\Modules\KanBan\Presentation\Controller\Auth;


use App\Http\Requests\StaffLoginFormRequest;
use App\Http\Requests\StaffRegisterFormRequest;
use App\Modules\KanBan\Core\Application\Service\Staff\StaffLogin\StaffLoginRequest;
use App\Modules\KanBan\Core\Application\Service\Staff\StaffLogin\StaffLoginService;
use App\Modules\KanBan\Core\Application\Service\Staff\StaffRegister\StaffRegisterRequest;
use App\Modules\KanBan\Core\Application\Service\Staff\StaffRegister\StaffRegisterService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Throwable;

class StaffAuthController
{
    public function showRegisterForm()
    {
        return view('KanBan::staff.register');
    }

    public function showLoginForm()
    {
        return view('KanBan::staff.login');
    }

    public function register(StaffRegisterFormRequest $request, $business_id, $outlet_id)
    {
        $input = new StaffRegisterRequest(
            $request->input('email'),
            $request->input('name'),
            Hash::make($request->input('password')),
            $request->input('staff_role'),
            $outlet_id
        );

        /** @var StaffRegisterService $service */
        $service = resolve(StaffRegisterService::class);

        try {
            $service->execute($input);
        } catch (Throwable $e) {
            return back()->withErrors(
                [
                    'email' => 'Register attempt failed',
                ]
            );
        }

        return redirect()->route(
            'owner.withBusiness.withOutlet.staff.index',
            ['business_id' => $business_id, 'outlet_id' => $outlet_id]
        );
    }

    public function authenticate(StaffLoginFormRequest $request)
    {
        $input = new StaffLoginRequest(
            $request->input('email'),
            $request->input('password')
        );

        /** @var StaffLoginService $service */
        $service = resolve(StaffLoginService::class);

        try {
            $service->execute($input);
        } catch (Throwable $e) {
            return back()->withErrors(
                [
                    'email' => 'The provided credentials do not match our records.',
                ]
            );
        }

        return redirect()->intended('/dd_session');
    }

    public function logout()
    {
        Auth::guard('staff')->logout();
        return redirect()->route('welcome');
    }
}
