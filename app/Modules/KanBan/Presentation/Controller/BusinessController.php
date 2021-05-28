<?php

namespace App\Modules\KanBan\Presentation\Controller;

use App\Modules\KanBan\Core\Application\Service\Business\CreateBusiness\CreateBusinessRequest;
use App\Modules\KanBan\Core\Application\Service\Business\CreateBusiness\CreateBusinessService;
use App\Modules\KanBan\Core\Application\Service\Business\DeleteBusiness\DeleteBusinessRequest;
use App\Modules\KanBan\Core\Application\Service\Business\DeleteBusiness\DeleteBusinessService;
use App\Modules\KanBan\Core\Application\Service\Business\EditBusiness\EditBusinessRequest;
use App\Modules\KanBan\Core\Application\Service\Business\EditBusiness\EditBusinessService;
use App\Modules\KanBan\Core\Application\Service\Business\GetBusiness\GetBusinessRequest;
use App\Modules\KanBan\Core\Application\Service\Business\GetBusiness\GetBusinessService;
use App\Modules\KanBan\Core\Application\Service\Business\ListBusiness\ListBusinessService;
use Illuminate\Http\Request;
use Throwable;

class BusinessController
{

    public function showBusinessList()
    {
        /** @var ListBusinessService $service */
        $service = resolve(ListBusinessService::class);

        $businesss = $service->execute();

        return view('KanBan::business.index', compact('businesss'));
    }

    public function showCreateBusinessForm()
    {
        return view('KanBan::business.create');
    }

    public function createBusiness(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|max:255',
                'description' => 'required',
                'since' => 'required',
                'owner_name' => 'required|max:255'
            ]
        );

        $input = new CreateBusinessRequest(
            $request->name,
            $request->description,
            $request->since,
            $request->owner_name,
        );

        /** @var CreateBusinessService $service */
        $service = resolve(CreateBusinessService::class);

        try {
            $service->execute($input);
        } catch (Throwable $e) {
            return redirect()->back()->with('alert', 'Business Creation Failed');
        }
        return redirect()->route('business.index');
    }

    public function updateBusiness(Request $request)
    {
        $request->validate(
            [
                'business_id' => 'required',
                'name' => 'required|max:255',
                'description' => 'required',
                'since' => 'required',
                'owner_name' => 'required|max:255'
            ]
        );

        $input = new EditBusinessRequest(
            $request->business_id,
            $request->name,
            $request->description,
            $request->since,
            $request->owner_name,
        );

        /** @var EditBusinessService $service */
        $service = resolve(EditBusinessService::class);

        try {
            $service->execute($input);
        } catch (Throwable $e) {
            return redirect()->back()->with('alert', 'Business Update Failed');
        }
        return redirect()->route('business.index');
    }

    public function showEditBusiness(int $menu_id){
        $input = new GetBusinessRequest($menu_id);

        /** @var GetBusinessService $service */
        $service = resolve(GetBusinessService::class);

        $business =  $service->execute($input);

        return view('KanBan::business.edit', compact('business'));
    }

    public function deleteBusiness (Request $request){
        $input = new DeleteBusinessRequest(
            $request->business_id
        );

        /** @var DeleteBusinessService $service */
        $service = resolve(DeleteBusinessService::class);

        try {
            $service->execute($input);
        } catch (Throwable $e) {
            return redirect()->back()->with('alert', 'Business Delete Failed');
        }
        return redirect()->route('business.index');
    }
}
