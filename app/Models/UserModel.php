<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table      = 'user';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'App\Entities\User';

    protected $allowedFields = ['username', 'password', 'salt', 'avatar', 'role', 'crated_by', 'created_date', 'updated_by', 'updated_date'];

    protected $useTimestamps = false;

    public function SaveUser($data)
    {
        $this->save($data);

        return $this->getInsertID() > 0 ? $this->getInsertID() : false;
    }
}
