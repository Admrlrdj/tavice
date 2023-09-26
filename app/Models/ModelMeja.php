<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMeja extends Model
{
    public function AllData()
    {
        return $this->db->table('meja')->get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('meja')->insert($data);
    }

    public function UpdateData($data)
    {
        $this->db->table('meja')->where('id_meja', $data['id_meja'])->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('meja')->where('id_meja', $data['id_meja'])->delete($data);
    }
}
