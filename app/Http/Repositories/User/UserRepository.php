<?php

namespace App\Http\Repositories\User;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserRepository implements UserRepositoryInterface
{
    public function getUser(): Collection
    {
        return User::get()->toBase();
    }

    public function create(array $params): User
    {
        if (isset($params['image'])) {
            dd('here');
            $imageName = uniqid() . '.' . $params['image']->getClientOriginalExtension();

            $params['image']->move(public_path('storage/user'), $imageName);

            $params['image'] = $imageName;
        }
        $params['password'] = Hash::make($params['password']);
        $role = Role::where('id', $params['role_id'])->first();
        $user = User::create($params);
        return $user->assignRole($role);
    }

    public function findUser($id): User
    {
        return User::where('id', $id)->first();
    }

    public function update(array $params, $id)
    {
        if (isset($params['image'])) {
            $oldImage = User::where('id', $id)->first();
            $oldImage = $oldImage->image;

            if (!empty($oldImage)) {
                Storage::delete('public/user/' . $oldImage);
            }

            $imageName = uniqid() . '.' . $params['image']->getClientOriginalExtension();

            $params['image']->move(public_path('storage/user'), $imageName);

            $params['image'] = $imageName;
        }
        $params['password'] = Hash::make($params['password']);
        $user = User::find($id);
        return $user->update($params);
    }

    public function delete($id)
    {
        return User::where('id', $id)->delete();
    }

    public function changePassword(array $params)
    {
        return User::where('id', Auth::user()->id)->update(['password' => Hash::make($params['newPassword'])]);
    }
}
