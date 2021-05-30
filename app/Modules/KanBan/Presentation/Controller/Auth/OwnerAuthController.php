<?php


namespace App\Modules\KanBan\Presentation\Controller\Auth;


use App\Http\Controllers\Controller;
use App\Http\Requests\OwnerLoginFormRequest;
use App\Http\Requests\OwnerRegisterFormRequest;
use App\Modules\KanBan\Core\Application\Service\Owner\OwnerLogin\OwnerLoginRequest;
use App\Modules\KanBan\Core\Application\Service\Owner\OwnerLogin\OwnerLoginService;
use App\Modules\KanBan\Core\Application\Service\Owner\OwnerRegister\OwnerRegisterRequest;
use App\Modules\KanBan\Core\Application\Service\Owner\OwnerRegister\OwnerRegisterService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Throwable;


class OwnerAuthController extends Controller
{

    public function showLoginForm()
    {
        return view('login');
    }

    public function showRegisterForm()
    {
        return view('register');
    }

    public function register(OwnerRegisterFormRequest $request)
    {
        $password = $request->input('password');
        $input = new OwnerRegisterRequest(
            $request->input('name'),
            $request->input('email'),
            Hash::make($password),
        );

        /** @var OwnerRegisterService $service */
        $service = resolve(OwnerRegisterService::class);

        try {
            $service->execute($input);
        } catch (Throwable $e) {
            return back()->withErrors(
                [
                    'email' => 'Register attempt failed',
                ]
            );
        }

        $input = new OwnerLoginRequest(
            $input->getEmail(),
            $password
        );

        /** @var OwnerLoginService $service */
        $service = resolve(OwnerLoginService::class);

        try {
            $service->execute($input);
        } catch (Throwable $e) {
            return back()->withErrors(
                [
                    'email' => 'The provided credentials do not match our records.',
                ]
            );
        }
        return redirect()->route('owner.business.index');
    }

    public function authenticate(OwnerLoginFormRequest $request)
    {
        $input = new OwnerLoginRequest(
            $request->input('email'),
            $request->input('password')
        );

        /** @var OwnerLoginService $service */
        $service = resolve(OwnerLoginService::class);

        try {
            $service->execute($input);
        } catch (Throwable $e) {
            return back()->withErrors(
                [
                    'email' => 'The provided credentials do not match our records.',
                ]
            );
        }

        return redirect()->route('owner.business.index');
    }

    public function logout()
    {
        Auth::guard('owner')->logout();
        return redirect()->route('welcome');
    }
}
