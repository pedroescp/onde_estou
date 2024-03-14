<?php

namespace App\Repositories;

use App\DTO\Sectors\CreateSectorsDTO;
use App\DTO\Sectors\UpdateSectorsDTO;
use App\Repositories\Interfaces\PaginationInterface;
use stdClass;

interface SectorsRepositoriesInterface
{
    public function paginate(int $page = 1, int $totalPerpage = 10, string $filter = null): PaginationInterface;
    public function getAll(string $filter = null): array;
    public function findOne(string $id): stdClass|null;
    public function delete(string $id): bool;
    public function create(CreateSectorsDTO $dto): stdClass;
    public function update(UpdateSectorsDTO $dto): stdClass|null;
}
