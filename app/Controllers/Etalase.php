<?php

namespace App\Controllers;

use App\Entities\Transaksi;
use App\Libraries\RajaOngkir;
use App\Libraries\UtilityLib;
use App\Models\BarangModel;
use App\Models\TransaksiModel;

class Etalase extends BaseController
{
    protected $barangModel;
    protected $transaksiModel;
    protected $rajaOngkir;

    public function __construct()
    {
        $this->barangModel = new BarangModel();
        $this->rajaOngkir = new RajaOngkir();
        $this->transaksiModel = new TransaksiModel();
    }

    public function index()
    {
        $data['title'] = "Etalase Barang";
        $data['barang'] = $this->barangModel->findAll();
        return view('etalase/index', $data);
    }

    public function beli()
    {
        if ($this->request->getPost()) {

            if (!$this->validate('transaksi')) {
                goto view;
            } else {
                $post = $this->request->getPost();
                $transaksi = new Transaksi();

                $transaksi->fill($post);
                $transaksi->status = 0;
                $transaksi->created_by = session()->get('id');
                $transaksi->created_date = date("Y-m-d H:i:s");

                $id = $this->transaksiModel->SaveBarang($transaksi, $post['id_barang'], $post['jumlah']);

                if ($id > 0) {
                    return redirect()->to(site_url() . 'transaksi/view/' . $id);
                } else {
                    $lib = new UtilityLib();
                    $lib->pesan("<s>Pembelian Gagal</s>", 'danger');
                    return redirect()->to(site_url('/'));
                }
            }
        } else {
            view:

            $id = $this->request->uri->getSegment(3);

            $data['validation'] = \Config\Services::validation();
            $data['title'] = "Beli Barang";
            $data['barang'] = $this->barangModel->find($id);
            $data['provinsi'] = json_decode($this->rajaOngkir->getOngkir('province'))->rajaongkir->results;
            return view('etalase/beli', $data);
        }
    }

    public function getCost()
    {
        if ($this->request->getMethod() == "post") {
            $post = $this->request->getJson();
            $origin = $post->origin;
            $destination = $post->destination;
            $weight = $post->weight;
            $courier = $post->courier;
            $data = $this->rajaOngkir->getOngkos($origin, $destination, $weight, $courier);
            return $this->response->setJSON($data);
        }
    }

    public function getCity()
    {
        if ($this->request->getMethod() == "get") {
            $id_province = $this->request->uri->getSegment(3);
            $data = $this->rajaOngkir->getOngkir('city', $id_province);
            return $this->response->setJSON($data);
        }
    }
}
