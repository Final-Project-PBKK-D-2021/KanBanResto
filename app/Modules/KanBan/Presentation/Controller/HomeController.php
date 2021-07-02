<?php

namespace App\Modules\KanBan\Presentation\Controller;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function showCreateMenuForm($business_id)
    {
        /** @var ListProductService $service */
        $service = resolve(ListProductService::class);

        $products = $service->execute($business_id);

        return view('KanBan::menu.create', compact('products'));
    }
}
