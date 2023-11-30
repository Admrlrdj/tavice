<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelKategori;
use App\Models\ModelMenu;

class Menu extends BaseController
{
    public function __construct()
    {
        $this->ModelMenu = new ModelMenu();
        $this->ModelKategori = new ModelKategori();
    }

    public function index()
    {
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Menu',
            'title' => 'Menu',
            'menu' => 'masterdata',
            'submenu' => 'menu',
            'page' => 'user/v_menu',
            'produk' => $this->ModelMenu->AllData(),
            'kategori' => $this->ModelKategori->AllData(),
        ];
        return view('user/v_template', $data);
    }

    public function InsertData()
    {
        $harga = str_replace(",", "", $this->request->getPost('harga'));
        $data = [
            'nama_menu' => $this->request->getPost('nama_menu'),
            'id_kategori' => $this->request->getPost('kategori'),
            'harga' => $harga,
        ];
        $this->ModelMenu->InsertData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!');
        return redirect()->to(base_url('Menu'));
    }

    public function UpdateData($id_menu)
    {
        $harga = str_replace(",", "", $this->request->getPost('harga'));
        $data = [
            'id_menu' => $id_menu,
            'nama_menu' => $this->request->getPost('nama_menu'),
            'id_kategori' => $this->request->getPost('kategori'),
            'harga' => $harga,
        ];
        $this->ModelMenu->UpdateData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah!!');
        return redirect()->to(base_url('Menu'));
    }

    public function DeleteData($id_menu)
    {
        $data = [
            'id_menu' => $id_menu,
        ];

        $this->ModelMenu->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!!');
        return redirect()->to('Menu');
    }
}
