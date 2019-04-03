<?php
class Faq extends CI_controller{
    
    public function index() {
    	$data['faq']=$this->admin_model->getfaq();
    	$data['ifaq']=$this->admin_model->getfaqimages();
        $this->load->view('faq',$data);
    }

    // public function login() {
    //     $this->load->view('panel/login');
    // }
}