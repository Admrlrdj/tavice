<?php

namespace App\Controllers;

use App\Models\ModelMeja;
use App\Models\ModelMenu;
use App\Models\ModelPesanan;

class Pesanan extends BaseController
{
    public function __construct()
    {
        $this->ModelPesanan = new ModelPesanan();
        $this->ModelMenu = new ModelMenu();
        $this->ModelMeja = new ModelMeja();
    }

    public function index()
    {
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Pesanan',
            'title' => 'Pesanan',
            'menu' => 'masterdata',
            'submenu' => 'pesanan',
            'page' => 'user/waiter/v_pesanan',
            'pesanan' => $this->ModelPesanan->AllData(),
            'produk' => $this->ModelMenu->AllData(),
            'meja' => $this->ModelMeja->AllData(),
        ];
        return view('user/v_template', $data);
    }

    public function Pelanggan()
    {
        $id_pelanggan = session()->get('id_pelanggan');
        $data = [
            'judul' => 'Pesanan',
            'subjudul' => 'Pesanan',
            'title' => 'Pesanan',
            'menu' => 'pesanan',
            'submenu' => 'pesanan',
            'page' => 'pelanggan/v_pesanan',
            'pesananPelanggan' => $this->ModelPesanan->AllDataPelanggan($id_pelanggan),
            'produk' => $this->ModelMenu->AllData(),
            'meja' => $this->ModelMeja->AllData(),
        ];
        return view('pelanggan/v_template', $data);
    }

    public function InsertData()
    {
        $data = [
            'id_pelanggan' => $this->request->getPost('id_pelanggan'),
            'id_menu' => $this->request->getPost('id_menu'),
            'id_meja' => $this->request->getPost('id_meja'),
            'jumlah' => $this->request->getPost('jumlah'),
        ];
        $this->ModelPesanan->InsertData($data);
        session()->setFlashdata('pesan', 'Upload Laporan Berhasil');
        return redirect()->to(base_url('Pesanan/Pelanggan'));
    }

    public function ApplyData($id_pesanan)
    {
        $data = [
            'id_pesanan' => $id_pesanan,
            'id_pelanggan' => $this->request->getPost('id_pelanggan'),
            'id_menu' => $this->request->getPost('id_menu'),
            'id_meja' => $this->request->getPost('id_meja'),
            'jumlah' => $this->request->getPost('jumlah'),
            'id_user' => $this->request->getPost('id_user'),
            'total' => $this->request->getPost('total'),
        ];
        $this->ModelPesanan->UpdateData($data);
        session()->setFlashdata('pesan', 'Upload Laporan Berhasil');
        return redirect()->to(base_url('Pesanan'));
    }
}
