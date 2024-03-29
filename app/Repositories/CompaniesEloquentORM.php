<?php

namespace App\Repositories;

use App\DTO\Companies\CreateCompaniesDTO;
use App\DTO\Companies\UpdateCompaniesDTO;
use App\Models\Companies;
use App\Repositories\CompaniesRepositoriesInterface;
use App\Repositories\Interfaces\PaginationInterface;
use stdClass;

class CompaniesEloquentORM implements CompaniesRepositoriesInterface
{
    public function __construct(protected Companies $model)
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
        $company = $this->model->with('sectors')->find($id);

        if (!$company) return null;

        return (object) $company->toArray();
    }
    
    public function delete(string $id): bool
    {
        return $this->model->findOrFail($id)->delete();
    }
    public function create(CreateCompaniesDTO $dto): stdClass
    {
        $companies = $this->model->create(
            (array) $dto
        );

        return (object) $companies->toArray();
    }
    public function update(UpdateCompaniesDTO $dto): stdClass|null
    {
        if (!$companies = $this->model->find($dto->id)) {
            return null;
        }

        $companies->update((array) $dto);

        return (object) $companies->toArray();
    }
}
