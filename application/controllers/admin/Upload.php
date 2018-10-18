<?php 
class Upload extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin/Produk_model');
		$this->load->library('upload');
	} 

	function index(){
		$this->load->view('admin/t_produk');
	}

	function buatkode(){
		$data1['kode']=$this->Produk_model->kodeoto();
		$this->load->view('admin/t_produk',$data1);
	}

	function upload_image()
	{
		$path = './assets/images/'; //path folder
		$config['upload_path'] = $path; //path folder
	    $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
	    $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

	    $this->upload->initialize($config);
	    	if(!empty($_FILES['gambar']['name'])){

	        if ($this->upload->do_upload('gambar')){
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

	            $gambar			=$gbr['file_name'];
	            $id 			=$this->input->post('id_produk');
				$nama			=$this->input->post('nama_produk');
				$deskripsi		=$this->input->post('deskripsi');
				$harga			=$this->input->post('harga');
				$kategori		=$this->input->post('kategori');

		$this->Produk_model->upload($id,$nama,$deskripsi,$harga,$gambar,$kategori);
				redirect('admin/Produk');
			}
		    }else{
	 			echo "Image yang diupload kosong";
		}	
	}
	
	function update_image($id_produk)
	{
		$path = './assets/images/'; //path folder
		$config['upload_path'] = $path; //path folder
		$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload

		$this->upload->initialize($config);

			if ($this->upload->do_upload('gambar')){
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

				$id 			=$this->input->post('id_produk');
				$nama			=$this->input->post('nama_produk');
				$deskripsi		=$this->input->post('deskripsi');
				$harga			=$this->input->post('harga');
				$gambar			=$gbr['file_name'];					
				$kategori		=$this->input->post('kategori');

		$this->Produk_model->img_update($nama,$deskripsi,$harga,$gambar,$kategori,$id);
				
				redirect('admin/Produk');
			}else{
				echo "Image yang diupload kosong";
		}
		$data3['produk'] = $this->Produk_model->find($id_produk);
		$this->load->view('admin/ubah_produk',$data3);
	}
}