
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

  public function __construct() 
  {
      parent::__construct();
      $this->load->model('admin/Order_model');
  }

  public function index()
  {
      $data['produk']=$this->Order_model->all();
      $this->load->view('admin/Order_view',$data);
  }

  public function buatkode(){
      $data1['kode']=$this->Order_model->kodeoto();
      $this->load->view('admin/t_order',$data1);
  }

  public function create() 
  {
      $this->form_validation->set_rules('id', 'ID', 'required');
      $this->form_validation->set_rules('order_id', 'Id Order', 'required');
      $this->form_validation->set_rules('qty', 'Quantity', 'required');
      $this->form_validation->set_rules('harga', 'Harga', 'required|integer');
      $this->form_validation->set_rules('gambar', 'Gambar');
          if ($this->form_validation->run() == FALSE)
          {
              $this->buatkode();
          }else{
              $data_produk = array(
                      'id' => set_value('id'),
                      'order_id' => set_value('order_id'),
                      'qty' => set_value('qty'),
                      'harga'     => set_value('harga')
              );
      $this->Order_model->create($data_produk);
              redirect('admin/Order');
    }
  }

  public function update($id_produk)
  {
      $this->form_validation->set_rules('id', 'ID', 'required');
      $this->form_validation->set_rules('order_id', 'Id Order', 'required');
      $this->form_validation->set_rules('qty', 'Quantity', 'required');
      $this->form_validation->set_rules('harga', 'Harga', 'required|integer');
      $this->form_validation->set_rules('gambar', 'Gambar');
          if ($this->form_validation->run() == FALSE)
          {
              $data3['produk'] = $this->Order_model->find($id_produk);
              $this->load->view('admin/ubah_order',$data3);
          }else{
              $data_produk = array(
                      'id' => set_value('id'),
                      'order_id' => set_value('order_id'),
                      'qty' => set_value('qty'),
                      'harga'     => set_value('harga')
              );
      $this->Order_model->update($id_produk, $data_produk);
          redirect('admin/Order');
    }
  }

  public function delete($id_produk)
  {
      $this->Order_model->delete($id_produk);
          redirect('admin/Order');
  }
}
?>
