<?php

namespace Brigham\User\Repositories;

use User;

class UserRepository implements UserRepositoryInterface {
    public function create($user) {
        return User::create($user);
    }
}