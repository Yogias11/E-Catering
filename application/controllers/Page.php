<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
	public function __construct()
	{	
		parent::__construct();
		$this->load->library('cart');
		$this->load->model('keranjang_model');
	}
	public function index()
		{
			$data['produk'] = $this->keranjang_model->get_produk_all();
			$data['kategori'] = $this->keranjang_model->get_kategori_all();
			$this->load->view('themes/header',$data);
			$this->load->view('shopping/list_produk',$data);
			$this->load->view('themes/footer');
		}
	public function tentang()
		{
			$data['kategori'] = $this->keranjang_model->get_kategori_all();
			$this->load->view('themes/header',$data);
			$this->load->view('pages/tentang',$data);
			$this->load->view('themes/footer');
		}	
	public function cara_bayar()
		{
			$data['kategori'] = $this->keranjang_model->get_kategori_all();
			$this->load->view('themes/header',$data);
			$this->load->view('pages/cara_bayar',$data);
			$this->load->view('themes/footer');
		}
	public function transaksi()
		{
			$data['kategori'] = $this->keranjang_model->all();
			$this->load->view('themes/header',$data);
			$this->load->view('shopping/transaksi',$data);
			$this->load->view('themes/footer');
		}
	public function buatkode(){
		$data1['kode']=$this->Method_model->kodeoto();
		$this->load->view('check_out',$data1);	
		}	
}