<?php

namespace App\DTO\User;

use App\Enums\UserStatus;
use App\Http\Requests\UserStoreUpdateRequest;

class CreateUserDTO
{
    public function __construct(
        public string $name,
        public ?int $parent_id
    )
    {
        
    }

    public static function makeFromRequest(UserStoreUpdateRequest $request): self
    {
        return new self(
            $request->name,
            $request->parent_id
        );
    }


}