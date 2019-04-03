<?php
class Authenticate extends CI_controller{
    
    function __construct() {
        parent::__construct();
        // Load the captcha helper
        $this->load->helper('captcha');
    }
    public function login() {
        
        if($this->input->post()){
            
            $inputCaptcha = $this->input->post('captcha');
            $sessCaptcha = $this->session->userdata('captchaCode');
            if($inputCaptcha === $sessCaptcha){
            $data=$this->input->post();
            if(!empty($data)){
            $email=$this->input->post('email');
            $password=$this->input->post('password');
            
            $this->load->model('validate');
            $login= $this->validate->auth($email,$password);
            
            if($login)
            { 
              $this->session->set_userdata('success',$login);
              $this->session->userdata('success');
              $uid=$login['user_id'];
              $uname=$login['name'];
              echo $module=$login['module'];
              $this->load->library('session');
              $this->session->set_userdata('user_id',$uid);
              $this->session->set_userdata('name',$uname);
              $this->session->set_userdata('module',$module);
              if($module ==1){
                  redirect('Admin/dashboard');
              }
              
            }
            else
            {   
            $this->session->set_userdata('inavlid','invalid');
            //   $this->load->view('admin_dashboard',$data);
            $this->load->view('login',$data);
            }
            
        }
            
            }else{
                $this->session->set_userdata('wrong_captcha','wrong_captcha');
                $this->load->view('login');
            }
        }
        
        
        
    }
}