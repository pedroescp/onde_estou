<?php

namespace App\Http\Controllers;

use App\Services\LocationsService;
use Illuminate\Http\Request;

class locationsController extends Controller
{
    public function __construct(protected LocationsService $service)
    {
    }

    public function index(Request $request)
    {
        $location = $this->service->paginate(
            page: $request->get('page', 1),
            totalPerpage:$request->get('per_page', 3),
            filter:$request->filter,
        );

        $filters = ['filter' => $request->get('filter', '')];

        dd($location);

        return view('location/index', compact('location', 'filters'));
    }
}
