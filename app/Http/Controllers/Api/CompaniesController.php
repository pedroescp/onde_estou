<?php

namespace App\Http\Controllers\Api;

use App\Adapters\ApiAdapter;
use App\DTO\Companies\CreateCompaniesDTO;
use App\DTO\Companies\UpdateCompaniesDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\CompaniesStoreUpdateRequest;
use App\Http\Resources\CompaniesResource;
use App\Services\CompaniesService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CompaniesController extends Controller
{
    public function __construct(
        protected CompaniesService $service,
    ) {
    }


    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //$companies = Companies::paginate();

        $companies = $this->service->paginate(
            page: $request->get('page', 1),
            totalPerpage: $request->get('per_page', 10),
            filter: $request->filter,
        );

        return ApiAdapter::toJson($companies);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompaniesStoreUpdateRequest $request)
    {
        $companies = $this->service->create(
            CreateCompaniesDTO::makeFromRequest($request)
        );

        return new CompaniesResource($companies);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (!$companies = $this->service->findOne($id)) {
            return response()->json([
                'error' => 'Not found'
            ], Response::HTTP_NOT_FOUND);
        }

        return new CompaniesResource($companies);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompaniesStoreUpdateRequest $request, string $id)
    {
        $companies = $this->service->update(
            UpdateCompaniesDTO::makeFromRequest($request)
        );

        if (!$companies) {
            return response()->json([
                'error' => 'Not found'
            ], Response::HTTP_NOT_FOUND);
        }

        return new CompaniesResource($companies);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!$this->service->findOne($id)) {
            return response()->json([
                'error' => 'Not found'
            ], Response::HTTP_NOT_FOUND);
        }

        $this->service->delete($id);

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
