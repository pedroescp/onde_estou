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
        return view('users/create');
    }

    public function store(UserStoreUpdateRequest $request)
    {
        $this->service->create(CreateUserDTO::makeFromRequest($request));

        return redirect('/users');
    }

    public function show(string|int $id, Request $request)
    {
        if (!$companie = $this->service->findOne($id)) return redirect()->back();

        $sectors = Sector::where('company_id', $companie->id)->get();

        $user = User::find($id);

        return view('users/show', compact('sectors', 'user'));
    }

    public function edit(User $user, string|int $id)
    {
        if (!$user = $this->service->findOne($id)) return redirect()->back();

        return view('users/edit', compact('user'));
    }

    public function update(UserStoreUpdateRequest $request)
    {
        
        $companie = $this->service->update(UpdateUserDTO::makeFromRequest($request));

        if (!$companie) return redirect()->back();

        return redirect()->route('users');
    }

    public function delete(string $id)
    {
        $this->service->delete($id);

        return redirect()->route('users');
    }
}
