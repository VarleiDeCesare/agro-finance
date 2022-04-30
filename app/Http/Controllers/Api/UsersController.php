<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\QueryBuilder\QueryBuilder;

//---------------------------Controlador de usuários------------------
class UsersController extends Controller {

    public function index() {
        return QueryBuilder::for(User::class)
            ->orderBy('name', 'ASC')
            ->select(['users.name', 'users.surname', 'users.username', 'users.email', 'users.document'])
            ->allowedFilters([
                'name',
                'username',
            ])
            ->paginate(request()->get('per_page'))
            ->appends(request()->query());
    }

    public function store(UserRequest $request) {
        $data = $request->all();
        $request->validated();

        $data['password'] = Hash::make($data['password']);
        return User::create($data);
    }

    public function update(UserRequest $request, User $user) {
        $request->validated();
        $user->update($request->all());
        return $user;
    }

    public function destroy($id) {
        $user = User::findOrFail($id);
        $user->delete();
        return \response('', 200);
    }
}
