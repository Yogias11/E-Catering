<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {

    public function __construct(){
      parent::__construct();
    }

    public function all(){
      $hasil = $this->db->query("SELECT * FROM tbl_kategori ORDER BY id");
        return $hasil->result();
    }

    public function findkategori($id) {
      $hasil = $this->db->where('id',$id)
                        ->limit(1)
                        ->get('tbl_kategori');
      if($hasil->num_rows()>0){
        return $hasil->row();
      }else {
        return array();
      }
    }

    public function tambah_kategori($data_kategori) {
        $data_kategori = array(
          'id' => $this->input->post('id'),
          'nama_kategori' => $this->input->post('nama_kategori') 
        );
        $this->db->insert('tbl_kategori',$data_kategori);
  	}
    public function upload($id,$nama_kategori){
    $hasil=$this->db->query("INSERT INTO tbl_kategori(id,nama_kategori) 
      VALUES ('$id','$nama_kategori')");
    return $hasil;
    }
    public function update_kategori($id,$data_kategori){
        $this->db->where('id',$id)
                  ->update('tbl_kategori',$data_kategori);
  	}

    public function delete_kategori($id){
        $this->db->where('id',$id)
                  ->delete('tbl_kategori');
  	}

}
