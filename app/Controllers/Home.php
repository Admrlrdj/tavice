<?php

namespace App\Controllers;

use App\Models\ModelPelanggan;
use App\Models\ModelUser;

class Home extends BaseController
{
    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->ModelPelanggan = new ModelPelanggan();
    }

    public function index()
    {
        return view('welcome_message');
    }

    public function Login()
    {
        return view('v_login');
    }

    public function CekLogin()
    {
        if ($this->validate([
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Masih Kosong!!'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Masih Kosong!!'
                ]
            ],
        ])) {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $ceklogin = $this->ModelUser->LoginUser($username, $password);
            $ceklogin_pelanggan = $this->ModelPelanggan->LoginPelanggan($username, $password);
            if ($ceklogin) {
                session()->set('id_user', $ceklogin['id_user']);
                session()->set('nama_user', $ceklogin['nama_user']);
                session()->set('username', $ceklogin['username']);
                session()->set('password', $ceklogin['password']);
                session()->set('level', $ceklogin['level']);
                if ($ceklogin['level'] == 'admin') {
                    return redirect()->to(base_url('Profile/User'));
                } elseif ($ceklogin['level'] == 'kasir') {
                    return redirect()->to(base_url('Profile/User'));
                } elseif ($ceklogin['level'] == 'owner') {
                    return redirect()->to(base_url('Profile/User'));
                } elseif ($ceklogin['level'] == 'waiter') {
                    return redirect()->to(base_url('Profile/User'));
                }
            } elseif ($ceklogin_pelanggan) {
                session()->set('id_pelanggan', $ceklogin_pelanggan['id_pelanggan']);
                session()->set('nama_pelanggan', $ceklogin_pelanggan['nama_pelanggan']);
                session()->set('username', $ceklogin_pelanggan['username']);
                session()->set('password', $ceklogin_pelanggan['password']);
                session()->set('jenis_kelamin', $ceklogin_pelanggan['jenis_kelamin']);
                session()->set('no_hp', $ceklogin_pelanggan['no_hp']);
                session()->set('alamat', $ceklogin_pelanggan['alamat']);
                return redirect()->to(base_url('Profile'));
            } else {
                session()->setFlashdata('gagal', 'Username atau Password Salah!!');
                return redirect()->to(base_url('Home/Login'));
            }
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Home/Login'))->withInput('validation', \Config\Services::validation());
        }
    }

    public function Register()
    {
        return view('v_register');
    }

    public function SaveRegister()
    {
        if ($this->validate([
            'nama_pelanggan' => [
                'label' => 'Nama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!!'
                ]
            ],
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!!'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!!'
                ]
            ],
            'repassword' => [
                'label' => 'Retype Password',
                'rules' => 'required|matches[password]',
                'errors' => [
                    'required' => '{field} Wajid Diisi!!',
                    'matches' => '{field} Tidak Sama dengan Password!!'
                ]
            ],
            'no_hp' => [
                'label' => 'No. Handphone',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!!'
                ]
            ],
            'alamat' => [
                'label' => 'Alamat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi!!'
                ]
            ],
        ])) {
            $data = [
                'nama_pelanggan' => $this->request->getPost('nama_pelanggan'),
                'username' => $this->request->getPost('username'),
                'password' => $this->request->getPost('password'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'no_hp' => $this->request->getPost('no_hp'),
                'alamat' => $this->request->getPost('alamat')
            ];

            $this->ModelUser->SaveRegister($data);
            session()->setFlashdata('pesan', 'Registrasi Berhasil');
            return redirect()->to(base_url('Home/Login'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('Home/Register'));
        }
    }

    public function Logout()
    {
        session()->remove('id_user');
        session()->remove('id_pelanggan');
        session()->setFlashdata('pesan', 'Berhasil Logout');
        return redirect()->to(base_url('Home/Login'));
    }
}
