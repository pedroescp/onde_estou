<?php

namespace App\Http\Controllers;

use App\DTO\User\CreateUserDTO;
use App\DTO\User\UpdateUserDTO;
use App\Http\Requests\UserStoreUpdateRequest;
use App\Models\Sector;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(protected UserService $service)
    {
    }

    public function index(Request $request)
    {
        $users = $this->service->paginate(
            page: $request->get('page', 1),
            totalPerpage:$request->get('per_page', 10),
            filter:$request->filter,
        );

        $filters = ['filter' => $request->get('filter', '')];

        return view('users/index', compact('users', 'filters'));
    }

    public function create(Request $request)
    {
        return view('User/create');
    }

    public function store(UserStoreUpdateRequest $request)
    {
        $this->service->create(CreateUserDTO::makeFromRequest($request));

        return redirect('/User');
    }

    public function show(string|int $id, Request $request)
    {
        if (!$companie = $this->service->findOne($id)) return redirect()->back();

        //Arrumar isso depois 
        $sectors = Sector::where('company_id', $companie->id)->get();

        return view('/User/show', compact('companie', 'sectors'));
    }

    public function edit(User $companie, string|int $id)
    {
        if (!$companie = $this->service->findOne($id)) return redirect()->back();

        return view('/User/edit', compact('companie'));
    }

    public function update(UserStoreUpdateRequest $request)
    {
        $companie = $this->service->update(UpdateUserDTO::makeFromRequest($request));

        if (!$companie) return redirect()->back();

        return redirect()->route('User');
    }

    public function delete(string $id)
    {
        $this->service->delete($id);

        return redirect()->route('User');
    }
}
