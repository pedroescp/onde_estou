<?php

namespace App\DTO\Locations;

use App\Http\Requests\LocationsStoreUpdateRequest;

class CreateLocationsDTO
{
    public function __construct(
        public int $sector_id,
        public int $user_id,
        public int $company_id,
    )
    {
        
    }

    public static function makeFromRequest(LocationsStoreUpdateRequest $request): self
    {
        return new self(
            $request->sector_id,
            $request->company_id,
            $request->user_id,
        );
    }
}
