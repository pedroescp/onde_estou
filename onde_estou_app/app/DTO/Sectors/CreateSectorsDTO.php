<?php

namespace App\DTO\Sectors;

use App\Http\Requests\SectorStoreUpdateRequest;

class CreateSectorsDTO
{
    public function __construct(
        public string $name,
        public string $company_id,
    )
    {
        
    }

    public static function makeFromRequest(SectorStoreUpdateRequest $request): self
    {
        return new self(
            $request->name,
            $request->company_id
        );
    }


}