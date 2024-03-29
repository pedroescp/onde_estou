<?php

namespace App\Repositories;

use App\DTO\Locations\CreateLocationsDTO;
use App\DTO\Locations\UpdateLocationsDTO;
use App\Repositories\Interfaces\PaginationInterface;
use stdClass;

interface LocationsRepositoriesInterface
{
    public function paginate(int $page = 1, int $totalPerpage = 10, string $filter = null): PaginationInterface;
    public function getAll(string $filter = null): array;
    public function findOne(string $id): stdClass|null;
    public function findByUser(string $id): stdClass|null;
    public function delete(string $id): bool;
    public function create(CreateLocationsDTO $dto): stdClass;
    public function update(UpdateLocationsDTO $dto): stdClass|null;
}
