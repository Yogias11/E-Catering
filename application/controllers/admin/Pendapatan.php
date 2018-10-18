<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendapatan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('Pdf');
		$this->load->model('admin/Pendapatan_model');
	}

	public function index()
	{
		$data['pendapatan'] = $this->Pendapatan_model->pendapatan();
		$this->load->view('admin/pendapatan_view', $data);
	}
	
	public function cetak()
	{
		$data1['cpendapatan'] = $this->Pendapatan_model->c_pendapatan();
		$this->load->view('admin/cetak_pendapatan', $data1);
	}	
}

/* End of file Pembayaran.php */
/* Location: ./application/controllers/Admin/Pembayaran.php */