<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Shopping extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('cart');
		$this->load->model('keranjang_model');
	}

	public function index()
	{
		$kategori=($this->uri->segment(3))?$this->uri->segment(3):0;
		$data['produk'] = $this->keranjang_model->get_produk_kategori($kategori);
		$data['kategori'] = $this->keranjang_model->get_kategori_all();
		$this->load->view('themes/header',$data);
		$this->load->view('shopping/list_produk',$data);
		$this->load->view('themes/footer');
	}

	public function tampil_cart()
	{
		$data['kategori'] = $this->keranjang_model->get_kategori_all();
		$this->load->view('themes/header',$data);
		$this->load->view('shopping/tampil_cart',$data);
		$this->load->view('themes/footer');
	}

	public function check_out()
	{
		if(!$this->session->userdata('username'))
		{
			redirect('login/login');
		}
		$data['kategori'] = $this->keranjang_model->get_kategori_all();
		$this->load->view('themes/header',$data);
		$this->load->view('shopping/check_out',$data);
		$this->load->view('themes/footer');
	}

	public function detail_produk()
	{
		$id=($this->uri->segment(3))?$this->uri->segment(3):0;
		$data['kategori'] = $this->keranjang_model->get_kategori_all();
		$data['detail'] = $this->keranjang_model->get_produk_id($id)->row_array();
		$this->load->view('themes/header',$data);
		$this->load->view('shopping/detail_produk',$data);
		$this->load->view('themes/footer');
	}

	public function transaksi()
	{
		$data['kategori'] = $this->keranjang_model->get_kategori_all();
		$this->load->view('themes/header',$data);
		$this->load->view('shopping/transaksi',$data);
		$this->load->view('themes/footer');
	}

	function tambah()
	{
		$data_produk= array('id' => $this->input->post('id'),
							 'name' => $this->input->post('nama'),
							 'price' => $this->input->post('harga'),
							 'gambar' => $this->input->post('gambar'),
							 'qty' =>$this->input->post('qty')
							);
		$this->cart->insert($data_produk);
		redirect('shopping');
	}

	function insert_transaksi()
	{
		$data_produk= array('id_bayar' => $this->input->post('id_bayar'),
							 'nm_bayar' => $this->input->post('nm_bayar'),
							 'nama' => $this->input->post('nama'),
							 'norek' => $this->input->post('norek'),
							 'bukti' =>$this->input->post('bukti')
							);
		$this->cart->insert($data_produk);
		redirect('shopping');
	}

	function hapus($rowid)
	{
		if ($rowid=="all")
			{
				$this->cart->destroy();
			}
		else
			{
				$data = array('rowid' => $rowid,
			  				  'qty' =>0);
				$this->cart->update($data);
			}
		redirect('shopping/tampil_cart');
	}

	function ubah_cart()
	{
		$cart_info = $_POST['cart'] ;
		foreach( $cart_info as $id => $cart)
		{
			$rowid = $cart['rowid'];
			$price = $cart['price'];
			$gambar = $cart['gambar'];
			$amount = $price * $cart['qty'];
			$qty = $cart['qty'];
			$data = array('rowid' => $rowid,
							'price' => $price,
							'gambar' => $gambar,
							'amount' => $amount,
							'qty' => $qty);
			$this->cart->update($data);
		}
		redirect('shopping/tampil_cart');
	}

	public function proses_order()
	{


		//-------------------------Input data pelanggan--------------------------
		$data_pelanggan = array('id_user' => $this->keranjang_model->get_logged_user_id(),
								'nama' => $this->input->post('nama'),
								'email' => $this->input->post('email'),
								'alamat' => $this->input->post('alamat'),
								'telp' => $this->input->post('telp')
						);
		$id_pelanggan = $this->keranjang_model->tambah_pelanggan($data_pelanggan);


		//-------------------------Input data order------------------------------
		///$data_order = array('tanggal' => date('Y-m-d H:i:s'),
				//);
		//$id_order = $this->keranjang_model->tambah_order($data_order);

		$invoice = array('date' => date('Y-m-d'),
						 'due_date' => date('Y-m-d H:i:s'),
						 'status' => 'unpaid');
		$id_invoices = $this->keranjang_model->invoices($invoice);


		//-------------------------Input data detail order-----------------------
		if ($cart = $this->cart->contents())
			{
				foreach ($cart as $item)
					{
						$data_detail = array('id_plg' => ($id_pelanggan),
											 'id_ivc' => ($id_invoices),
											 'id_user' => $this->keranjang_model->get_logged_user_id(),
											 'tanggal' => date('Y-m-d h:i:s'),
											 'batas'   => date('Y-m-d H:i:s', mktime(date('H'), date('i'), date('s'), date('m'), date('d') + 1, date('Y'))),
											 'qty' => $item['qty'],
											 'harga' => $item['price'],
											 'gambar' => $item['gambar'],
											);
						$proses = $this->keranjang_model->tambah_pesanan($data_detail);
					}
			}


		//-------------------------Hapus shopping cart--------------------------
		$this->cart->destroy();
		$data['kategori'] = $this->keranjang_model->get_kategori_all();
		$this->load->view('themes/header',$data);
		$this->load->view('shopping/sukses',$data);
		$this->load->view('themes/footer');
	}
}
?>
