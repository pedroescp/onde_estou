<?php

namespace App\Http\Controllers;

use App\DTO\Locations\CreateLocationsDTO;
use App\DTO\Locations\UpdateLocationsDTO;
use App\Http\Requests\LocationsStoreUpdateRequest;
use App\Http\Resources\LocationsResource;
use App\Models\Locations;
use App\Models\Sector;
use App\Services\LocationsService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isNull;

class locationsController extends Controller
{
    public function __construct(protected LocationsService $service)
    {
    }

    public function index(Request $request)
    {
        $locations = Locations::all();

        //Instancie a Resource e passe a coleção $locations para ela
        $locationsResource = LocationsResource::collection($locations);

        $locationsResource = $locationsResource->toArray($request);


        if (Auth::check()) {
            return view('location/index', compact('locationsResource'));
        } else {
            return redirect('/login');
        }
    }
    public function create(Request $request)
    {
        $sectors = Sector::all();

        return view('location/create', compact('sectors'));
    }

    public function store(LocationsStoreUpdateRequest $request)
    {
        $request->merge([
            'user_id' => Auth::id(),
            'company_id' => Sector::where('id', $request->sector_id)->value('company_id'),
        ]);


        $existingLocation = $this->service->findByUser($request->user_id);

        if ($existingLocation) {
            $request->merge([
                'id' => $existingLocation->id,
                'create_at' => Carbon::now(),
                'update_at' => Carbon::now(),
            ]);

            $this->update($request);
        } else {

            $locationDTO = CreateLocationsDTO::makeFromRequest($request);

            $this->service->create($locationDTO);
        }

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
        $location = $this->service->update(UpdateLocationsDTO::makeFromRequest($request));

        if (!$location) return redirect()->back();

        return redirect()->route('companies');
    }

    public function updateOrigin(Request $request)
    {


        if (is_null(Auth::user()->sector_origin)) {
            return redirect()->route('locations');
        }

        $updateData = new UpdateLocationsDTO(
            Auth::user()->locations->id,
            Auth::user()->sector_origin,
            Auth::id(),
            Auth::user()->locations->company_id,
        );

        // Executar a atualização através do serviço
        $location = $this->service->update($updateData);

        if (!$location) {
            // Se a atualização falhar, redirecionar de volta com mensagem de erro
            return redirect()->back()->with('error', 'Não foi possível atualizar a localização.');
        }

        // Redirecionar para a página de locais após a atualização bem-sucedida
        return redirect()->route('locations');
    }


    public function delete(string $id)
    {
        $this->service->delete($id);

        return redirect()->route('companies');
    }
}
