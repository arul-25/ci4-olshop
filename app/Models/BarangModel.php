<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table      = 'barang';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'App\Entities\Barang';

    protected $allowedFields = ['nama', 'harga', 'stock', 'gambar', 'created_by', 'created_date', 'updated_by', 'updated_date'];

    protected $useTimestamps = false;

    public function SaveBarang($data)
    {
        $this->save($data);

        return $this->affectedRows() > 0 ? $this->getInsertID() : false;
    }
}
