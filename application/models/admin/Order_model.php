<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model {

    public function __construct(){
      parent::__construct();
    }

    public function all(){
      $hasil = $this->db->select('o.*, (o.qty * o.harga) as total, u.username')
                        ->from('user u, tbl_pesanan o')
                        ->where('u.id_user = o.id_user')
                        ->get();
    if($hasil->num_rows() > 0){
      return $hasil->result();
    } else {
      return false;
    }
  }

    public function find($id_produk) {
      $hasil = $this->db->where('id',$id_produk)
                        ->limit(1)
                        ->get('tbl_pesanan');
      if($hasil->num_rows()>0){
        return $hasil->row();
      }else {
        return array();
      }
    }

    public function upload($id,$order_id,$qty,$harga,$gambar){
    $hasil=$this->db->query("INSERT INTO tbl_detail_order(id,order_id,qty,harga,gambar) 
      VALUES ('$id','$order_id','$qty','$harga','$gambar')");
    return $hasil;
    }


    public function update($id,$data_order){
        $this->db->where('id',$id)
                  ->update('tbl_detail_order',$data_order);
    }

    public function delete($id){
        $this->db->where('id',$id)
                  ->delete('tbl_detail_order');
    }

    public function kodeoto(){
      $this->db->select('RIGHT(tbl_detail_order.id,3) as kode',FALSE);
      $this->db->order_by('id','DESC');
      $this->db->limit(1);

      $query=$this->db->get('tbl_detail_order');

      if($query->num_rows()<>0) {
        $data = $query->row();
        $kode = intval($data->kode)+1;
      }else {
        $kode = 1;
      }
      $kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
      $kodejadi = "BR".$kodemax;
      return $kodejadi;
    }
}
?>
