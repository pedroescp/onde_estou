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
            totalPerpage: $request->get('per_page', 10),
            filter: $request->filter,
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

    public function show($id)
    {
        $user = User::find($id);
        $sectors = Sector::find($user->sector_origin);

        if (!$sectors) {
            $firstSector = Sector::orderBy('id')->first();

            if ($firstSector) {
                $user->sector_origin = $firstSector->id;
                $user->save();
                $sectors = $firstSector;
            }
        }

        return view('users/show', [
            'user' => $user,
            'sectors' => $sectors
        ]);
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


    public function sector(Request $request, $sector_id)
    {
        $sector_id = intval($sector_id);
        $user_id = intval($request->input('user_id'));

        $user = User::findOrFail($user_id);

        $user->sector_origin = $sector_id;
        $user->save();

        return redirect('/users');
    }
}
