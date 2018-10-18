<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Metode_bayar_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	
	public function all(){
      $hasil = $this->db->query("SELECT * FROM metode_bayar ORDER BY id_bayar");
        return $hasil->result();
    }

    public function tambah_metode($data_metode) {
        $data_metode = array(
          'id_bayar' => $this->input->post('id_bayar'),
          'nm_bayar' => $this->input->post('nm_bayar'),
          'an' => $this->input->post('an'),
          'norek' => $this->input->post('norek')
        );
        $this->db->insert('metode_bayar',$data_metode);
  	}

  	public function update($id_bayar,$data_metode){
        $this->db->where('id_bayar',$id_bayar)
                  ->update('metode_bayar',$data_metode);
    }

     public function find($id) {
      $hasil = $this->db->where('id_bayar',$id)
                        ->limit(1)
                        ->get('metode_bayar');
      if($hasil->num_rows()>0){
        return $hasil->row();
      }else {
        return array();
      }
    }

  	 public function kodeoto(){
      $this->db->select('RIGHT(metode_bayar.id_bayar,3) as kode',FALSE);
      $this->db->order_by('id_bayar','DESC');
      $this->db->limit(1);

      $query=$this->db->get('metode_bayar');

      if($query->num_rows()<>0) {
        $data = $query->row();
        $kode = intval($data->kode)+1;
      }else {
        $kode = 1;
      }
      $kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
      $kodejadi = "MP".$kodemax;
      return $kodejadi;
    }

}

/* End of file Metode_bayar_model.php */
/* Location: ./application/models/admin/Metode_bayar_model.php */