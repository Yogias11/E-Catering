<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bayar_model extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function all()
    {
        $hasil = $this->db->query("SELECT * FROM tbl_bayar ORDER BY id");
        return $hasil->result();
    }

    public function find($id)
    {
        $hasil = $this->db->where('id',$id)
                          ->limit(1)
                          ->get('tbl_bayar');
        if($hasil->num_rows()>0){
        return $hasil->row();
      }else{
        return array();
      }
    }

    public function update($id_bayar,$data_bayar)
    {
        $this->db->where('id_bayar',$id_bayar)
                 ->update('metode_bayar',$data_bayar);
    }

    public function delete($id_bayar)
    {
        $this->db->where('id_bayar',$id_bayar)
                 ->delete('metode_bayar');
    }

    public function upload($id,$id_user,$nama,$tanggal,$bukti)
    {
        $hasil = $this->db->query("INSERT INTO tbl_bayar(id,id_user,nama,tgl,bukti)
                                   VALUES('$id','$id_user','$nama','$tanggal','$bukti')");
        return $hasil;
    }

    public function get_logged_user_id()
    {
        $hasil = $this->db
                      ->select('id_user')
                      ->where('username', $this->session->userdata('username'))
                      ->limit(1)
                      ->get('user');

        if($hasil->num_rows() > 0){
          return $hasil->row()->id_user;
        }else{
          return 0;
      }
    }

    public function kodeoto(){
        $this->db->select('RIGHT(tbl_bayar.id,3) as kode',FALSE);
        $this->db->order_by('id','DESC');
        $this->db->limit(1);

        $query=$this->db->get('tbl_bayar');

        if($query->num_rows()<>0) {
            $data = $query->row();
            $kode = intval($data->kode)+1;
        }else{
            $kode = 1;
        }
            $kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
            $kodejadi = "KD".$kodemax;
            return $kodejadi;
    }

    public function get_bank()
    {
        $bank = $this->db->query("select * from metode_bayar");
        return $bank->result();

    }
  }
?>
