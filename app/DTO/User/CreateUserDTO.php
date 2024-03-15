<?php

namespace App\DTO\User;

use App\Http\Requests\UserStoreUpdateRequest;

class CreateUserDTO
{
    public function __construct(
        public int $id,
        public string $name,
    )
    {
        
    }

    public static function makeFromRequest(UserStoreUpdateRequest $request): self
    {
        return new self(
            $request->id,
            $request->name,
        );
    }


}