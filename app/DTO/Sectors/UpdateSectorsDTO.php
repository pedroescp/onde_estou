<?php

namespace App\DTO\Sectors;

use App\Enums\CompaniesStatus;
use App\Http\Requests\SectorStoreUpdateRequest;

class UpdateSectorsDTO
{
    public function __construct(
        public string $id,
        public string $name,
        public CompaniesStatus $status,
        public ?int $parent_id,
    ) {
    }

    public static function makeFromRequest(SectorStoreUpdateRequest $request): self
    {
        return new self(
            $request->id,
            $request->name,
            CompaniesStatus::A,
            $request->parent_id
        );
    }
}
