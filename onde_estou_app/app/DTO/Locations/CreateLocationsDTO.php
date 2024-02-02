<?php

namespace App\DTO\Locations;

use App\Http\Requests\LocationsStoreUpdateRequest;

class CreateLocationsDTO
{
    public function __construct(
        public int $id,
        public int $user_id,
        public int $company_id,
        public int $sector_id,
        public ?int $return_forecast,
    )
    {
        
    }

    public static function makeFromRequest(LocationsStoreUpdateRequest $request): self
    {
        return new self(
            $request->id,
            $request->user_id,
            $request->company_id,
            $request->sector_id,
            $request->return_forecast,
                
        );
    }


}