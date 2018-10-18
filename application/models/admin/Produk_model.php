<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model {

    public function __construct(){
      parent::__construct();
    }

    public function all(){
      $hasil = $this->db->query("SELECT * FROM tbl_produk ORDER BY id_produk");
        return $hasil->result();
    }

    public function find($id_produk) {
      $hasil = $this->db->where('id_produk',$id_produk)
                        ->limit(1)
                        ->get('tbl_produk');
      if($hasil->num_rows()>0){
        return $hasil->row();
      }else {
        return array();
      }
    }

    public function upload($id_produk,$nama_produk,$deskripsi,$harga,$gambar,$kategori)
    {
    $hasil=$this->db->query("INSERT INTO tbl_produk(id_produk,nama_produk,deskripsi,harga,gambar,kategori) 
      VALUES ('$id_produk','$nama_produk','$deskripsi','$harga','$gambar','$kategori')");
    return $hasil;
    }

    public function img_update($nama_produk,$deskripsi,$harga,$gambar,$kategori,$id_produk){
      $data= array(
        'nama_produk'     => $nama_produk,
        'deskripsi'       => $deskripsi,
        'harga'           => $harga,
        'gambar'          => $gambar,
        'kategori'        => $kategori
        );
      $this->db->where('id_produk',$id_produk);
      return $this->db->update('tbl_produk',$data);
    }

    public function update($id_produk, $data_produk){
    //Query UPDATE FROM ... WHERE id=...
    $this->db->where('id_produk', $id_produk)
         ->update('tbl_produk', $data_produk);
    }

    public function delete($id_produk){
        $this->db->where('id_produk',$id_produk)
                  ->delete('tbl_produk');
    }

    public function kodeoto(){
      $this->db->select('RIGHT(tbl_produk.id_produk,3) as kode',FALSE);
      $this->db->order_by('id_produk','DESC');
      $this->db->limit(1);

      $query=$this->db->get('tbl_produk');

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

    public function get_kategori()
    {
      $coba = $this->db->query("SELECT * FROM tbl_kategori");
      return $coba->result();
    }
}
?>
