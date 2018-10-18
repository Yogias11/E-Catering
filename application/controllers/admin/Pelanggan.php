<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

  public function __construct()
  {
      parent::__construct();
      $this->load->model('admin/Pelanggan_model');
  }

	public function index()
	{
      $data['user']=$this->Pelanggan_model->all();
      $this->load->view('admin/pelanggan_view',$data);
	}

  public function buatkode()
  {
      $data1['kode']=$this->Pelanggan_model->kodeoto();
      $this->load->view('admin/t_pelanggan',$data1);
	}

  public function tambah_user() 
  {
      $this->form_validation->set_rules('id_user', 'Kode Pelanggan', 'required');
      $this->form_validation->set_rules('username', 'Username', 'required');
      $this->form_validation->set_rules('email', 'Email', 'required');
      $this->form_validation->set_rules('alamat', 'Alamat', 'required');
      $this->form_validation->set_rules('ponsel', 'Ponsel', 'required');
      $this->form_validation->set_rules('password', 'Password', 'required');
      $this->form_validation->set_rules('level', 'Level', 'required');
          if ($this->form_validation->run() == FALSE)
          {
              $this->buatkode();
          }else{
              $data_user = array(
                      'id_user'   => set_value('id_user'),
                      'username'  => set_value('username'),
                      'email'     => set_value('email'),
                      'alamat'    => set_value('alamat'),
                      'ponsel'    => set_value('ponsel'),
                      'password'  => set_value('password'),
                      'level'     => set_value('level')
          );
      $this->Pelanggan_model->insertdata($data_user);
          redirect('admin/Pelanggan');
    }
  }

  public function update_user($id_user)
  {
      $this->form_validation->set_rules('id_user', 'Kode Pelanggan', 'required');
      $this->form_validation->set_rules('username', 'Username', 'required');
      $this->form_validation->set_rules('email', 'Email', 'required');
      $this->form_validation->set_rules('alamat', 'Alamat', 'required');
      $this->form_validation->set_rules('ponsel', 'Ponsel', 'required');
      $this->form_validation->set_rules('password', 'password', 'required');
      $this->form_validation->set_rules('level', 'Level', 'required');
          if ($this->form_validation->run() == FALSE)
          {
              $data3['user'] = $this->Pelanggan_model->finduser($id_user);
              $this->load->view('admin/ubah_user',$data3);
          }else{
              $data_user = array(
                      'id_user'   => set_value('id_user'),
                      'username'  => set_value('username'),
                      'email'     => set_value('email'),
                      'alamat'    => set_value('alamat'),
                      'ponsel'    => set_value('ponsel'),
                      'password'  => set_value('password'),
                      'level'     => set_value('level')
              );
      $this->Pelanggan_model->update_user($id_user, $data_user);
          redirect('admin/Pelanggan');
    }
  }
  
  public function delete_user($id_user)
  {
      $this->Pelanggan_model->delete_user($id_user);
          redirect('admin/Pelanggan');
  }
}
?>
