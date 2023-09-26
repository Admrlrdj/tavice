<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUser extends Model
{
    public function AllData()
    {
        return $this->db->table('user')->get()->getResultArray();
    }

    public function InsertData($data)
    {
        return $this->db->table('user')->insert($data);
    }

    public function UpdateData($data)
    {
        return $this->db->table('user')->where('id_user', $data['id_user'])->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('user')->where('id_user', $data['id_user'])->delete($data);
    }

    public function LoginUser($username, $password)
    {
        return $this->db->table('user')->where([
            'username' => $username,
            'password' => $password,
        ])->get()->getRowArray();
    }
}
