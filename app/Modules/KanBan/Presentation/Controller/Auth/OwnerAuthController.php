<?php


namespace App\Modules\KanBan\Presentation\Controller\Auth;


use App\Http\Controllers\Controller;
use App\Http\Requests\OwnerLoginFormRequest;
use App\Http\Requests\OwnerRegisterFormRequest;
use App\Modules\KanBan\Core\Application\Service\Owner\OwnerLogin\OwnerLoginRequest;
use App\Modules\KanBan\Core\Application\Service\Owner\OwnerLogin\OwnerLoginService;
use App\Modules\KanBan\Core\Application\Service\Owner\OwnerRegister\OwnerRegisterRequest;
use App\Modules\KanBan\Core\Application\Service\Owner\OwnerRegister\OwnerRegisterService;
use App\Modules\Shared\Mechanism\UnitOfWork;
use Illuminate\Support\Facades\Hash;
use Throwable;


class OwnerAuthController extends Controller
{
    private UnitOfWork $unit_of_work;

    /**
     * OwnerLoginController constructor.
     * @param UnitOfWork $unit_of_work
     */
    public function __construct(UnitOfWork $unit_of_work)
    {
        $this->unit_of_work = $unit_of_work;
    }

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
        $input = new OwnerRegisterRequest(
            $request->input('name'),
            $request->input('email'),
            Hash::make($request->input('password')),
        );

        /** @var OwnerRegisterService $service */
        $service = resolve(OwnerRegisterService::class);
        $this->unit_of_work->begin();

        try {
            $service->execute($input);
        } catch (Throwable $e) {
            $this->unit_of_work->rollback();
            return back()->withErrors(
                [
                    'email' => 'Register attempt failed',
                ]
            );
        }
        $this->unit_of_work->commit();

        $input = new OwnerLoginRequest(
            $input->getEmail(),
            $input->getPassword()
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
        return redirect()->route('home');
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

        return redirect()->route('home');
    }
}
