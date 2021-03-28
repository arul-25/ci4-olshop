<?php

namespace App\Validation;

use App\Models\UserModel;


class UserLogin
{
    public function validateUser(string $str, string $fields, array $data)
    {
        $model = new UserModel();
        $user = $model->where('username', $data['username'])->first();

        if (!$user) return false;

        $salt = $user->salt;

        return password_verify($salt . $data['password'], $user->password);
    }
}
