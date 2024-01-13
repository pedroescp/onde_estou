<?php

namespace App\Http\Controllers\Api;

use App\DTO\Companies\CreateCompaniesDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\CompaniesStoreUpdateRequest;
use App\Http\Resources\CompaniesResource;
use App\Services\CompaniesService;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    public function __construct(
        protected CompaniesService $service,
    ) {
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
