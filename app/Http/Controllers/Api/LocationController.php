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

    public function updateOrigin($request)
    {
        
        dd($request);

        $location = $this->service->update(UpdateLocationsDTO::makeFromRequest($request));

        if (!$location) return redirect()->back();

        return redirect()->route('companies');
    }
}
