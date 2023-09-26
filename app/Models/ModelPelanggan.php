<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPelanggan extends Model
{
    public function AllData()
    {
        return $this->db->table('pelanggan')->get()->getResultArray();
    }

    public function InsertData($data)
    {
        return $this->db->table('pelanggan')->insert($data);
    }

    public function UpdateData($data)
    {
        return $this->db->table('pelanggan')->where('id_pelanggan', $data['id_pelanggan'])->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('pelanggan')->where('id_pelanggan', $data['id_pelanggan'])->delete($data);
    }

    public function SaveRegister($data)
    {
        return $this->db->table('pelanggan')->insert($data);
    }

    public function LoginPelanggan($username, $password)
    {
        return $this->db->table('pelanggan')->where([
            'username' => $username,
            'password' => $password,
        ])->get()->getRowArray();
    }
}
