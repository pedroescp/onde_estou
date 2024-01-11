<?php

namespace App\DTO;

use App\Http\Requests\CompaniesStoreUpdateRequest;

class CreateCompaniesDTO
{
    public function __construct(
        public string $name,
        public ?int $parent_id
    )
    {
        
    }

    public static function makeFromRequest(CompaniesStoreUpdateRequest $request): self
    {
        return new self(
            $request->name,
            $request->parent_id
        );
    }


}