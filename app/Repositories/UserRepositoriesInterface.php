<?php

namespace App\Repositories;

use App\DTO\User\CreateUserDTO;
use App\DTO\User\UpdateUserDTO;
use App\Repositories\Interfaces\PaginationInterface;
use stdClass;

interface UserRepositoriesInterface
{
    public function paginate(int $page = 1, int $totalPerpage = 10, string $filter = null): PaginationInterface;
    public function getAll(string $filter = null): array;
    public function findOne(string $id): stdClass|null;
    public function delete(string $id): bool;
    public function create(CreateUserDTO $dto): stdClass;
    public function update(UpdateUserDTO $dto): stdClass|null;
}
