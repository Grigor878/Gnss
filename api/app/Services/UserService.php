<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    /**
     * userRepository
     *
     * @var mixed
     */
    private $userRepository;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (
        UserRepository $userRepository
    ) {
        $this->userRepository = $userRepository;
    }

    /**
     * create
     *
     * @param  mixed $data
     * @return void
     */
    public function create ($data)
    {
        return $this->userRepository->create($data);
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
        return $this->userRepository->update($user, $data);
    }

    /**
     * delete
     *
     * @param  mixed $user
     * @return void
     */
    public function delete($user)
    {
        return $this->userRepository->delete($user);
    }
}
