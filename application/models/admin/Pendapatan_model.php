<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Pendapatan_Model extends CI_Model {

	public function pendapatan()
    {
        $hasil = $this->db->select('o.qty, o.harga, o.gambar, (o.qty * o.harga) as total, u.tgl, u.id, o.id_ivc')
                                    ->from('tbl_bayar u, tbl_pesanan o, invoices a')
                                    ->where('a.id = o.id_ivc')
                                    ->group_by('u.id')
                                    ->get();
        if($hasil->num_rows() > 0){
            return $hasil->result();
        } else {
            return false;
        }
    }

    public function c_pendapatan()
    {
        $hasil = $this->db->select('o.qty, o.harga, o.gambar, (o.qty * o.harga) as total, u.tgl, u.id')
                                    ->from('tbl_bayar u, tbl_pesanan o, invoices a')
                                    ->where('u.id_user = o.id_user')
                                    ->group_by('u.id')
                                    ->get();
        if($hasil->num_rows() > 0){
            return $hasil->result();
        } else {
            return false;
        }
    }

    public function view_row(){
    return $this->db->get('tbl_pesanan')->result();
  }
}