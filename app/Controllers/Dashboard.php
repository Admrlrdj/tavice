<?php

namespace App\Controllers;

use App\Models\ModelKategori;
use App\Models\ModelMeja;
use App\Models\ModelMenu;
use App\Models\ModelPelanggan;
use App\Models\ModelPesanan;
use App\Models\ModelTransaksi;
use App\Models\ModelUser;

class Dashboard extends BaseController
{
    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        $this->ModelPesanan = new ModelPesanan();
        $this->ModelMenu = new ModelMenu();
        $this->ModelTransaksi = new ModelTransaksi();
        $this->ModelKategori = new ModelKategori();
        $this->ModelPelanggan = new ModelPelanggan();
        $this->ModelMeja = new ModelMeja();
    }

    public function index()
    {
        $data = [
            'judul' => 'Dashboard',
            'subjudul' => '',
            'title' => 'Dashboard',
            'menu' => 'dashboard',
            'submenu' => '',
            'page' => 'user/v_admin',
            'usertotal' => $this->ModelUser->AllData(),
            'pelanggantotal' => $this->ModelPelanggan->AllData(),
            'pesanantotal' => $this->ModelPesanan->AllData(),
            'menutotal' => $this->ModelMenu->AllData(),
            'transaksitotal' => $this->ModelTransaksi->AllData(),
            'kategoritotal' => $this->ModelKategori->AllData(),
            'mejatotal' => $this->ModelMeja->AllData(),
        ];
        return view('user/v_template', $data);
    }
}
