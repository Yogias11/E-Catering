<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran_model extends CI_Model {

	public function tampil()
	{
		$hasil = $this->db->select('i.*, o.tgl, u.id, a.username, i.id as bayar')
                                    ->from('tbl_bayar o, tbl_pesanan u, invoices i, user a')
									->where('i.id_user = a.id_user')
                                    ->where('i.id = u.id_ivc')
                                    ->group_by('u.id_ivc')
                                    //->group_by('kd_bayar')
                                    ->get();
        if($hasil->num_rows() > 0){
            return $hasil->result();
        } else {
            return false;
        }
	}

}