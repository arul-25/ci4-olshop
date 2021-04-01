<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\TransaksiModel;
use App\Models\UserModel;
use TCPDF;

// use vendor\tecnickcom\tcpdf\TCPDF;

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

    public function index()
    {
        $data['title'] = "Transaksi";
        $data['transaksi'] = $this->transaksiModel->findAll();
        return view('transaksi/index', $data);
    }

    public function invoice()
    {
        $id = $this->request->uri->getSegment(3);

        $data['transaksi'] = $this->transaksiModel->find($id);

        $userModel = new UserModel();
        $data['pembeli'] = $userModel->find($data['transaksi']->id_pembeli);
        $barangModel = new BarangModel();
        $data['barang'] = $barangModel->find($data['transaksi']->id_barang);

        $html = view('transaksi/invoice', $data);

        $pdf = new TCPDF('P', PDF_UNIT, 'A5', true, 'UTF-8', false);

        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Arul');
        $pdf->SetTitle('Invoice');
        $pdf->SetSubject('Invoice');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->addPage();

        $pdf->writeHTML($html, true, false, true, false, '');

        $this->response->setContentType('application/pdf');
        $pdf->Output('invoice.pdf', 'I');
    }
}
