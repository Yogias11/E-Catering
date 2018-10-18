<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Keranjang_model extends CI_Model {

	public function get_produk_all()
	{
		$query = $this->db->get('tbl_produk');
		return $query->result_array();
	}
	
	public function get_produk_kategori($kategori)
	{
		if($kategori>0)
			{
				$this->db->where('kategori',$kategori);
			}
		$query = $this->db->get('tbl_produk');
		return $query->result_array();
	}
	
	public function get_kategori_all()
	{
		$query = $this->db->get('tbl_kategori');
		return $query->result_array();
	}
	
	public  function get_produk_id($id)
	{
		$this->db->select('tbl_produk.*,nama_kategori');
		$this->db->from('tbl_produk');
		$this->db->join('tbl_kategori', 'kategori=tbl_kategori.id','left');
   		$this->db->where('id_produk',$id);
        return $this->db->get();
    }	
	
	public function all(){
      	$hasil = $this->db->query("SELECT * FROM tbl_pesanan ORDER BY id");
        return $hasil->result();
    }

	public function tambah_pelanggan($data)
	{
		$this->db->insert('tbl_pelanggan', $data);
		$id = $this->db->insert_id();
		return (isset($id)) ? $id : FALSE;
	}
	
	public function invoices()
	{
		$invoices = array(
					'date'	=> date('Y-m-d H:i:sa'),
					'due_date' => date('Y-m-d H:i:s', mktime(date('H'), date('i'), date('s'), date('m'), date('d') + 1, date('Y'))),
					'id_user' => $this->get_logged_user_id(),
					'status' => 'unpaid'
				);
		$this->db->insert('invoices', $invoices);
		$invoices_id = $this->db->insert_id();
		return (isset($invoices_id)) ? $invoices_id : FALSE;
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

	public function transaksi($data)
	{
		$this->db->insert('tbl_bayar', $data);
		$id = $this->db->insert_id();
		return (isset($id)) ? $id : FALSE;
	}
	
	public function tambah_pesanan($data)
	{
		$this->db->insert('tbl_pesanan', $data);
	}

	public function kodeoto(){
      $this->db->select('RIGHT(tbl_bayar.id_bayar,3) as kode',FALSE);
      $this->db->order_by('id_bayar','DESC');
      $this->db->limit(1);

      $query=$this->db->get('tbl_bayar');

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