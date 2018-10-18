<?php  
 class register extends CI_Controller {  
      public function __construct(){  
           parent::__construct();  
           $this->load->model("login/model_login");  
      }       
      public function index()  
      {  
      //$this->insert('user');       
      }  
      public function insert()  
      { 
           $this->form_validation->set_rules('id_user', 'ID', 'required');
           $this->form_validation->set_rules('username', 'Username', 'required');  
           $this->form_validation->set_rules('email', 'Email', 'required');
           $this->form_validation->set_rules('alamat', 'Alamat', 'required');
           $this->form_validation->set_rules('ponsel', 'NO Telpon', 'required');  
           $this->form_validation->set_rules('password', 'Password', 'required');  
           $this->form_validation->set_rules('level','Level');  
           if ($this->form_validation->run())  
           {       
           $register=$this->model_login->insertdata($_POST);  
           if($register == TRUE){  
                     echo "sukses";
                }  
           }  
           $data['user']="Registration";  
           redirect('login/Login',$data);
           $this->load->view('shopping/list_produk',$data);       
      }  
  }  
 ?>  