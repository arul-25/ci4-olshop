<?php

namespace App\Models;

use App\Entities\Barang;
use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table      = 'transaksi';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'App\Entities\transaksi';

    protected $allowedFields = ['id_barang', 'id_pembeli', 'jumlah', 'total_harga', 'alamat', 'ongkir', 'status', 'created_by', 'created_date', 'updated_by', 'updated_date'];

    protected $useTimestamps = false;

    public function SaveBarang($data, $id_barang, $jumlah)
    {

        $this->db->transBegin();
        $barang = $this->db->query("SELECT * FROM barang WHERE id = $id_barang FOR UPDATE")->getRowArray();
        if (!$barang['stock'] > $jumlah) {
            $this->db->transRollback();
            return false;
        }

        $this->save($data);
        $id_transaksi = $this->getInsertID();
        $stockUpdate =  $barang['stock'] - $jumlah;

        $barang['stock'] = $stockUpdate;
        unset($barang['gambar']);
        $barangEntities = new Barang($barang);
        $barangModel = new BarangModel();

        $barangModel->SaveBarang($barangEntities);

        if ($this->db->transStatus() === FALSE) {
            $this->db->transRollback();
            return FALSE;
        } else {
            $this->db->transCommit();
        }
        return $id_transaksi;
    }
}
