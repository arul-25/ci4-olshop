<?php

namespace App\Entities;

use CodeIgniter\Entity;

class Transaksi extends Entity
{
    public function setOngkir($ongkir)
    {
        $ongkir = str_replace('.', '', $ongkir);
        $ongkir = str_replace('Rp ', '', $ongkir);
        $this->attributes['ongkir'] = (int) $ongkir;
    }

    public function setTotalHarga($total)
    {
        $total = str_replace('.', '', $total);
        $total = str_replace('Rp ', '', $total);
        $this->attributes['total_harga'] = (int) $total;
    }
}
