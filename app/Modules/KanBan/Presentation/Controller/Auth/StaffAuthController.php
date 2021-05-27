<?php


namespace App\Modules\KanBan\Presentation\Controller\Auth;


use App\Http\Requests\StaffLoginFormRequest;
use App\Http\Requests\StaffRegisterFormRequest;
use App\Modules\KanBan\Core\Application\Service\Staff\StaffLogin\StaffLoginRequest;
use App\Modules\KanBan\Core\Application\Service\Staff\StaffLogin\StaffLoginService;
use App\Modules\KanBan\Core\Application\Service\Staff\StaffRegister\StaffRegisterRequest;
use App\Modules\KanBan\Core\Application\Service\Staff\StaffRegister\StaffRegisterService;
use App\Modules\Shared\Mechanism\UnitOfWork;
use Illuminate\Support\Facades\Hash;
use Throwable;

class StaffAuthController
{
    private UnitOfWork $unit_of_work;

    /**
     * StaffAuthController constructor.
     * @param UnitOfWork $unit_of_work
     */
    public function __construct(UnitOfWork $unit_of_work)
    {
        $this->unit_of_work = $unit_of_work;
    }

    public function showRegisterForm()
    {
        return view('KanBan::staff.register');
    }

    public function showLoginForm()
    {
        return view('KanBan::staff.login');
    }

    public function register(StaffRegisterFormRequest $request, $outlet_id)
    {
        $input = new StaffRegisterRequest(
            $request->input('username'),
            $request->input('name'),
            Hash::make($request->input('password')),
            $request->input('staff_role'),
            $outlet_id
        );

        /** @var StaffRegisterService $service */
        $service = resolve(StaffRegisterService::class);
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


        return redirect()->route('home');
    }

    public function authenticate(StaffLoginFormRequest $request)
    {
        $input = new StaffLoginRequest(
            $request->input('username'),
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
}
