<?php


namespace App\Modules\KanBan\Presentation\Controller\Login;


use App\Exceptions\KanBanException;
use App\Http\Controllers\Controller;
use App\Modules\KanBan\Core\Application\Service\OwnerLogin\OwnerLoginRequest;
use App\Modules\KanBan\Core\Application\Service\OwnerLogin\OwnerLoginService;
use App\Modules\Shared\Mechanism\UnitOfWork;
use Illuminate\Http\Request;


class OwnerLoginController extends Controller
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
        if (view()->exists('auth.authenticate')) {
            return view('auth.authenticate');
        }

        return view('comapany.auth.login');
    }

    public function authenticate(Request $request): \Illuminate\Http\RedirectResponse
    {
        $input = new OwnerLoginRequest(
            $request->input('email'),
            $request->input('password')
        );

        /** @var OwnerLoginService $service */
        $service = resolve(OwnerLoginService::class);
        $this->unit_of_work->begin();

        try {
            $service->execute($input);
        } catch (KanBanException $e) {
            return back()->withErrors(
                [
                    'email' => 'The provided credentials do not match our records.',
                ]
            );
        }

        return redirect()->route('dashboard');
    }
}