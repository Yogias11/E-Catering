<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Customer extends CI_Controller {

	public function __construct()
	{	
		parent::__construct();
		$this->load->library('cart');
    $this->load->model('Model_customer');
    $this->load->model('Keranjang_model');
    
	  }
		public function index()
  	{
		$kategori=($this->uri->segment(3))?$this->uri->segment(3):0;
		$data['produk'] = $this->Keranjang_model->get_produk_kategori($kategori);
		$data['kategori'] = $this->Keranjang_model->get_kategori_all();
		$this->load->view('themes/header', $data);
		$this->load->view('shopping/list_produk',$data);
		$this->load->view('themes/footer');
    }
    
    public function cara_bayar()
    {
    $kategori=($this->uri->segment(3))?$this->uri->segment(3):0;
		$data['produk'] = $this->Keranjang_model->get_produk_kategori($kategori);
		$data['kategori'] = $this->Keranjang_model->get_kategori_all();
		$this->load->view('themes/header',$data);
		$this->load->view('shopping/cara_bayar',$data);
		$this->load->view('themes/footer');
    }

  	public function payment_confirmation($id_ivc = 0)
  	{
      $data1['kategori'] = $this->Model_customer->get_kategori_all();
      $this->form_validation->set_rules('id_ivc', 'ID invoice', 'Required|integer');

      if($this->form_validation->run() == FALSE)
      {
        if($this->input->post('id_ivc')){
          $data['id_ivc'] = set_value('id_ivc');
        }else{
          $data['id_ivc'] = $id_ivc;  
        }
          $this->load->view('themes/header',$data1);
          $this->load->view('shopping/konfirmasi', $data); 
          $this->load->view('themes/footer');     
        }else{
          $isvalid = $this->Model_customer->buat_confirmasi(set_value('id_ivc'));

        if ($isvalid) {
          redirect('Customer/shopping_history');
        }else{
          redirect('Customer/shopping_history');
        }
        }
      }

  	public function shopping_history()
  	{
  		$user = $this->session->userdata('username');
  		$data['kategori'] = $this->Model_customer->get_kategori_all();
  		$data['sejarah'] = $this->Model_customer->history($user);
  		$this->load->view('themes/header',$data);
  		$this->load->view('shopping/history', $data);
  		$this->load->view('themes/footer');
  	}

    public function his()
    {
      $user = $this->session->userdata('username');
      $data['kategori'] = $this->Model_customer->get_kategori_all();
      $data['sejarah'] = $this->Model_customer->buat_history($user);
      $this->load->view('themes/header',$data);
      $this->load->view('shopping/history_pesanan', $data);
      $this->load->view('themes/footer');
    }

    public function konfirmasi()
    {
      $user = $this->session->userdata('username');
      $data['kategori'] = $this->Model_customer->get_kategori_all();
      $data['sejarah'] = $this->Model_customer->history($user);
      $this->load->view('themes/header',$data);
      $this->load->view('shopping/konfirmasi', $data);
      $this->load->view('themes/footer');
    }

    
}
?>