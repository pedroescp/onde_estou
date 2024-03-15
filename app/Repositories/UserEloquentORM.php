<?php

namespace App\Repositories;

use App\DTO\User\CreateUserDTO;
use App\DTO\User\UpdateUserDTO;
use App\Models\User;
use App\Repositories\Interfaces\PaginationInterface;
use stdClass;

class UserEloquentORM implements UserRepositoriesInterface
{
    public function __construct(protected User $model)
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
    public function create(CreateUserDTO $dto): stdClass
    {
        $user = $this->model->create(
            (array) $dto
        );

        return (object) $user->toArray();
    }
    public function update(UpdateUserDTO $dto): stdClass|null
    {
        if (!$user = $this->model->find($dto->id)) {
            return null;
        }

        $user->update((array) $dto);

        return (object) $user->toArray();
    }
}
