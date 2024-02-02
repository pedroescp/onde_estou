<?php

namespace App\Repositories;

use App\DTO\Companies\CreateSectorsDTO;
use App\DTO\Sectors\UpdateSectorsDTO;
use App\Models\Sector;
use App\Repositories\Interfaces\PaginationInterface;
use stdClass;

class SectorEloquentORM implements SectorsRepositoriesInterface
{
    public function __construct(protected Sector $model)
    {
    }
    public function paginate(int $page = 1, int $totalPerpage = 10, ?string $filter = null): PaginationInterface
    {
        $result = $this->model->where(
            function ($query) use ($filter) {
                if ($filter) {
                    $query->where('subject', $filter);
                    //$query->orWhere('body', 'like', "%{$filter}%");
                }
            }
        )
            ->paginate($totalPerpage, ['*'], 'page', $page);

        return new PaginationPresenter($result);
    }

    public function getAll(string $filter = null): array
    {
        return $this->model->where(
            function ($query) use ($filter) {
                if ($filter) {
                    $query->where('subject', $filter);
                    //$query->orWhere('body', 'like', "%{$filter}%");
                }
            }
        )
            ->get()
            ->toArray();
    }
    public function findOne(string $id): stdClass|null
    {
        $sectors = $this->model->find($id);

        if (!$sectors) return null;


        return (object) $sectors->toArray();
    }
    public function delete(string $id): bool
    {
        return $this->model->findOrFail($id)->delete();
    }
    public function create(CreateSectorsDTO $dto): stdClass
    {
        $sectors = $this->model->create(
            (array) $dto
        );

        return (object) $sectors->toArray();
    }
    public function update(UpdateSectorsDTO $dto): stdClass|null
    {
        if (!$sectors = $this->model->find($dto->id)) {
            return null;
        }

        $sectors->update((array) $dto);

        return (object) $sectors->toArray();
    }
}
