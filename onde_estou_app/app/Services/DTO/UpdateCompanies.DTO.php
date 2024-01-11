<?php

namespace App\DTO;

use App\Http\Requests\CompaniesStoreUpdateRequest;

class UpdateCompaniesDTO
{
    public function __construct(
        public string $id,
        public string $name,
        public string $parent_id
    ) {
    }

    public static function makeFromRequest(CompaniesStoreUpdateRequest $request): self
    {
        return new self(
            $request->id,
            $request->name,
            $request->parent_id
        );
    }
}
