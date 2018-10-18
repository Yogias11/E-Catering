<?php 
class Upload extends CI_Controller{
  function __construct()
  {
      parent::__construct();
      $this->load->model('admin/Bayar_model');
      $this->load->library('upload');
  } 

  function index()
  {
      $this->load->view('Admin/t_bayar');
  }

  function upload_image()
  {
      $config['upload_path'] = './assets/images/'; //path folder
      $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
      $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

      $this->upload->initialize($config);
          if(!empty($_FILES['filefoto']['name'])){

          if ($this->upload->do_upload('filefoto')){
              $gbr = $this->upload->data();
              //Compress Image
              $config['image_library']='gd2';
              $config['source_image']='./assets/images/'.$gbr['file_name'];
              $config['create_thumb']= FALSE;
              $config['maintain_ratio']= FALSE;
              $config['quality']= '50%';
              $config['width']= 250;
              $config['height']= 200;
              $config['new_image']= './assets/images/'.$gbr['file_name'];

      $this->load->library('image_lib', $config);
      $this->image_lib->resize();

              $gambar     =$gbr['file_name'];
              $id         =$this->input->post('id_bayar');
              $nama       =$this->input->post('nm_bayar');
              $nm         =$this->input->post('nama');
              $tgl        =$this->input->post('tanggal');

      $this->Bayar_model->bayar($id,$nama,$nm,$tgl,$gambar);

        
        redirect('admin/produk');
      }
                   
      }else{
        
        echo "Image yang diupload kosong";
    }
  }
  public function create() 
  {
              $this->form_validation->set_rules('id_bayar', 'ID', 'required');
              $this->form_validation->set_rules('nm_bayar', 'Nama Bank', 'required');
              $this->form_validation->set_rules('nama', 'Nama', 'required');
              $this->form_validation->set_rules('tgl', 'Tanggal', 'required|integer');
              $this->form_validation->set_rules('bukti', 'Bukti');
          if ($this->form_validation->run() == FALSE)
              {
                  $this->buatkode();
              }else{
              $data_produk  = array(
                  'id_bayar'  => set_value('id_bayar'),
                  'nm_bayar'  => set_value('nm_bayar'),
                  'nama'      => set_value('nama'),
                  'tgl'       => date('Y-m-d H:i:sa'),
                    );
              $this->Bayar_model->create($data_produk);
                  redirect('admin/Produk');
    }
  }

  function buatkode()
  {
      $data1['kode']=$this->Produk_model->kodeoto();
      $this->load->view('admin/t_produk',$data1);
  }   
  }
?>