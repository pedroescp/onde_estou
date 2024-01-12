<?php

namespace App\DTO\Companies;

use App\Http\Requests\CompaniesStoreUpdateRequest;

class CreateCompaniesDTO
{
    public function __construct(
        public string $name,
        public string $status,
        public ?int $parent_id
    )
    {
        
    }

    public static function makeFromRequest(CompaniesStoreUpdateRequest $request): self
    {
        return new self(
            $request->name,
            'A',
            $request->parent_id
        );
    }


}