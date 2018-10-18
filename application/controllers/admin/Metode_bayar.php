<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Metode_bayar extends CI_Controller {

	public function __construct()
	{
      parent::__construct();
      $this->load->model('admin/Metode_bayar_model');
	}

	public function index()
	{
      $data['metode'] = $this->Metode_bayar_model->all();
      $this->load->view('admin/metode_view', $data);	
	}

  public function buatkode()
  {
      $data1['kode']=$this->Metode_bayar_model->kodeoto();
      $this->load->view('admin/t_bayar',$data1);
 	}

  public function tambah_metode() 
  {
      $this->form_validation->set_rules('id_bayar', 'ID Bayar', 'required');
      $this->form_validation->set_rules('nm_bayar', 'Nama Bank', 'required');
      $this->form_validation->set_rules('an', 'Atas Nama', 'required');
      $this->form_validation->set_rules('norek', 'Nomor Rekening', 'required');
          if ($this->form_validation->run() == FALSE)
          {
              $this->buatkode();
          }else{
              $data_model = array(
                    'id_bayar' => set_value('id_bayar'),
                    'nm_bayar' => set_value('nm_bayar'),
                    'an' => set_value('an'),
                    'norek' => set_value('norek')
              );
      $this->Metode_bayar_model->tambah_metode($data_model);
          redirect('admin/Metode_bayar');
    }
	}

  public function update_metode($id)
  {
      $this->form_validation->set_rules('id_bayar', 'ID Bayar', 'required');
      $this->form_validation->set_rules('nm_bayar', 'Nama Bank', 'required');
      $this->form_validation->set_rules('an', 'Atas Nama', 'required');
      $this->form_validation->set_rules('norek', 'Nomor Rekening', 'required');
          if ($this->form_validation->run() == FALSE)
          {
              $data['metode'] = $this->Metode_bayar_model->find($id);
              $this->load->view('admin/ubah_metode',$data);
          }else{
              $data_model = array(
                    'id_bayar' => set_value('id_bayar'),
                    'nm_bayar' => set_value('nm_bayar'),
                    'an' => set_value('an'),
                    'norek' => set_value('norek')
              );
      $this->Metode_bayar_model->update($id, $data_model);
          redirect('admin/Metode_bayar');
    }
	}
}

/* End of file Metode_bayar.php */
/* Location: ./application/controllers/Admin/Metode_bayar.php */