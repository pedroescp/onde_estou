<?php

namespace App\Http\Controllers;

use App\DTO\Companies\CreateSectorsDTO;
use App\DTO\Sectors\UpdateSectorsDTO;
use App\Http\Requests\SectorStoreUpdateRequest;
use App\Models\Sector;
use App\Services\SectorsService;
use Illuminate\Http\Request;

class sectorsController extends Controller
{
    public function __construct(protected SectorsService $service)
    {
    }

    public function index(Request $request)
    {
        $sectors = $this->service->paginate(
            page: $request->get('page', 1),
            totalPerpage:$request->get('per_page', 3),
            filter:$request->filter,
        );

        $filters = ['filter' => $request->get('filter', '')];

        return view('sectors/index', compact('sectors', 'filters'));
    }

    public function create(Request $request)
    {
        return view('sectors/create');
    }

    public function store(SectorStoreUpdateRequest $request)
    {
        $this->service->create(CreateSectorsDTO::makeFromRequest($request));

        return redirect('/sectors');
    }

    public function show(string|int $id)
    {
        if (!$sectors = $this->service->findOne($id)) return redirect()->back();

        return view('/sectors/show', compact('sectors'));
    }

    public function edit(Sector $sectors, string|int $id)
    {
        if (!$sectors = $this->service->findOne($id)) return redirect()->back();

        return view('/sectors/edit', compact('sectors'));
    }

    public function update(SectorStoreUpdateRequest $request)
    {
        $sectors = $this->service->update(UpdateSectorsDTO::makeFromRequest($request));

        if (!$sectors) return redirect()->back();

        return redirect()->route('sectors');
    }

    public function delete(string $id)
    {
        $this->service->delete($id);

        return redirect()->route('sectors');
    }
}
