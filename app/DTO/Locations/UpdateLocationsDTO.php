<?php

namespace App\DTO\Locations;

use App\Enums\CompaniesStatus;
use App\Http\Requests\LocationsStoreUpdateRequest;

class UpdateLocationsDTO
{
    public function __construct(
        public int $id,
        public int $sector_id,
        public int $user_id,
        public int $company_id,
    ) {
    }

    public static function makeFromRequest(LocationsStoreUpdateRequest $request): self
    {
        return new self(
            $request->id,
            $request->sector_id,
            $request->user_id,
            $request->company_id,
        );
    }
}
