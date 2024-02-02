<?php

namespace App\Services;

use App\DTO\Companies\CreateSectorsDTO;
use App\DTO\Sectors\UpdateSectorsDTO;
use App\Repositories\Interfaces\PaginationInterface;
use App\Repositories\SectorsRepositoriesInterface;
use stdClass;

class SectorsService
{
    public function __construct(protected SectorsRepositoriesInterface $repository)
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

    public function create(CreateSectorsDTO $dto): stdClass
    {
        return $this->repository->create($dto);
    }

    public function update(UpdateSectorsDTO $dto): stdClass | null
    {
        return $this->repository->update($dto);
    }
}
