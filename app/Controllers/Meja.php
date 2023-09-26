<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelMeja;

class Meja extends BaseController
{

    public function __construct()
    {
        $this->ModelMeja = new ModelMeja();
    }

    public function index()
    {
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Meja',
            'title' => 'Meja',
            'menu' => 'masterdata',
            'submenu' => 'meja',
            'page' => 'user/admin/v_meja',
            'meja' => $this->ModelMeja->AllData(),
        ];
        return view('user/v_template', $data);
    }

    public function InsertData()
    {
        $data = ['nomor_meja' => $this->request->getPost('nomor_meja')];

        $this->ModelMeja->InsertData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!!');
        return redirect()->to('Meja');
    }

    public function UpdateData($id_meja)
    {
        $data = [
            'id_meja' => $id_meja,
            'nomor_meja' => $this->request->getPost('nomor_meja')
        ];

        $this->ModelMeja->UpdateData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah!!');
        return redirect()->to('Meja');
    }

    public function DeleteData($id_meja)
    {
        $data = [
            'id_meja' => $id_meja,
        ];

        $this->ModelMeja->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!!');
        return redirect()->to('Meja');
    }
}
