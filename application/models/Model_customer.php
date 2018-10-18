<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Model_customer extends CI_Model {

	public function history($user)
	{
		$hasil = $this->db->select('i.*, SUM(o.qty * o.harga) as total')
									->from('invoices i, user u, tbl_pesanan o')
									->where('u.username', $user)
									->where('u.id_user = i.id_user')
									->where('o.id_ivc = i.id')
									->group_by('o.id_ivc')
									->get();
		if($hasil->num_rows() > 0){
			return $hasil->result();
		} else {
			return false;
		}
	}

    public function buat_history($user)
    {
        $hasil = $this->db->select('a.date, o.qty, o.harga, o.gambar, a.id')
									->from('user u, tbl_pesanan o,invoices a')
                                    ->where('u.username', $user)
									->where('u.id_user = o.id_user')
									->where('o.id_ivc = a.id')
									->group_by('a.id')
                                    ->get();
        if($hasil->num_rows() > 0){
            return $hasil->result();
        } else {
            return false;
        }
    }

	public function all(){
      	$hasil = $this->db->query("SELECT * FROM invoices ORDER BY id");
        return $hasil->result();
    }

    public function buat_confirmasi($invoice_id, $amount)
    {
    	$ret = true;
    	$invoice = $this->db->where('id', $invoice_id)->limit(1)->get('invoices');

    	if($invoice->num_rows() == 0){
    		$ret && false;
    	}else{
			$this->db->where('id', $invoice_id)->update('invoices', array('status'=>'PAID'));
			
    	}
    	}
   	
    public function get_kategori_all()
	{
		$query = $this->db->get('tbl_kategori');
		return $query->result_array();
	}

	public function find($id_user) {
      $hasil = $this->db->where('id',$id_user)
                        ->limit(1)
                        ->get('invoices');
      if($hasil->num_rows()>0){
        return $hasil->row();
      }else {
        return array();
      }
    }

    public function get_bank($id_bayar)
    {
        $query = $this->db->get_where('metode_bayar', array('id_bayar' => $id_bayar));
		return $query->result();
	}
	

}