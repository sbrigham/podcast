<?php

namespace Brigham\User\Services;

use Brigham\User\Repositories\UserRepository;

class UserService {
    private $user_repo;
    public function __construct(UserRepository $user_repo) {
        $this->user_repo = $user_repo;
    }

    public function make($user) {
        $user = $this->user_repo->create($user);


        // send email and do whatever else


        //


        return $user;
    }
} 