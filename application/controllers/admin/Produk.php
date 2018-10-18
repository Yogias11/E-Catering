<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

  public function __construct() 
  {
      parent::__construct();
      $this->load->model('admin/Produk_model');
  }

  public function index()
  {
      $data['produk']=$this->Produk_model->all();
      $this->load->view('admin/produk_view',$data);
  }

  public function buatkode(){
    $data1['kategori']=$this->Produk_model->get_kategori();
      $data1['kode']=$this->Produk_model->kodeoto();
      $this->load->view('admin/t_produk',$data1);
  }

  public function tambah_produk() {
      $this->form_validation->set_rules('id_produk', 'ID', 'required');
      $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
      $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
      $this->form_validation->set_rules('harga', 'Harga', 'required|integer');
      $this->form_validation->set_rules('gambar', 'Gambar');
      $this->form_validation->set_rules('kategori', 'Kategori', 'required');
          if ($this->form_validation->run() == FALSE)
          {
              $this->buatkode();
          }else{
              $data_produk = array(
                      'id_produk' => set_value('id_produk'),
                      'nama_produk' => set_value('nama_produk'),
                      'deskripsi' => set_value('deskripsi'),
                      'harga'     => set_value('harga'),
                      'kategori' => set_value('kategori'),
              );
      $this->Produk_model->create($data_produk);
              redirect('admin/Produk');
    }
  }

  public function update_produk($id_produk){
      $this->form_validation->set_rules('id_produk', 'ID', 'required');
      $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required');
      $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');
      $this->form_validation->set_rules('harga', 'Harga', 'required|integer');
      $this->form_validation->set_rules('gambar', 'Gambar');
      $this->form_validation->set_rules('kategori', 'Kategori', 'required');
          if ($this->form_validation->run() == FALSE)
          {
              $data3['kategori']=$this->Produk_model->get_kategori();
              $data3['produk'] = $this->Produk_model->find($id_produk);
              $this->load->view('admin/ubah_produk',$data3);
          }else{
              $data_produk = array(
                      'id_produk'   => set_value('id_produk'),
                      'nama_produk' => set_value('nama_produk'),
                      'deskripsi'   => set_value('deskripsi'),
                      'harga'       => set_value('harga'),
                      'kategori'    => set_value('kategori')
              );
      $this->Produk_model->update($id_produk, $data_produk);
              redirect('admin/Produk');
    }
  }

  public function delete($id_produk){
      $this->Produk_model->delete($id_produk);
              redirect('admin/Produk');
    }
  }
?>
