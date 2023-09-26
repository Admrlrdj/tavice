<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPesanan extends Model
{
    public function AllData()
    {
        $db = $this->db->table('pesanan');
        $db->select('pesanan.id_pesanan');
        $db->select('menu.id_menu');
        $db->select('pesanan.id_menu');
        $db->select('menu.nama_menu');
        $db->select('menu.harga');
        $db->select('pelanggan.id_pelanggan');
        $db->select('pesanan.id_pelanggan');
        $db->select('pelanggan.nama_pelanggan');
        $db->select('pelanggan.jenis_kelamin');
        $db->select('pelanggan.no_hp');
        $db->select('pelanggan.alamat');
        $db->select('pesanan.jumlah');
        $db->select('meja.id_meja');
        $db->select('pesanan.id_meja');
        $db->select('meja.nomor_meja');
        $db->select('user.id_user');
        $db->select('pesanan.id_user');
        $db->select('user.nama_user');
        $db->select('user.level');
        $db->select('transaksi.total');
        $db->select('pesanan.total');
        $db->join('menu', 'menu.id_menu=pesanan.id_menu', 'left');
        $db->join('pelanggan', 'pelanggan.id_pelanggan=pesanan.id_pelanggan', 'left');
        $db->join('meja', 'meja.id_meja=pesanan.id_meja', 'left');
        $db->join('user', 'user.id_user=pesanan.id_user', 'left');
        $db->join('transaksi', 'transaksi.total=pesanan.total', 'left');
        return $db->get()->getResultArray();
    }

    public function AllDataPelanggan($id_pelanggan)
    {
        $db = $this->db->table('pesanan');
        $db->select('pesanan.id_pesanan');
        $db->select('menu.id_menu');
        $db->select('pesanan.id_menu');
        $db->select('menu.nama_menu');
        $db->select('menu.harga');
        $db->select('pelanggan.id_pelanggan');
        $db->select('pesanan.id_pelanggan');
        $db->select('pelanggan.nama_pelanggan');
        $db->select('pelanggan.jenis_kelamin');
        $db->select('pelanggan.no_hp');
        $db->select('pelanggan.alamat');
        $db->select('pesanan.jumlah');
        $db->select('meja.id_meja');
        $db->select('pesanan.id_meja');
        $db->select('meja.nomor_meja');
        $db->select('user.id_user');
        $db->select('pesanan.id_user');
        $db->select('user.nama_user');
        $db->select('user.level');
        $db->join('menu', 'menu.id_menu=pesanan.id_menu', 'left');
        $db->join('pelanggan', 'pelanggan.id_pelanggan=pesanan.id_pelanggan', 'left');
        $db->join('meja', 'meja.id_meja=pesanan.id_meja', 'left');
        $db->join('user', 'user.id_user=pesanan.id_user', 'left');
        $db->where(['pesanan.id_pelanggan' => $id_pelanggan]);
        return $db->get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('pesanan')->insert($data);
    }
    public function UpdateData($data)
    {
        $this->db->table('pesanan')->where('id_pesanan', $data['id_pesanan'])->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('pesanan')->where('id_pesanan', $data['id_pesanan'])->delete($data);
    }
}
