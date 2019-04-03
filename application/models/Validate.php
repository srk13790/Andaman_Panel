<?php

class Validate extends CI_Model{
    
    public function auth($username,$password){
        $password=md5(sha1($password));
        $query = $this->db->query("select user_id,module,name,email,contact from users where email='$username' and password='$password'");
        $no=$query->num_rows();
        if($no == 1)
        {
           //return $query->result_array();
            $data['user_id']=$query->row()->user_id;
            $data['module']=$query->row()->module;
            $data['name']=$query->row()->name;
            $data['email']=$query->row()->email;
            $data['contact']=$query->row()->contact;
            
            return $data;
        
        }
    }
    
}