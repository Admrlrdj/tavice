<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKategori extends Model
{
    public function AllData()
    {
        return $this->db->table('kategori')->get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('kategori')->insert($data);
    }

    public function UpdateData($data)
    {
        $this->db->table('kategori')->where('id_kategori', $data['id_kategori'])->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('kategori')->where('id_kategori', $data['id_kategori'])->delete($data);
    }
}
