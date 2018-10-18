<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_login extends CI_Model {

	public function check_credential()
	{
		$username = set_value('username');
		$password = set_value('password');

		$hasil	  = $this->db->where('username', $username)
							   	  ->where('password', $password)
							   	  ->limit(1)
							      ->get('user');

		if($hasil->num_rows() > 0 ){
			return $hasil->row();
		}else{
			return array();
		}
	}

	function insertdata($options = array()){  
            if(isset($options['id_user']))  
                $this->db->set('id_user',strip_tags($options['id_user']));
            if(isset($options['username']))  
                $this->db->set('username',strip_tags($options['username']));  
            if(isset($options['email']))  
                $this->db->set('email',strip_tags($options['email']));
            if(isset($options['alamat']))  
                $this->db->set('alamat',strip_tags($options['alamat']));
            if(isset($options['ponsel']))  
                $this->db->set('ponsel',strip_tags($options['ponsel']));  
            if(isset($options['password']))  
                $this->db->set('password',strip_tags($options['password']));  
            if(isset($options['level']))  
                $this->db->set('level',($options['level']));  
                $this->db->insert("user");  
           return $this->db->insert_id();
      }  

      public function kodeoto(){
      $this->db->select('RIGHT(user.id_user,3) as kode',FALSE);
      $this->db->order_by('id_user','DESC');
      $this->db->limit(1);

      $query=$this->db->get('user');

      if($query->num_rows()<>0) {
        $data = $query->row();
        $kode = intval($data->kode)+1;
      }else {
        $kode = 1;
      }
      $kodemax = str_pad($kode,3,"0",STR_PAD_LEFT);
      $kodejadi = "US".$kodemax;
      return $kodejadi;
    }
}
?>