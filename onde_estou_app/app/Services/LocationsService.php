<?php

namespace App\Services;

use App\Repositories\Interfaces\PaginationInterface;
use App\Repositories\LocationsRepositoriesInterface;
use stdClass;

class LocationsService
{
    public function __construct(protected LocationsRepositoriesInterface $repository)
    {
    }

    public function paginate(
        int $page = 1,
        int $totalPerpage = 10,
        ?string $filter = null
    ): PaginationInterface {
        return $this->repository->paginate(
            page: $page,
            totalPerpage: $totalPerpage,
            filter: $filter
        );
    }

    public function getAll(string $filter = null): array
    {
        return $this->repository->getAll($filter);
    }

    public function findOne(string $id): stdClass|null
    {
        return $this->repository->findOne($id);
    }

    public function delete(string $id): bool
    {
        return $this->repository->delete($id);
    }

    // public function create(CreateCompaniesDTO $dto): stdClass
    // {
    //     return $this->repository->create($dto);
    // }

    // public function update(UpdateCompaniesDTO $dto): stdClass | null
    // {
    //     return $this->repository->update($dto);
    // }
}
