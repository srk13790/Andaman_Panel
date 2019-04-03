<?php
class About_andaman extends CI_controller{
    
    public function index() {
    	$data['activities']=$this->admin_model->activities();
    	$data['iaa']=$this->admin_model->getaboutandamanimages();
    	$data['aa']=$this->admin_model->getaboutandamancontent();
    	//$data['ifaq']=$this->admin_model->getfaqimages();
        $this->load->view('about_andaman',$data);
    }

    // public function login() {
    //     $this->load->view('panel/login');
    // }
}