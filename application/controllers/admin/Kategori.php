<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

  public function __construct()
  {
      parent::__construct();
      $this->load->model('admin/Kategori_model');
  }

	public function index()
	{
      $data['kategori']=$this->Kategori_model->all();
      $this->load->view('admin/kategori_view',$data);
	}

  public function tambah_kategori() 
  {
      $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('admin/t_kategori');
        }else{
            $data_model = array(
                  'id' => set_value('id'),
                  'nama_kategori' => set_value('nama_kategori')
                  );
      $this->Kategori_model->tambah_kategori($data_model);
            redirect('admin/Kategori');
    }
  }

  public function update_kategori($id)
  {
      $this->form_validation->set_rules('id', 'Kode Kategori', 'required');
      $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');
        if ($this->form_validation->run() == FALSE)
        {
            $data3['kategori'] = $this->Kategori_model->findkategori($id);
            $this->load->view('admin/ubah_kategori',$data3);
        }else{
            $data_model = array(
                    'id' => set_value('id'),
                    'nama_kategori' => set_value('nama_kategori')
                    );
      $this->Kategori_model->update_kategori($id, $data_model);
            redirect('admin/Kategori');
    }
  }

  public function delete_kategori($id)
  {
        $this->Kategori_model->delete_kategori($id);
            redirect('admin/Kategori');
  }
  }
?>
