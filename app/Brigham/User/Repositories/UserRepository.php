<?php

namespace Brigham\User\Repositories;

use Illuminate\Support\Facades\Hash;
use User;

class UserRepository implements UserRepositoryInterface {
    public function create($user) {
        $user['password'] = Hash::make($user['password']);
        return User::create($user);
    }
}