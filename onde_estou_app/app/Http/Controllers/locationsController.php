<?php

namespace App\Http\Controllers;

use App\DTO\Locations\CreateLocationsDTO;
use App\DTO\Locations\UpdateLocationsDTO;
use App\Http\Requests\LocationsStoreUpdateRequest;
use App\Http\Resources\LocationsResource;
use App\Models\Locations;
use App\Models\Sector;
use App\Services\LocationsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class locationsController extends Controller
{
    public function __construct(protected LocationsService $service)
    {
    }

    public function index_auth_off(Request $request)
    {
        $locations = $this->service->paginate(
            page: $request->get('page', 1),
            totalPerpage: $request->get('per_page', 3),
            filter: $request->filter,
        );

        $filters = ['filter' => $request->get('filter', '')];

        return view('default', compact('locations', 'filters'));
    }

    public function index(Request $request)
    {

        $locations = Locations::all();
    
        // Instancie a Resource e passe a coleção $locations para ela
        $locationsResource = LocationsResource::collection($locations);
    
        return view('location/index', compact('locationsResource'));
    }
    public function create(Request $request)
    {
        $sectors = Sector::all();

        return view('location/create', compact('sectors'));
    }

    public function store(LocationsStoreUpdateRequest $request)
    {
        $request->merge(['user_id' => Auth::id()]);
        $request->merge([
            'company_id' => Sector::select('company_id')->find($request->sector_id)->value('company_id')
        ]);

        $locationDTO = CreateLocationsDTO::makeFromRequest($request);
    
        // Passe o DTO para o método create do serviço
        $this->service->create($locationDTO);
    
        return redirect('/locations');
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
