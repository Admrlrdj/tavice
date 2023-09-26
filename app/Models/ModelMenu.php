<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMenu extends Model
{
    public function AllData()
    {
        return $this->db->table('menu')
            ->join('kategori', 'kategori.id_kategori=menu.id_kategori')
            ->get()
            ->getResultArray();
    }

    public function InsertData($data)
    {
        return $this->db->table('menu')->insert($data);
    }

    public function UpdateData($data)
    {
        return $this->db->table('menu')->where('id_menu', $data['id_menu'])->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('menu')->where('id_menu', $data['id_menu'])->delete($data);
    }
}
