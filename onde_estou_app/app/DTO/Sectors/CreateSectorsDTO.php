<?php

namespace App\DTO\Companies;

use App\Enums\CompaniesStatus;
use App\Http\Requests\SectorStoreUpdateRequest;

class CreateSectorsDTO
{
    public function __construct(
        public string $name,
        public CompaniesStatus $status,
        public ?int $parent_id
    )
    {
        
    }

    public static function makeFromRequest(SectorStoreUpdateRequest $request): self
    {
        return new self(
            $request->name,
            CompaniesStatus::A,
            $request->parent_id
        );
    }


}