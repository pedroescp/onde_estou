<?php

namespace App\Repositories;

use App\DTO\CreateCompaniesDTO;
use App\DTO\UpdateCompaniesDTO;
use stdClass;

interface CompaniesRepositoriesInterface
{
    public function paginate(int $page = 1, int $totalPerpage = 10, string $filter = null): PaginationInterface;
    public function getAll(string $filter = null): array;
    public function findOne(string $id): stdClass|null;
    public function delete(string $id): bool;
    public function create(CreateCompaniesDTO $dto): stdClass;
    public function update(UpdateCompaniesDTO $dto): stdClass|null;
}
