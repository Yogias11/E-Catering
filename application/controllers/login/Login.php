<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->form_validation->set_rules('username','Username','required|alpha_numeric');
		$this->form_validation->set_rules('password','Password','required|alpha_numeric');

		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('login/form_login');
		}else{
			$this->load->model('login/model_login');
			$valid_user = $this->model_login->check_credential();

		if($valid_user == FALSE)
		{
			echo "<script>
		            alert('Gagal Login ! Silahkan Masukan Username & Password dengan benar!');
		            history.go(-1);
		          </script>";
			//redirect('Login/Login');
		}else{
			$this->session->set_userdata('username', $valid_user->username);
			$this->session->set_userdata('level', $valid_user->level);

			switch ($valid_user->level) {
				case 'admin':
					redirect('admin/Admin');
					break;
				case 'user':
					redirect(base_url());
					break;
				
				default:

					break;
				}
			}
		}
	}

	public function create2() {
                     $this->form_validation->set_rules('id_user', 'ID', 'required');
                     $this->form_validation->set_rules('username', 'Username', 'required');  
                     $this->form_validation->set_rules('email', 'Email', 'required');
                     $this->form_validation->set_rules('alamat', 'Alamat', 'required');
                     $this->form_validation->set_rules('ponsel', 'NO Telpon', 'required');  
                     $this->form_validation->set_rules('password', 'Password', 'required');  
                     $this->form_validation->set_rules('level','Level');  
                     if ($this->form_validation->run() == FALSE)  
                     {       
                      $this->buatkode();
                          } else {
                              $this->model_login->insertdata($data_produk);	
                              redirect('shopping');
                          }   
                     }  
 	public function buatkode(){
		$data1['kode']=$this->model_login->kodeoto();
		$this->load->view('login/register',$data1);
     }  

	public function Logout()
	{
		$this->session->sess_destroy();
		redirect('Shopping');
	}
}