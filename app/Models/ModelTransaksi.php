<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelTransaksi extends Model
{
    public function AllData()
    {
        return $this->db->table('transaksi')->get()->getResultArray();
    }
}
