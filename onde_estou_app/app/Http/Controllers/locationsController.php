<?php

namespace App\Http\Controllers;

use App\DTO\Locations\CreateLocationsDTO;
use App\DTO\Locations\UpdateLocationsDTO;
use App\Http\Requests\LocationsStoreUpdateRequest;
use App\Models\Locations;
use App\Services\LocationsService;
use Illuminate\Http\Request;

class locationsController extends Controller
{
    public function __construct(protected LocationsService $service)
    {
    }

    public function index(Request $request)
    {
        $locations = $this->service->paginate(
            page: $request->get('page', 1),
            totalPerpage:$request->get('per_page', 3),
            filter:$request->filter,
        );

        $filters = ['filter' => $request->get('filter', '')];

        return view('location/index', compact('locations', 'filters'));
    }
    public function create(Request $request)
    {
        return view('companies/create');
    }

    public function store(LocationsStoreUpdateRequest $request)
    {
        $this->service->create(CreateLocationsDTO::makeFromRequest($request));

        return redirect('/companies');
    }

    public function show(string|int $id)
    {
        if (!$companie = $this->service->findOne($id)) return redirect()->back();

        return view('/companies/show', compact('companie'));
    }

    public function edit(Locations $companie, string|int $id)
    {
        if (!$companie = $this->service->findOne($id)) return redirect()->back();

        return view('/companies/edit', compact('companie'));
    }

    public function update(LocationsStoreUpdateRequest $request)
    {
        $companie = $this->service->update(UpdateLocationsDTO::makeFromRequest($request));

        if (!$companie) return redirect()->back();

        return redirect()->route('companies');
    }

    public function delete(string $id)
    {
        $this->service->delete($id);

        return redirect()->route('companies');
    }
}
