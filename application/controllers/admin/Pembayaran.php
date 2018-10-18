<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/Pembayaran_model');
	}
	public function index()
	{
		$data['pembayaran'] = $this->Pembayaran_model->tampil();
		$this->load->view('admin/pembayaran_view', $data);
	}
}

/* End of file Pembayaran.php */
/* Location: ./application/controllers/Admin/Pembayaran.php */