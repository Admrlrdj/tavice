<?php

namespace App\Controllers;

use App\Models\ModelUser;

class Profile extends BaseController
{
    public function __construct()
    {
        $this->ModelUser = new ModelUser();
    }

    public function index()
    {
        $data = [
            'judul' => 'Profile',
            'subjudul' => 'Profile',
            'title' => 'Profile',
            'menu' => 'profile',
            'submenu' => 'profile',
            'page' => 'pelanggan/profile/v_profile',
            'profile' => $this->ModelUser->AllData(),
        ];
        return view('pelanggan/v_template', $data);
    }

    public function User()
    {
        $data = [
            'judul' => 'Profile',
            'subjudul' => 'Profile',
            'title' => 'Profile',
            'menu' => 'profile',
            'submenu' => 'profile',
            'page' => 'user/v_profile',
            'profile' => $this->ModelUser->AllData(),
        ];
        return view('user/v_template', $data);
    }
}
