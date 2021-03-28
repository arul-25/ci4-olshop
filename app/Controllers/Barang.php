<?php

namespace App\Controllers;

use App\Entities\Barang as EntitiesBarang;
use App\Models\BarangModel;

class Barang extends BaseController
{

    protected $BarangModel;

    public function __construct()
    {
        $this->BarangModel = new BarangModel();
    }

    public function index()
    {
        $data['title'] = "Daftar Barang";
        $data['barang'] = $this->BarangModel->findAll();
        return view('barang/index', $data);
    }

    public function view($id)
    {
        $data['title'] = "Data Barang";
        $data['barang'] = $this->BarangModel->find($id);
        return view('barang/view', $data);
    }

    public function create()
    {
        if ($this->request->getPost()) {

            $data = $this->request->getPost();

            if (!$this->validate('barang')) {
                goto view;
            } else {
                $barang = new EntitiesBarang();
                $barang->fill($data);
                $barang->gambar = $this->request->getFile('gambar');

                $barang->created_by = session()->get('id');
                $barang->created_date = date("Y-m-d H:i:s");

                $id = $this->BarangModel->SaveBarang($barang);

                $segments = ['barang', 'view', $id];

                return redirect()->to(site_url($segments));
            }
        } else {
            view:
            $data['validation'] = \Config\Services::validation();
            $data['title'] = "Tambah Barang";
            return view('barang/create', $data);
        }
    }

    public function update($id)
    {

        if ($this->request->getPost()) {

            $data = $this->request->getPost();

            $validation = \Config\Services::validation();
            $rule = $validation->getRuleGroup('barang');

            $gambar = $this->request->getFile('gambar');

            if ($gambar->getError() == 4) {
                unset($rule['gambar']);
            }

            if (!$this->validate($rule)) {
                goto view;
            } else {
                $barang = new EntitiesBarang();
                $barang->id = $id;

                if (!$gambar->getError() == 4) {
                    $barang->gambar = $gambar;
                    unlink('uploads/' . $data['gambarLama']);
                }
                $barang->fill($data);

                $barang->updated_by = session()->get('id');

                $barang->updated_date = date("Y-m-d H:i:s");

                $this->BarangModel->save($barang);

                $segements = ['barang', 'view', $id];

                return redirect()->to(site_url($segements));
            }
        } else {

            view:
            $data['title'] = "Update Barang";
            $data['barang'] = $this->BarangModel->find($id);
            $data['validation'] = \Config\Services::validation();
            return view('barang/update', $data);
        }
    }

    public function delete()
    {
        $id = $this->request->getPost('id');
        $this->BarangModel->delete($id);
        return redirect()->to(site_url('barang/index'));
    }
}
