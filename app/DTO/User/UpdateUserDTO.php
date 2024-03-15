<?php

namespace App\DTO\User;

use App\Enums\UserStatus;
use App\Http\Requests\UserStoreUpdateRequest;

class UpdateUserDTO
{
    public function __construct(
        public string $id,
        public string $name,
        public ?int $parent_id,
    ) {
    }

    public static function makeFromRequest(UserStoreUpdateRequest $request): self
    {
        return new self(
            $request->id,
            $request->name,
            $request->parent_id
        );
    }
}
