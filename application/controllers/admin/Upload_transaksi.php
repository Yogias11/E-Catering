<?php 
class Upload_transaksi extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin/Bayar_model');
		$this->load->model('keranjang_model');
		$this->load->library('cart');
		$this->load->library('upload');
		} 

	public function buatkode()
	{
			    $data1['kode']=$this->Bayar_model->kodeoto();
			    $kategori=($this->uri->segment(3))?$this->uri->segment(3):0;
				$data['produk'] = $this->keranjang_model->get_produk_kategori($kategori);
				$data['kategori'] = $this->keranjang_model->get_kategori_all();
				$data['metode'] = $this->Bayar_model->get_bank();
			    $this->load->view('themes/header',$data);
			    $this->load->view('admin/tm_bayar',$data1);
			    $this->load->view('themes/footer');
	}

	public function create() 
	{
                $this->form_validation->set_rules('id', 'ID', 'required');
                $this->form_validation->set_rules('nama', 'Nama', 'required');
                $this->form_validation->set_rules('tanggal', 'Tanggal', 'required');
                $this->form_validation->set_rules('bukti', 'Bukti', 'required|integer');
            		if ($this->form_validation->run() == FALSE)
        			{
                    	$this->buatkode();
        			}else{
                    	$data_produk = array(
								'id' => set_value('id'),
								'nama' => set_value('nama'),
								'tanggal' => date('Y-m-d H:i:s'),
                    	);
                $this->Bayar_model->create($data_produk);
                    	redirect('admin/Bayar');
		}
    }

	public function upload_image()
	{
				$config['upload_path'] = './assets/bukti/'; //path folder
				$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
				$config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

				$this->upload->initialize($config);
	    			if(!empty($_FILES['bukti']['name'])){

	    			if ($this->upload->do_upload('bukti')){
	            $gbr = $this->upload->data();
	            //Compress Image
	            $config['image_library']='gd2';
	            $config['source_image']='./assets/bukti/'.$gbr['file_name'];
	            $config['create_thumb']= FALSE;
	            $config['maintain_ratio']= FALSE;
	            $config['quality']= '50%';
	            $config['width']= 250;
	            $config['height']= 200;
	            $config['new_image']= './assets/bukti/'.$gbr['file_name'];
	            $this->load->library('image_lib', $config);
	            $this->image_lib->resize();

	            $id 			=$this->input->post('id');
				$id_u			=$this->Bayar_model->get_logged_user_id();
				$nama			=$this->input->post('nama');
				$tanggal		= date('Y-m-d H:i:s');
				$gambar			=$gbr['file_name'];
				
				$this->Bayar_model->upload($id,$id_u,$nama,$tanggal,$gambar);
				$data['kategori'] = $this->keranjang_model->get_kategori_all();
				$this->load->view('themes/header',$data);
				$this->load->view('shopping/konfirmasi',$data);
				$this->load->view('themes/footer');
		}
	    }else{
	    		echo "Image yang diupload kosong";
		}
	}

	function autofill () {
		echo json_decode($this->Bayar_model->get_bank());
	}
}
