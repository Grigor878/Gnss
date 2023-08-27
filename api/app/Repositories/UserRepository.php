<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\isNull;

class UserRepository
{
    /**
     * create
     *
     * @param  mixed $data
     * @return void
     */
    public function create($data)
    {
        DB::beginTransaction();

        $user = User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'role_id' => $data['role_id'],
            'username' => $data['username'],
            'password' => Hash::make($data['password'])
        ]);

        DB::commit();

        return $user;
    }

    /**
     * update
     *
     * @param  mixed $user
     * @param  mixed $data
     * @return void
     */
    public function update($user, $data)
    {
        DB::beginTransaction();

        $user->update([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'role_id' => $data['role_id'],
            'username' => $data['username'],
        ]);

        if (!isNull($data['password']) ) {
            $user->update([
                'password' => Hash::make($data['password'])
            ]);
        }

        DB::commit();

        return $user;
    }

    /**
     * delete
     *
     * @param  mixed $user
     * @return void
     */
    public function delete($user)
    {
        DB::beginTransaction();

        $user->delete();

        DB::commit();

        return $user;
    }
}
