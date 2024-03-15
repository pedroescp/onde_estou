<?php

namespace App\Http\Controllers;

use App\DTO\Sectors\CreateSectorsDTO;
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
            totalPerpage:$request->get('per_page', 10),
            filter:$request->filter,
        );

        $filters = ['filter' => $request->get('filter', '')];

        return view('sectors/index', compact('sectors', 'filters'));
    }

    public function create(Request $request, $id)
    {
        $company_id = $id;
        return view('sectors/create', compact('company_id'));
    }

    public function store(SectorStoreUpdateRequest $request)
    {
        $this->service->create(CreateSectorsDTO::makeFromRequest($request));
        return redirect()->route('companies.show', ['id' => $request->input('company_id')]);
    }

    public function show(string|int $id)
    {
        if (!$sectors = $this->service->findOne($id)) return redirect()->back();

        return view('/sectors/show', compact('sectors'));
    }

    public function edit(Sector $sectors, string|int $id)
    {
        if (!$sectors = $this->service->findOne($id)) return redirect()->back();

        return view('sectors/edit', compact('sectors'));
    }

    public function update(SectorStoreUpdateRequest $request)
    {
        $sectors = $this->service->update(UpdateSectorsDTO::makeFromRequest($request));

        if (!$sectors) return redirect()->back();

        return redirect()->route('companies.show', ['id' => $sectors->company_id]);
    }

    public function delete(string $id)
    {
        $sectors_detail = $this->service->findOne($id);

        $this->service->delete($id);

        return redirect()->route('companies.show', ['id' => $sectors_detail->company_id]);

    }
}
