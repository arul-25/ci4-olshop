<?php

namespace App\Controllers;

use App\Models\TransaksiModel;

class Transaksi extends BaseController
{
    protected $barangModel;
    protected $transaksiModel;
    protected $rajaOngkir;

    public function __construct()
    {
        $this->transaksiModel = new TransaksiModel();
    }

    public function view()
    {
        $id = $this->request->uri->getSegment(3);

        $data['title'] = "Transaksi";
        $data['transaksi'] = $this->transaksiModel->join('barang', 'barang.id=transaksi.id_barang')->join('user', 'user.id=transaksi.id_pembeli')->where('transaksi.id', $id)->first();

        return view('transaksi/view', $data);
    }
}
