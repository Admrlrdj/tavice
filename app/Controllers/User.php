<?php

namespace App\Controllers;

use App\Models\ModelPelanggan;
use App\Models\ModelUser;

class User extends BaseController
{
    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->ModelPelanggan = new ModelPelanggan();
    }

    public function index()
    {
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'User',
            'title' => 'User',
            'menu' => 'masterdata',
            'submenu' => '1',
            'page' => 'user/v_user',
            'user' => $this->ModelUser->AllData(),
            'pelanggan' => $this->ModelPelanggan->AllData(),
        ];
        return view('user/v_template', $data);
    }

    // User
    public function InsertData()
    {
        $data = [
            'nama_user' => $this->request->getPost('nama_user'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'level' => $this->request->getPost('level'),
        ];

        $this->ModelUser->InsertData($data);
        session()->setFlashdata('pesan-user', 'Data Berhasil Ditambahkan!!');
        return redirect()->to('User');
    }

    public function UpdateData($id_user)
    {
        $data = [
            'id_user' => $id_user,
            'nama_user' => $this->request->getPost('nama_user'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'level' => $this->request->getPost('level'),
        ];

        $this->ModelUser->UpdateData($data);
        session()->setFlashdata('pesan-user', 'Data Berhasil Diubah!!');
        return redirect()->to('User');
    }

    public function DeleteData($id_user)
    {
        $data = [
            'id_user' => $id_user,
        ];

        $this->ModelUser->DeleteData($data);
        session()->setFlashdata('pesan-user', 'Data Berhasil Dihapus!!');
        return redirect()->to('User');
    }

    // Pelanggan
    public function InsertDataPelanggan()
    {
        $data = [
            'nama_pelanggan' => $this->request->getPost('nama_pelanggan'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'no_hp' => $this->request->getPost('no_hp'),
            'alamat' => $this->request->getPost('alamat'),
        ];

        $this->ModelPelanggan->InsertData($data);
        session()->setFlashdata('pesan-pelanggan', 'Data Berhasil Ditambahkan!!');
        return redirect()->to('User');
    }

    public function UpdateDataPelanggan($id_pelanggan)
    {
        $data = [
            'id_pelanggan' => $id_pelanggan,
            'nama_pelanggan' => $this->request->getPost('nama_pelanggan'),
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'no_hp' => $this->request->getPost('no_hp'),
            'alamat' => $this->request->getPost('alamat'),
        ];

        $this->ModelPelanggan->UpdateData($data);
        session()->setFlashdata('pesan-pelanggan', 'Data Berhasil Diubah!!');
        return redirect()->to('User');
    }

    public function DeleteDataPelanggan($id_pelanggan)
    {
        $data = [
            'id_pelanggan' => $id_pelanggan,
        ];

        $this->ModelPelanggan->DeleteData($data);
        session()->setFlashdata('pesan-pelanggan', 'Data Berhasil Dihapus!!');
        return redirect()->to('User');
    }
}
