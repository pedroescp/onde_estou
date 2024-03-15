<?php

namespace App\Http\Controllers;

use App\DTO\Companies\CreateCompaniesDTO;
use App\DTO\Companies\UpdateCompaniesDTO;
use App\Http\Requests\CompaniesStoreUpdateRequest;
use App\Models\Companies;
use App\Models\Sector;
use App\Services\CompaniesService;
use Illuminate\Http\Request;

class companiesController extends Controller
{
    public function __construct(protected CompaniesService $service)
    {
    }

    public function index(Request $request)
    {
        $companies = $this->service->paginate(
            page: $request->get('page', 1),
            totalPerpage:$request->get('per_page', 10),
            filter:$request->filter,
        );

        $filters = ['filter' => $request->get('filter', '')];

        return view('companies/index', compact('companies', 'filters'));
    }

    public function create(Request $request)
    {
        return view('companies/create');
    }

    public function store(CompaniesStoreUpdateRequest $request)
    {
        $this->service->create(CreateCompaniesDTO::makeFromRequest($request));

        return redirect('/companies');
    }

    public function show(string|int $id, Request $request)
    {
        if (!$companie = $this->service->findOne($id)) return redirect()->back();

        //Arrumar isso depois 
        $sectors = Sector::where('company_id', $companie->id)->get();

        return view('/companies/show', compact('companie', 'sectors'));
    }

    public function edit(Companies $companie, string|int $id)
    {
        if (!$companie = $this->service->findOne($id)) return redirect()->back();

        return view('/companies/edit', compact('companie'));
    }

    public function update(CompaniesStoreUpdateRequest $request)
    {
        $companie = $this->service->update(UpdateCompaniesDTO::makeFromRequest($request));

        if (!$companie) return redirect()->back();

        return redirect()->route('companies');
    }

    public function delete(string $id)
    {
        $this->service->delete($id);

        return redirect()->route('companies');
    }
}
