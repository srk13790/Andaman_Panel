<?php

class Admin extends BI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->library('CKEditor');
        $this->ckeditor->basePath = base_url().'panel/assets/CKEditor/';
        $this->ckeditor->config['toolbar'] = array(
                        array( 'Source', '-', 'Bold', 'Italic', 'Underline', '-','Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo','-','NumberedList','BulletedList' )
                                                            );
        $this->ckeditor->config['language'] = 'en';
        $this->ckeditor->config['width'] = '450px';
        $this->ckeditor->config['height'] = '100px';
    }

//-------------------Home-----------------------------------

    public function dashboard() {
     $this->load->model('admin_model');
     $data['content_sidebar']=$this->admin_model->activities();
     $data['carousel']=$this->admin_model->getCarousel();
     $this->load->view('dashboard',$data);
    }

    //---------------------Home-----------------------------------
    public function home() {
     //$this->load->model('admin_model');
     $data['content_sidebar']=$this->admin_model->activities();
     $data['carousel']=$this->admin_model->getCarousel();
     $data['content']=$this->admin_model->getContent();
     $data['our_tour']=$this->admin_model->getTour();
     $data['otd']=$this->admin_model->getTourDetails();
     $data['aa']=$this->admin_model->getAboutAndaman();
     $data['ac']=$this->admin_model->getActivities();
     $data['tp']=$this->admin_model->getTripPlanner();
     $data['our_events']=$this->admin_model->getEvents();
     $data['oed']=$this->admin_model->getEventsDetails();
     $this->load->view('home',$data);
    }

    public function update_content() {
     $data=  $this->input->post();
      $data['title'] = $data['textarea_title2'];
      $data['title']=str_replace('<p>',' ',$data['textarea_title2']);
      $data['title']=str_replace('</p>',' ',$data['title']);
      $title = strlen(strip_tags($data['title']));
      if($title > 45) {
        $title = $title - 45;
        $this->session->set_userdata('exceed_about_us',$title);
        redirect("Admin/home");
        exit;
      }
      unset($data['textarea_title2']);
     $this->load->library('form_validation');
     //$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    
     $this->form_validation->set_rules('textarea_title2', 'Title', 'required');
    
     $this->form_validation->set_rules('description', 'Content', 'required');
    
    
        if ($this->form_validation->run() == FALSE)
        {
          $this->session->set_userdata('errors',validation_errors());
          redirect('admin/home');
        }
        else{
         $this->load->model('admin_model');
         $this->admin_model->update_content($data);
         $this->session->set_userdata('Content_Update','Update');
         redirect('admin/home');
        }  
    }
    
    //---------------------Carousel------------------------------------
    public function add_carousel() {
        $fn=$_FILES['image_path']['tmp_name'];
        list($width, $height) = getimagesize($fn);
        $config['upload_path']   = './uploads/carousel/';
        $config['allowed_types'] = 'jpeg|jpg|png'; 
        $this->load->library('upload', $config);
        
         
         if ( ! $this->upload->do_upload('image_path') || ($width != '1920' && $height != '1080')) {
            $error = array('error' => $this->upload->display_errors()); 
            $error= strip_tags($error['error']);
            $this->session->set_userdata('Error',$error);
            //$this->load->view('upload_form', $error); 
           //$this->session->set_flashdata('item', $myVar);
            $this->session->set_userdata('wrong_img', 'wrong_img');
            redirect("Admin/home");
         }
            
         else {
             $data = array('upload_data' => $this->upload->data());
             $max=$data;
             $fname=$max['upload_data']['file_name'];
             $data=$this->input->post();
             //$data['title'] = str_replace("<p>", " ",$data['textarea_title1']);
             //$data['title'] = str_replace("</p>", " ",$data['title']);
             $data['title']=str_ireplace('<p>','',$data['textarea_title1']);
	     $data['title']=str_ireplace('</p>','',$data['title']);
             $title = strlen(strip_tags($data['title']));
             if($title > 54) {
              $title = $title - 54;
              $this->session->set_userdata('exceed_title',$title);
              redirect("Admin/home");
              exit;
             }
             $data['description'] = $data['textarea_description1'];
             $data['description'] = str_replace(array('<p>','</p>'), '',$data['textarea_description1']);
             $description = strlen(strip_tags($data['description']));
             if($description > 40) {
              $description = $description - 40;
              $this->session->set_userdata('exceed_desc', $description);
              redirect("Admin/home");
              exit;
             }
             unset($data['textarea_title1']);
             unset($data['textarea_description1']);
             $data['image_path']=$fname;
             $data['created_date']=  date('d-m-Y');
             $data['str_to_time_created_date']=  strtotime(date('d-m-Y'));
             //print_r($data);exit;
                $this->load->library('form_validation');
                //$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
                //$this->form_validation->set_rules('carousel', 'Carousel Image', 'required');

                $this->form_validation->set_rules('textarea_title1', 'Title', 'required');

                $this->form_validation->set_rules('textarea_description1', 'Description', 'required');


               if ($this->form_validation->run() == FALSE)
               {
                 $this->session->set_userdata('errors',validation_errors());
                 redirect('admin/home');
               }
               else
               {
                 $this->load->model('admin_model');
                $this->admin_model->add_carousel($data);
                $this->session->set_userdata('Success','Success');
                redirect("Admin/home");
               }   
             
             
             
         }
        //print($query);
    }
    
    public function update_carousel() {
       $fn=$_FILES['image_path']['tmp_name'];
       if($fn ==''){
       $data=$this->input->post();
       $data['title'] = $data['textarea_title'];
       $title = strlen(strip_tags($data['title']));
       if($title > 54) {
        $title = $title - 54;
        $this->session->set_userdata('exceed_title',$title);
        redirect("Admin/home");
        exit;
       }
       $data['description'] = $data['textarea_description'];
       $description = strlen(strip_tags($data['description']));
       if($description > 35) {
        $description = $description - 35;
        $this->session->set_userdata('exceed_desc', $description);
        redirect("Admin/home");
        exit;
       }
       unset($data['textarea_title']);
       unset($data['textarea_description']);
       $this->load->library('form_validation');
        //$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        //$this->form_validation->set_rules('category', 'Category', 'required|in_list[Recommended,Books,Magzines]');

        $this->form_validation->set_rules('textarea_title', 'Title', 'required');

        $this->form_validation->set_rules('textarea_description', 'Description', 'required');


       if ($this->form_validation->run() == FALSE)
       {
         $this->session->set_userdata('errors',validation_errors());
         redirect('admin/home');
       }
       else
       {
         $this->load->model('admin_model');
        $this->admin_model->update_carousel($data);
        $this->session->set_userdata('Update','Update');
        redirect("Admin/home");
       }
       
       }else{
        list($width, $height) = getimagesize($fn);
       $config['upload_path']   = './uploads/carousel/';
        $config['allowed_types'] = 'jpeg|jpg|png'; 
        $this->load->library('upload', $config);
        
         
         if ( ! $this->upload->do_upload('image_path') || ($width != '1920' && $height != '1080')) {
            $error = array('error' => $this->upload->display_errors()); 
            $error= strip_tags($error['error']);
            $this->session->set_userdata('Error',$error);
            //$this->load->view('upload_form', $error); 
           //$this->session->set_flashdata('item', $myVar);
            $this->session->set_userdata('wrong_img', 'wrong_img');
            redirect("Admin/home");
         }
            
         else {
             $data = array('upload_data' => $this->upload->data());
             $max=$data;
             $fname=$max['upload_data']['file_name'];
             $data=$this->input->post();
             $data['title'] = $data['textarea_title'];
             $data['description'] = $data['textarea_description'];
             unset($data['textarea_title']);
             unset($data['textarea_description']);
             $data['image_path']=$fname;
             $this->load->library('form_validation');
        //$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        //$this->form_validation->set_rules('category', 'Category', 'required|in_list[Recommended,Books,Magzines]');

        $this->form_validation->set_rules('textarea_title', 'Title', 'required');

        $this->form_validation->set_rules('textarea_description', 'Description', 'required');


       if ($this->form_validation->run() == FALSE)
       {
         $this->session->set_userdata('errors',validation_errors());
         redirect('admin/home');
       }
       else
       {
         $this->load->model('admin_model');
        $this->admin_model->update_carousel($data);
        $this->session->set_userdata('Update','Update');
        redirect("Admin/home");
       }
         }    
       }   
    }
    
    public function delete_carousel() {
        $data=  $this->input->post();
        $this->load->model('admin_model');
        $this->admin_model->delete_carousel($data);
        $this->session->set_userdata('Delete','Delete');
        redirect('admin/home');
    }
    
    //-------------------------Our Tour Title---------------------
    public function update_our_tour() {
        $data=  $this->input->post();
        $data['content'] = $data['textarea_content'];
        $title = strlen(strip_tags($data['content']));
        if($title > 90) {
          $title = $title - 90;
          $this->session->set_userdata('exceed_our_tour',$title);
          redirect("Admin/home");
          exit;
        }
        unset($data['textarea_content']);
        $this->load->library('form_validation');
        $this->form_validation->set_rules('textarea_content', 'Our Tour Content', 'required');


        if ($this->form_validation->run() == FALSE)
        {
        $this->session->set_userdata('errors',validation_errors());
        redirect('admin/home');
        }
        else
        {
        $this->load->model('admin_model');
        $this->admin_model->update_our_tour($data);
        $this->session->set_userdata('Update_ot','Update_ot');
        redirect('admin/home');
        }
    }

    public function otd_update() {
       $fn=$_FILES['image_path']['tmp_name'];
       list($width, $height) = getimagesize($fn);
       if($fn ==''){
       $data=$this->input->post();
       
       $this->load->library('form_validation');
        //$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        //$this->form_validation->set_rules('category', 'Category', 'required|in_list[Recommended,Books,Magzines]');

        $this->form_validation->set_rules('title', 'Our Tour Details Title', 'required');

       if ($this->form_validation->run() == FALSE)
       {
         $this->session->set_userdata('errors',validation_errors());
         redirect('admin/home');
       }
       else
       {
         $this->load->model('admin_model');
        $this->admin_model->update_otd($data);
        $this->session->set_userdata('Update_otd','Update_otd');
        redirect("Admin/home");
       }
       
       }else{
       $config['upload_path']   = './uploads/home_our_tour/';
        $config['allowed_types'] = 'jpeg|jpg|png'; 
        $this->load->library('upload', $config);
        
         
         if ( ! $this->upload->do_upload('image_path') || ($width != '443' && $height != '575') || ($width != '443' && $height != '674')) {
            $error = array('error' => $this->upload->display_errors()); 
            $error= strip_tags($error['error']);
            $this->session->set_userdata('Error',$error);
            //$this->load->view('upload_form', $error); 
            //$this->session->set_flashdata('item', $myVar);
            $this->session->set_userdata('wrong_img2', 'wrong_img2');
            redirect("Admin/home");
          }
            
         else {
             $data = array('upload_data' => $this->upload->data());
             $max=$data;
             $fname=$max['upload_data']['file_name'];
             $data=$this->input->post();
             $data['image_path']=$fname;
             $this->load->library('form_validation');
        //$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        //$this->form_validation->set_rules('category', 'Category', 'required|in_list[Recommended,Books,Magzines]');

        $this->form_validation->set_rules('title', 'Our Tour Details Title', 'required');


       if ($this->form_validation->run() == FALSE)
       {
         $this->session->set_userdata('errors',validation_errors());
         redirect('admin/home');
       }
       else
       {
         $this->load->model('admin_model');
        $this->admin_model->update_otd($data);
        $this->session->set_userdata('Update_otd','Update_otd');
        redirect("Admin/home");
       }
         }    
       }
    }

//--------------------------------About Andaman--------------------------
    public function aa_update() {
       $fn=$_FILES['image_path']['tmp_name'];
       list($width, $height) = getimagesize($fn);
       if($fn ==''){
       $data=$this->input->post();
        $data['content'] = $data['textarea_content2'];
        unset($data['textarea_content2']);
        $title = strlen(strip_tags($data['content']));
        if($title > 163) {
          $title = $title - 163;
          $this->session->set_userdata('exceed_aa',$title);
          redirect("Admin/home");
          exit;
        }
       $this->load->library('form_validation');
        //$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        //$this->form_validation->set_rules('category', 'Category', 'required|in_list[Recommended,Books,Magzines]');

        $this->form_validation->set_rules('textarea_content2', 'About Andaman', 'required');

       if ($this->form_validation->run() == FALSE)
       {
         $this->session->set_userdata('errors',validation_errors());
         redirect('admin/home');
       }
       else
       {
        $this->load->model('admin_model');
        $this->admin_model->update_aa($data);
        $this->session->set_userdata('Update_aa','Update_aa');
        redirect("Admin/home");
       }
       
       }else{
       $config['upload_path']   = './uploads/about_andaman/';
        $config['allowed_types'] = 'jpeg|jpg|png'; 
        $this->load->library('upload', $config);
        
         
         if ( ! $this->upload->do_upload('image_path') || ($width != '1920' && $height != '716')) {
            $error = array('error' => $this->upload->display_errors()); 
            $error= strip_tags($error['error']);
            $this->session->set_userdata('Error',$error);
            //$this->load->view('upload_form', $error); 
            //$this->session->set_flashdata('item', $myVar);
            $this->session->set_userdata('wrong_img2', 'wrong_img2');
            redirect("Admin/home");
          }
            
         else {
             $data = array('upload_data' => $this->upload->data());
             $max=$data;
             $fname=$max['upload_data']['file_name'];
             $data=$this->input->post();
             $data['content'] = $data['textarea_content2'];
             $data['image_path']=$fname;
             $this->load->library('form_validation');
        //$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        //$this->form_validation->set_rules('category', 'Category', 'required|in_list[Recommended,Books,Magzines]');

        $this->form_validation->set_rules('textarea_content2', 'About Andaman Content', 'required');


       if ($this->form_validation->run() == FALSE)
       {
         $this->session->set_userdata('errors',validation_errors());
         redirect('admin/home');
       }
       else
       {
         $this->load->model('admin_model');
        $this->admin_model->update_aa($data);
        $this->session->set_userdata('Update_aa','Update_aa');
        redirect("Admin/home");
       }
         }    
       }
    }

    //---------------Update Acivities---------------------------------------
    public function ac_update() {
        $data=  $this->input->post();
        $data['title'] = $data['textarea_title3'];
        $title = strlen(strip_tags($data['title']));
        if($title > 165) {
          $title = $title - 165;
          $this->session->set_userdata('exceed_ac_title',$title);
          redirect("Admin/home");
          exit;
        }
        unset($data['textarea_title3']);
        $this->load->library('form_validation');
        $this->form_validation->set_rules('textarea_title3', 'Activities Title', 'required');


        if ($this->form_validation->run() == FALSE)
        {
        $this->session->set_userdata('errors',validation_errors());
        redirect('admin/home');
        }
        else
        {
        $this->load->model('admin_model');
        $this->admin_model->update_activities($data);
        $this->session->set_userdata('Update_ac','Update_ac');
        redirect('admin/home');
        }
    }

    //--------------------------------Trip Planner--------------------------
    public function tp_update() {
        $fn=$_FILES['image_path']['tmp_name'];
        list($width, $height) = getimagesize($fn);
        if($fn ==''){
        $data=$this->input->post();
        $data['content'] = $data['textarea_title4'];
        $title = strlen(strip_tags($data['content']));
        if($title > 165) {
          $title = $title - 165;
          $this->session->set_userdata('exceed_tp',$title);
          redirect("Admin/home");
          exit;
        }
        unset($data['textarea_title4']);
        $this->load->library('form_validation');
        $this->form_validation->set_rules('textarea_title4', 'Trip Planner', 'required');

        if ($this->form_validation->run() == FALSE)
        {
         $this->session->set_userdata('errors',validation_errors());
         redirect('admin/home');
        }
        else
        {
         $this->load->model('admin_model');
        $this->admin_model->update_tp($data);
        $this->session->set_userdata('Update_tp','Update_tp');
        redirect("Admin/home");
        }
       
       }else{
       $config['upload_path']   = './uploads/trip_planner/';
        $config['allowed_types'] = 'jpeg|jpg|png'; 
        $this->load->library('upload', $config);
        
         
         if ( ! $this->upload->do_upload('image_path') || ($width != '1920' && $height != '716')) {
            $error = array('error' => $this->upload->display_errors()); 
            $error= strip_tags($error['error']);
            $this->session->set_userdata('Error',$error);
            //$this->load->view('upload_form', $error); 
            //$this->session->set_flashdata('item', $myVar);
            $this->session->set_userdata('wrong_img2', 'wrong_img2');
            redirect("Admin/home");
          }
            
         else {
             $data = array('upload_data' => $this->upload->data());
             $max=$data;
             $fname=$max['upload_data']['file_name'];
             $data=$this->input->post();
             $data['content'] = $data['textarea_title4'];
             $data['image_path']=$fname;
             //print_r($data);exit;
             $this->load->library('form_validation');
        //$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        //$this->form_validation->set_rules('category', 'Category', 'required|in_list[Recommended,Books,Magzines]');

        $this->form_validation->set_rules('textarea_title4', 'Trip Planner Title', 'required');


       if ($this->form_validation->run() == FALSE)
       {
         $this->session->set_userdata('errors',validation_errors());
         redirect('admin/home');
       }
       else
       {
         $this->load->model('admin_model');
        $this->admin_model->update_tp($data);
        $this->session->set_userdata('Update_tp','Update_tp');
        redirect("Admin/home");
       }
         }    
       }
    }

//-------------------------Our Events Title---------------------
    public function update_our_events() {
        $data=  $this->input->post();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('content', 'Our Events Content', 'required');


        if ($this->form_validation->run() == FALSE)
        {
        $this->session->set_userdata('errors',validation_errors());
        redirect('admin/home');
        }
        else
        {
        $this->load->model('admin_model');
        $this->admin_model->update_our_events($data);
        $this->session->set_userdata('Update_oe','Update_oe');
        redirect('admin/home');
        }
    }

    public function oed_update() {
       $fn=$_FILES['image_path']['tmp_name'];
       list($width, $height) = getimagesize($fn);
       if($fn ==''){
       $data=$this->input->post();
       
       $this->load->library('form_validation');
        //$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        //$this->form_validation->set_rules('category', 'Category', 'required|in_list[Recommended,Books,Magzines]');

        $this->form_validation->set_rules('title', 'Our Events Details', 'required');

       if ($this->form_validation->run() == FALSE)
       {
         $this->session->set_userdata('errors',validation_errors());
         redirect('admin/home');
       }
       else
       {
         $this->load->model('admin_model');
        $this->admin_model->update_oed($data);
        $this->session->set_userdata('Update_oed','Update_oed');
        redirect("Admin/home");
       }
       
       }else{
       $config['upload_path']   = './uploads/home_our_events/';
        $config['allowed_types'] = 'jpeg|jpg|png'; 
        $this->load->library('upload', $config);
        
         
         if ( ! $this->upload->do_upload('image_path') || ($width != '442' && $height != '306')) {
            $error = array('error' => $this->upload->display_errors()); 
            $error= strip_tags($error['error']);
            $this->session->set_userdata('Error',$error);
            //$this->load->view('upload_form', $error); 
            //$this->session->set_flashdata('item', $myVar);
            $this->session->set_userdata('wrong_img2', 'wrong_img2');
            redirect("Admin/home");
          }
            
         else {
             $data = array('upload_data' => $this->upload->data());
             $max=$data;
             $fname=$max['upload_data']['file_name'];
             $data=$this->input->post();
             $data['image_path']=$fname;
             $this->load->library('form_validation');
        //$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        //$this->form_validation->set_rules('category', 'Category', 'required|in_list[Recommended,Books,Magzines]');

        $this->form_validation->set_rules('title', 'Our Tour Events Title', 'required');


       if ($this->form_validation->run() == FALSE)
       {
         $this->session->set_userdata('errors',validation_errors());
         redirect('admin/home');
       }
       else
       {
         $this->load->model('admin_model');
        $this->admin_model->update_oed($data);
        $this->session->set_userdata('Update_oed','Update_oed');
        redirect("Admin/home");
       }
         }    
       }
    }

//---------------------About Us----------------------------

    public function about_us() {
    $data['content_sidebar']=$this->admin_model->activities();
     $data['banner']=$this->admin_model->getaboutusimages();
     $data['content']=$this->admin_model->getaboutuscontent();
     $data['faq']=$this->admin_model->getfaq();
     $data['ifaq']=$this->admin_model->getfaqimages();
     $data['iblog']=$this->admin_model->getblogimages();
     $data['blog']=$this->admin_model->getblog();
     $data['tbaner']=$this->admin_model->gettestimonialimage();
     $data['test']=$this->admin_model->gettestimonial();
     //print_r($data);exit;
     $this->load->view('about_us',$data);
    }

    public function update_aboutus_images() {
       $fn=$_FILES['image_path']['tmp_name'];
       list($width, $height) = getimagesize($fn);
       if($fn ==''  ){
            $data=$this->input->post();
            $this->load->model('admin_model');
            $this->admin_model->update_aboutus_images($data);
            $this->session->set_userdata('Update_images','Update_images');
            redirect("Admin/about_us");
       
       }else{
            $config['upload_path']   = './uploads/about_us_images/';
            $config['allowed_types'] = 'jpeg|jpg|png'; 
            $this->load->library('upload', $config);
            
             
            if ( ! $this->upload->do_upload('image_path') || ($width != '1920' && $height != '685') || ($width != '485' && $height != '685')) {
              $error = array('error' => $this->upload->display_errors()); 
              $error= strip_tags($error['error']);
              $this->session->set_userdata('Error',$error);
              //$this->load->view('upload_form', $error); 
              //$this->session->set_flashdata('item', $myVar);
              $this->session->set_userdata('wrong_img2', 'wrong_img2');
              redirect("Admin/about_us");
            }
                
            else {
                $data = array('upload_data' => $this->upload->data());
                $fname=$data['upload_data']['file_name'];
                $data=$this->input->post();
                $data['image_path']=$fname;

                $this->load->model('admin_model');
                $this->admin_model->update_aboutus_images($data);
                $this->session->set_userdata('Update_images','Update_images');
                redirect("Admin/about_us");

            }
        }
    }

    public function add_about_us_content() {
        $data=  $this->input->post();
        $data['description'] = $data['textarea_name'];
        unset($data['textarea_name']);
        //print_r($data);exit;
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Content Title', 'required');
        //$this->form_validation->set_rules('description', 'Content Description', 'required');
        if ($this->form_validation->run() == FALSE)
        {
        $this->session->set_userdata('errors',validation_errors());
        redirect('admin/about_us');
        }
        else
        {
        $this->load->model('admin_model');
        $this->admin_model->add_about_us_content($data);
        $this->session->set_userdata('add_content','add_content');
        redirect('admin/about_us');
        }
    }

    public function add_testimonial() {
      $fn=$_FILES['image_path']['tmp_name'];
      list($width, $height) = getimagesize($fn);

      $config['upload_path']   = './uploads/faq_images/';
      $config['allowed_types'] = 'jpeg|jpg|png'; 
      $this->load->library('upload', $config);
      
       
      if ( ! $this->upload->do_upload('image_path') || ($width != '400' && $height != '400')) {
        $error = array('error' => $this->upload->display_errors()); 
        $error= strip_tags($error['error']);
        $this->session->set_userdata('Error',$error);
        //$this->load->view('upload_form', $error); 
        //$this->session->set_flashdata('item', $myVar);
        $this->session->set_userdata('wrong_img2', 'wrong_img2');
        redirect("Admin/about_us");
      } else {
          $data = array('upload_data' => $this->upload->data());
          $fname=$data['upload_data']['file_name'];
          $data=$this->input->post();
          $data['image_path']=$fname;
          $this->load->library('form_validation');
          $this->form_validation->set_rules('name', 'Testimonial Name', 'required');
          $this->form_validation->set_rules('location', 'Testimonial Location', 'required');
          $this->form_validation->set_rules('comment', 'Testimonial Comment', 'required');
          if ($this->form_validation->run() == FALSE)
          {
            $this->session->set_userdata('errors',validation_errors());
            redirect('admin/about_us');
          }
          else
          {
            $this->load->model('admin_model');
            $this->admin_model->add_testimonial($data);
            $this->session->set_userdata('add_test','add_test');
            redirect('admin/about_us');
          }
       }
    }

    public function update_about_us_content() {
        $data=  $this->input->post();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Content Title', 'required');
        $this->form_validation->set_rules('description', 'Content Description', 'required');
        if ($this->form_validation->run() == FALSE)
        {
        $this->session->set_userdata('errors',validation_errors());
        redirect('admin/about_us');
        }
        else
        {
        $this->load->model('admin_model');
        $this->admin_model->update_about_us_content($data);
        $this->session->set_userdata('update_content','update_content');
        redirect('admin/about_us');
        }
    }

    public function update_testimonial() {
        $fn=$_FILES['image_path']['tmp_name'];
       list($width, $height) = getimagesize($fn);
       if($fn ==''  ){
            $data=$this->input->post();
            $this->load->model('admin_model');
            $this->admin_model->update_testimonial($data);
            $this->session->set_userdata('update_test_content','update_test_content');
            redirect('admin/about_us');
       
       }else{
            $config['upload_path']   = './uploads/faq_images/';
            $config['allowed_types'] = 'jpeg|jpg|png'; 
            $this->load->library('upload', $config);
            
             
            if ( ! $this->upload->do_upload('image_path') || ($width != '400' && $height != '400')) {
              $error = array('error' => $this->upload->display_errors()); 
              $error= strip_tags($error['error']);
              $this->session->set_userdata('Error',$error);
              //$this->load->view('upload_form', $error); 
              //$this->session->set_flashdata('item', $myVar);
              $this->session->set_userdata('wrong_img2', 'wrong_img2');
              redirect("Admin/about_us");
            }
                
            else {
                $data = array('upload_data' => $this->upload->data());
                $fname=$data['upload_data']['file_name'];
                $data=$this->input->post();
                $data['image_path']=$fname;

                $this->load->model('admin_model');
                $this->admin_model->update_testimonial($data);
                $this->session->set_userdata('update_test_content','update_test_content');
                redirect('admin/about_us');

            }
        }
    }

    public function delete_about_us_content() {
        $data=  $this->input->post();
        $this->load->model('admin_model');
        $this->admin_model->delete_about_us_content($data);
        $this->session->set_userdata('delete_content','delete_content');
        redirect('admin/about_us');
    }

    public function delete_testimonial() {
        $data=  $this->input->post();
        $this->load->model('admin_model');
        $this->admin_model->delete_testimonial($data);
        $this->session->set_userdata('delete_test','delete_test');
        redirect('admin/about_us');
    }

    public function update_blog_images() {
       $fn=$_FILES['image_path']['tmp_name'];
       list($width, $height) = getimagesize($fn);
       if($fn ==''  ){
            $data=$this->input->post();
            $this->load->model('admin_model');
            $this->admin_model->update_aboutus_images($data);
            $this->session->set_userdata('Update_images','Update_images');
            redirect("Admin/about_us");
       
       }else{
            $config['upload_path']   = './uploads/faq_images/';
            $config['allowed_types'] = 'jpeg|jpg|png'; 
            $this->load->library('upload', $config);
            
             
            if ( ! $this->upload->do_upload('image_path') || ($width != '1920' && $height != '685') || ($width != '485' && $height != '685')) {
              $error = array('error' => $this->upload->display_errors()); 
              $error= strip_tags($error['error']);
              $this->session->set_userdata('Error',$error);
              //$this->load->view('upload_form', $error); 
              //$this->session->set_flashdata('item', $myVar);
              $this->session->set_userdata('wrong_img2', 'wrong_img2');
              redirect("Admin/about_us");
            }
                
            else {
                $data = array('upload_data' => $this->upload->data());
                $fname=$data['upload_data']['file_name'];
                $data=$this->input->post();
                $data['image_path']=$fname;

                $this->load->model('admin_model');
                $this->admin_model->update_blog_images($data);
                $this->session->set_userdata('Update_blog_images','Update_blog_images');
                redirect("Admin/about_us");

            }
        }
    }

    public function add_blog() {
      $fn=$_FILES['image_path']['tmp_name'];
      list($width, $height) = getimagesize($fn);
      $config['upload_path']   = './uploads/faq_images/';
      $config['allowed_types'] = 'jpeg|jpg|png'; 
      $this->load->library('upload', $config);
      
       
      if ( ! $this->upload->do_upload('image_path') || ($width != '378' && $height != '318')) {
        $error = array('error' => $this->upload->display_errors()); 
        $error= strip_tags($error['error']);
        $this->session->set_userdata('Error',$error);
        //$this->load->view('upload_form', $error); 
        //$this->session->set_flashdata('item', $myVar);
        $this->session->set_userdata('wrong_img2', 'wrong_img2');
        redirect("Admin/about_us");
      } else {
          $data = array('upload_data' => $this->upload->data());
          $fname=$data['upload_data']['file_name'];
          $data=$this->input->post();
          $data['image_path']=$fname;
          $data['blog_date'] = date("d-m-Y", strtotime($data['blog_date']));
          $this->load->library('form_validation');
          $this->form_validation->set_rules('title', 'Blog Title', 'required');
          $this->form_validation->set_rules('blog_desc', 'Blog short description', 'required');
          $this->form_validation->set_rules('writer', 'Blog writer', 'required');
          $this->form_validation->set_rules('blog_date', 'Blog date', 'required');
          $this->form_validation->set_rules('description', 'Blog Description', 'required');
          if ($this->form_validation->run() == FALSE)
          {
          $this->session->set_userdata('errors',validation_errors());
          redirect('admin/about_us');
          }
          else
          {
          $this->load->model('admin_model');
          $this->admin_model->add_blog($data);
          $this->session->set_userdata('add_blog','add_blog');
          redirect('admin/about_us');
          }
      }
    }

    public function update_blog() {
       $fn=$_FILES['image_path']['tmp_name'];
       list($width, $height) = getimagesize($fn);
       if($fn ==''  ){
            $data=$this->input->post();
            if ($data['blog_date'] == '') {
              $data['blog_date'] = date("d-m-Y", strtotime($data['bd']));
              unset($data['bd']);
            } else {
              $data['blog_date'] = date("d-m-Y", strtotime($data['blog_date']));
              unset($data['bd']);
            }
            $this->load->model('admin_model');
            $this->admin_model->update_blog($data);
            $this->session->set_userdata('Update_blog','Update_blog');
            redirect("Admin/about_us");
       
       } else{
          $config['upload_path']   = './uploads/faq_images/';
          $config['allowed_types'] = 'jpeg|jpg|png'; 
          $this->load->library('upload', $config);
          
           
          if ( ! $this->upload->do_upload('image_path') || ($width != '378' && $height != '318')) {
            $error = array('error' => $this->upload->display_errors()); 
            $error= strip_tags($error['error']);
            $this->session->set_userdata('Error',$error);
            //$this->load->view('upload_form', $error); 
            //$this->session->set_flashdata('item', $myVar);
            $this->session->set_userdata('wrong_img2', 'wrong_img2');
            redirect("Admin/about_us");
          }
              
          else {
              $data = array('upload_data' => $this->upload->data());
              $fname=$data['upload_data']['file_name'];
              $data=$this->input->post();
              $data['image_path']=$fname;

              $this->load->model('admin_model');
              $this->admin_model->update_blog($data);
              $this->session->set_userdata('Update_blog','Update_blog');
              redirect("Admin/about_us");

          }
      }
    }

    //---------------FAQ---------------------------------------
    public function add_faq() {
        $data=  $this->input->post();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('question', 'FAQ Question', 'required');
        $this->form_validation->set_rules('answer', 'FAQ Answer', 'required');


        if ($this->form_validation->run() == FALSE)
        {
        $this->session->set_userdata('errors',validation_errors());
        redirect('admin/about_us');
        }
        else
        {
        $this->admin_model->add_faq($data);
        $this->session->set_userdata('add_faq','add_faq');
        redirect('admin/about_us');
        }
    }

    public function update_faq() {
        $data=  $this->input->post();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('question', 'FAQ Question', 'required');
        $this->form_validation->set_rules('answer', 'FAQ Answer', 'required');


        if ($this->form_validation->run() == FALSE)
        {
        $this->session->set_userdata('errors',validation_errors());
        redirect('admin/about_us');
        }
        else
        {
        $this->admin_model->update_faq($data);
        $this->session->set_userdata('update_faq','update_faq');
        redirect('admin/about_us');
        }
    }

    public function update_faq_images() {
       $fn=$_FILES['image_path']['tmp_name'];
       list($width, $height) = getimagesize($fn);
       if($fn ==''  ){
            $data=$this->input->post();
            $this->load->model('admin_model');
            $this->admin_model->update_faq_images($data);
            $this->session->set_userdata('Update_images','Update_images');
            redirect("Admin/about_us");
       
       }else{
            $config['upload_path']   = './uploads/faq_images/';
            $config['allowed_types'] = 'jpeg|jpg|png'; 
            $this->load->library('upload', $config);
            
             
            if ( ! $this->upload->do_upload('image_path') || ($width != '1920' && $height != '685') || ($width != '485' && $height != '685')) {
                $error = array('error' => $this->upload->display_errors()); 
                $error= strip_tags($error['error']);
                $this->session->set_userdata('Error',$error);
                //$this->load->view('upload_form', $error); 
                //$this->session->set_flashdata('item', $myVar);
                $this->session->set_userdata('wrong_img2','wrong_img2');
                redirect("Admin/about_us");
            }
                
            else {
                $data = array('upload_data' => $this->upload->data());
                $fname=$data['upload_data']['file_name'];
                $data=$this->input->post();
                $data['image_path']=$fname;
                $this->load->model('admin_model');
                $this->admin_model->update_faq_images($data);
                $this->session->set_userdata('Update_images','Update_images');
                redirect("Admin/about_us");

            }
        }
    }

    public function update_testimonial_image() {
       $fn=$_FILES['image_path']['tmp_name'];
       list($width, $height) = getimagesize($fn);
       if($fn ==''  ){
            $data=$this->input->post();
            $this->load->model('admin_model');
            $this->admin_model->update_testimonial_image($data);
            $this->session->set_userdata('Update_test','Update_test');
            redirect("Admin/about_us");
       
       }else{
            $config['upload_path']   = './uploads/faq_images/';
            $config['allowed_types'] = 'jpeg|jpg|png'; 
            $this->load->library('upload', $config);
            
             
            if ( ! $this->upload->do_upload('image_path') || ($width != '1920' && $height != '685')) {
                $error = array('error' => $this->upload->display_errors()); 
                $error= strip_tags($error['error']);
                $this->session->set_userdata('Error',$error);
                //$this->load->view('upload_form', $error); 
                //$this->session->set_flashdata('item', $myVar);
                $this->session->set_userdata('wrong_img2','wrong_img2');
                redirect("Admin/about_us");
            }
                
            else {
                $data = array('upload_data' => $this->upload->data());
                $fname=$data['upload_data']['file_name'];
                $data=$this->input->post();
                $data['image_path']=$fname;
                $this->load->model('admin_model');
                $this->admin_model->update_testimonial_image($data);
                $this->session->set_userdata('Update_test','Update_test');
                redirect("Admin/about_us");

            }
        }
    }

    public function delete_faq() {
        $data=  $this->input->post();
        $this->admin_model->delete_faq($data);
        $this->session->set_userdata('delete_faq','delete_faq');
        redirect('admin/about_us');
    }

    public function delete_blog() {
        $data=  $this->input->post();
        $this->admin_model->delete_blog($data);
        $this->session->set_userdata('delete_blog','delete_blog');
        redirect('admin/about_us');
    }

//-------------------About Andaman------------------------------

    public function about_andaman() {
        $data['content_sidebar']=$this->admin_model->activities();
        $data['banner']=$this->admin_model->getaboutandamanimages();
        $data['content']=$this->admin_model->getaboutandamancontent();
        $this->load->view('about_andaman',$data);
    }

    public function update_aboutandaman_images() {
       $fn=$_FILES['image_path']['tmp_name'];
       list($width, $height) = getimagesize($fn);
       if($fn ==''  ){
            $data=$this->input->post();
            $this->load->model('admin_model');
            $this->admin_model->update_aboutandaman_images($data);
            $this->session->set_userdata('Update_images','Update_images');
            redirect("Admin/about_andaman");
       
       }else{
            $config['upload_path']   = './uploads/about_andaman_images/';
            $config['allowed_types'] = 'jpeg|jpg|png'; 
            $this->load->library('upload', $config);
            
             
            if ( ! $this->upload->do_upload('image_path') || ($width != '1920' && $height != '685') || ($width != '485' && $height != '685')) {
                $error = array('error' => $this->upload->display_errors()); 
                $error= strip_tags($error['error']);
                $this->session->set_userdata('Error',$error);
                //$this->load->view('upload_form', $error); 
                //$this->session->set_flashdata('item', $myVar);
                $this->session->set_userdata('wrong_img2','wrong_img2');
                redirect("Admin/about_andaman");
            }
                
            else {
                $data = array('upload_data' => $this->upload->data());
                $fname=$data['upload_data']['file_name'];
                $data=$this->input->post();
                $data['image_path']=$fname;

                $this->load->model('admin_model');
                $this->admin_model->update_aboutandaman_images($data);
                $this->session->set_userdata('Update_images','Update_images');
                redirect("Admin/about_andaman");

            }
        }
    }

    public function add_aa() {
        $data=  $this->input->post();
        //$data['description'] = $data['textarea_name'];
        //unset($data['textarea_name']);
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Content Title', 'required');
        $this->form_validation->set_rules('description', 'Content Description', 'required');
        if ($this->form_validation->run() == FALSE)
        {
        $this->session->set_userdata('errors',validation_errors());
        redirect('admin/about_andaman');
        }
        else
        {
        $this->load->model('admin_model');
        $this->admin_model->add_about_andaman_content($data);
        $this->session->set_userdata('add_content','add_content');
        redirect('admin/about_andaman');
        }
    }

    public function update_about_andaman_content() {
        $data=  $this->input->post();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Content Title', 'required');
        $this->form_validation->set_rules('description', 'Content Description', 'required');
        if ($this->form_validation->run() == FALSE)
        {
        $this->session->set_userdata('errors',validation_errors());
        redirect('admin/about_andaman');
        }
        else
        {
        $this->load->model('admin_model');
        $this->admin_model->update_about_andaman_content($data);
        $this->session->set_userdata('update_content','update_content');
        redirect('admin/about_andaman');
        }
    }

    public function delete_aa() {
        $data=  $this->input->post();
        $this->admin_model->delete_aa($data);
        $this->session->set_userdata('delete_content','delete_content');
        redirect('admin/about_andaman');
    }

//-------------------Events------------------------------

    public function events() {
        $data['content_sidebar']=$this->admin_model->activities();
        $data['banner']=$this->admin_model->geteventimages();
        $data['content']=$this->admin_model->geteventcontent();
        $this->load->view('events',$data);
    }

    public function update_events_images() {
       $fn=$_FILES['image_path']['tmp_name'];
       list($width, $height) = getimagesize($fn);
       if($fn ==''  ){
            $data=$this->input->post();
            $this->load->model('admin_model');
            $this->admin_model->update_events_images($data);
            $this->session->set_userdata('Update_images','Update_images');
            redirect("Admin/events");
       
       }else{
            $config['upload_path']   = './uploads/event_images/';
            $config['allowed_types'] = 'jpeg|jpg|png'; 
            $this->load->library('upload', $config);
            
             
            if ( ! $this->upload->do_upload('image_path') || ($width != '1920' && $height != '685') || ($width != '485' && $height != '685')) {
                $error = array('error' => $this->upload->display_errors()); 
                $error= strip_tags($error['error']);
                $this->session->set_userdata('Error',$error);
                //$this->load->view('upload_form', $error); 
                //$this->session->set_flashdata('item', $myVar);
                $this->session->set_userdata('wrong_img2', 'wrong_img2');
                redirect("Admin/events");
            }
                
            else {
                $data = array('upload_data' => $this->upload->data());
                $fname=$data['upload_data']['file_name'];
                $data=$this->input->post();
                $data['image_path']=$fname;

                $this->load->model('admin_model');
                $this->admin_model->update_events_images($data);
                $this->session->set_userdata('Update_images','Update_images');
                redirect("Admin/events");

            }
        }
    }

    public function add_events() {
        $data=  $this->input->post();
        $data['description'] = $data['textarea_name'];
        unset($data['textarea_name']);
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Content Title', 'required');
        $this->form_validation->set_rules('textarea_name', 'Content Description', 'required');
        if ($this->form_validation->run() == FALSE)
        {
        $this->session->set_userdata('errors',validation_errors());
        redirect('admin/events');
        }
        else
        {
        $this->load->model('admin_model');
        $this->admin_model->add_events_content($data);
        $this->session->set_userdata('add_content','add_content');
        redirect('admin/events');
        }
    }

    public function update_events_content() {
        $data=  $this->input->post();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Content Title', 'required');
        $this->form_validation->set_rules('description', 'Content Description', 'required');
        if ($this->form_validation->run() == FALSE)
        {
        $this->session->set_userdata('errors',validation_errors());
        redirect('admin/events');
        }
        else
        {
        $this->load->model('admin_model');
        $this->admin_model->update_events_content($data);
        $this->session->set_userdata('update_content','update_content');
        redirect('admin/events');
        }
    }

    public function delete_event_content() {
        $data=  $this->input->post();
        $this->admin_model->delete_event_content($data);
        $this->session->set_userdata('delete_content','delete_content');
        redirect('admin/events');
    }

//-------------------Mice------------------------------

    public function mice() {
        $data['content_sidebar']=$this->admin_model->activities();
        $data['banner']=$this->admin_model->getmiceimages();
        $data['content']=$this->admin_model->getmicecontent();
        $this->load->view('mice',$data);
    }

    public function update_mice_images() {
       $fn=$_FILES['image_path']['tmp_name'];
       list($width, $height) = getimagesize($fn);
       if($fn ==''  ){
            $data=$this->input->post();
            $this->load->model('admin_model');
            $this->admin_model->update_mice_images($data);
            $this->session->set_userdata('Update_images','Update_images');
            redirect("Admin/mice");
       
       }else{
            $config['upload_path']   = './uploads/mice_images/';
            $config['allowed_types'] = 'jpeg|jpg|png'; 
            $this->load->library('upload', $config);
            
             
            if ( ! $this->upload->do_upload('image_path') || ($width != '1920' && $height != '685')) {
                $error = array('error' => $this->upload->display_errors()); 
                $error= strip_tags($error['error']);
                $this->session->set_userdata('Error',$error);
                //$this->load->view('upload_form', $error); 
                //$this->session->set_flashdata('item', $myVar);
                $this->session->set_userdata('wrong_img2', 'wrong_img2');
                redirect("Admin/mice");
            }
                
            else {
                $data = array('upload_data' => $this->upload->data());
                $fname=$data['upload_data']['file_name'];
                $data=$this->input->post();
                $data['image_path']=$fname;

                $this->load->model('admin_model');
                $this->admin_model->update_mice_images($data);
                $this->session->set_userdata('Update_images','Update_images');
                redirect("Admin/mice");

            }
        }
    }

    public function add_mice() {
        $data=  $this->input->post();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Content Title', 'required');
        $this->form_validation->set_rules('description', 'Content Description', 'required');
        if ($this->form_validation->run() == FALSE)
        {
        $this->session->set_userdata('errors',validation_errors());
        redirect('admin/mice');
        }
        else
        {
        $this->load->model('admin_model');
        $this->admin_model->add_mice_content($data);
        $this->session->set_userdata('add_content','add_content');
        redirect('admin/mice');
        }
    }

    public function update_mice_content() {
        $data=  $this->input->post();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Content Title', 'required');
        $this->form_validation->set_rules('description', 'Content Description', 'required');
        if ($this->form_validation->run() == FALSE)
        {
        $this->session->set_userdata('errors',validation_errors());
        redirect('admin/mice');
        }
        else
        {
        $this->load->model('admin_model');
        $this->admin_model->update_mice_content($data);
        $this->session->set_userdata('update_content','update_content');
        redirect('admin/mice');
        }
    }

    public function delete_mice() {
        $data=  $this->input->post();
        $this->admin_model->delete_mice($data);
        $this->session->set_userdata('delete_content','delete_content');
        redirect('admin/mice');
    }

//-------------------Destination Wedding------------------------------

    public function destination_wedding() {
        $data['content_sidebar']=$this->admin_model->activities();
        $data['banner']=$this->admin_model->getdestinationweddingimages();
        $data['content']=$this->admin_model->getdestinationweddingcontent();
        $this->load->view('destination_wedding',$data);
    }

    public function update_destination_wedding_images() {
       $fn=$_FILES['image_path']['tmp_name'];
       list($width, $height) = getimagesize($fn);
       if($fn ==''  ){
            $data=$this->input->post();
            $this->load->model('admin_model');
            $this->admin_model->update_destination_wedding_images($data);
            $this->session->set_userdata('Update_images','Update_images');
            redirect("Admin/destination_wedding");
       
       }else{
            $config['upload_path']   = './uploads/destination_wedding_images/';
            $config['allowed_types'] = 'jpeg|jpg|png'; 
            $this->load->library('upload', $config);
            
             
            if ( ! $this->upload->do_upload('image_path') || ($width != '1920' && $height != '685')) {
                $error = array('error' => $this->upload->display_errors()); 
                $error= strip_tags($error['error']);
                $this->session->set_userdata('Error',$error);
                //$this->load->view('upload_form', $error); 
                //$this->session->set_flashdata('item', $myVar);
                $this->session->set_userdata('wrong_img2', 'wrong_img2');
                redirect("Admin/destination_wedding");
            }
                
            else {
                $data = array('upload_data' => $this->upload->data());
                $fname=$data['upload_data']['file_name'];
                $data=$this->input->post();
                $data['image_path']=$fname;

                $this->load->model('admin_model');
                $this->admin_model->update_destination_wedding_images($data);
                $this->session->set_userdata('Update_images','Update_images');
                redirect("Admin/destination_wedding");

            }
        }
    }

    public function add_destination_wedding() {
        $data=  $this->input->post();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Content Title', 'required');
        $this->form_validation->set_rules('description', 'Content Description', 'required');
        if ($this->form_validation->run() == FALSE)
        {
        $this->session->set_userdata('errors',validation_errors());
        redirect('admin/destination_wedding');
        }
        else
        {
        $this->load->model('admin_model');
        $this->admin_model->add_destination_wedding_content($data);
        $this->session->set_userdata('add_content','add_content');
        redirect('admin/destination_wedding');
        }
    }

    public function update_destination_wedding_content() {
        $data=  $this->input->post();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Content Title', 'required');
        $this->form_validation->set_rules('description', 'Content Description', 'required');
        if ($this->form_validation->run() == FALSE)
        {
        $this->session->set_userdata('errors',validation_errors());
        redirect('admin/destination_wedding');
        }
        else
        {
        $this->load->model('admin_model');
        $this->admin_model->update_destination_wedding_content($data);
        $this->session->set_userdata('update_content','update_content');
        redirect('admin/destination_wedding');
        }
    }

    public function delete_destination_wedding_content() {
        $data=  $this->input->post();
        $this->admin_model->delete_destination_wedding_content($data);
        $this->session->set_userdata('delete_content','delete_content');
        redirect('admin/destination_wedding');
    }

//-------------------Eco Tour------------------------------

    public function eco_tour() {
        $data['content_sidebar']=$this->admin_model->activities();
        $data['banner']=$this->admin_model->getecotourimages();
        $data['content']=$this->admin_model->getecotourcontent();
        $this->load->view('eco_tour',$data);
    }

    public function update_eco_tour_images() {
       $fn=$_FILES['image_path']['tmp_name'];
       list($width, $height) = getimagesize($fn);
       if($fn ==''  ){
            $data=$this->input->post();
            $this->load->model('admin_model');
            $this->admin_model->update_eco_tour_images($data);
            $this->session->set_userdata('Update_images','Update_images');
            redirect("Admin/eco_tour");
       
       }else{
            $config['upload_path']   = './uploads/eco_tour_images/';
            $config['allowed_types'] = 'jpeg|jpg|png'; 
            $this->load->library('upload', $config);
            
             
            if ( ! $this->upload->do_upload('image_path')|| ($width != '1920' && $height != '685')) {
                $error = array('error' => $this->upload->display_errors()); 
                $error= strip_tags($error['error']);
                $this->session->set_userdata('Error',$error);
                //$this->load->view('upload_form', $error); 
                //$this->session->set_flashdata('item', $myVar);
                $this->session->set_userdata('wrong_img2', 'wrong_img2');
                redirect("Admin/eco_tour");
            }
                
            else {
                $data = array('upload_data' => $this->upload->data());
                $fname=$data['upload_data']['file_name'];
                $data=$this->input->post();
                $data['image_path']=$fname;

                $this->load->model('admin_model');
                $this->admin_model->update_eco_tour_images($data);
                $this->session->set_userdata('Update_images','Update_images');
                redirect("Admin/eco_tour");

            }
        }
    }

    public function add_eco_tour() {
        $data=  $this->input->post();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Content Title', 'required');
        $this->form_validation->set_rules('description', 'Content Description', 'required');
        if ($this->form_validation->run() == FALSE)
        {
        $this->session->set_userdata('errors',validation_errors());
        redirect('admin/eco_tour');
        }
        else
        {
        $this->load->model('admin_model');
        $this->admin_model->add_eco_tour_content($data);
        $this->session->set_userdata('add_content','add_content');
        redirect('admin/eco_tour');
        }
    }

    public function update_eco_tour_content() {
        $data=  $this->input->post();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Content Title', 'required');
        $this->form_validation->set_rules('description', 'Content Description', 'required');
        if ($this->form_validation->run() == FALSE)
        {
        $this->session->set_userdata('errors',validation_errors());
        redirect('admin/eco_tour');
        }
        else
        {
        $this->load->model('admin_model');
        $this->admin_model->update_eco_tour_content($data);
        $this->session->set_userdata('update_content','update_content');
        redirect('admin/eco_tour');
        }
    }

    public function delete_eco_tour_content() {
        $data=  $this->input->post();
        $this->admin_model->delete_eco_tour_content($data);
        $this->session->set_userdata('delete_content','delete_content');
        redirect('admin/eco_tour');
    }

//-------------------Trip Planner------------------------------

    public function trip_planner() {
        $data['content_sidebar']=$this->admin_model->activities();
        $data['banner']=$this->admin_model->gettripplannerimages();
        $data['content']=$this->admin_model->gettripplannercontent();
        $this->load->view('trip_planner',$data);
    }

    public function update_trip_planner_images() {
       $fn=$_FILES['image_path']['tmp_name'];
       list($width, $height) = getimagesize($fn);
       if($fn ==''  ){
            $data=$this->input->post();
            $this->load->model('admin_model');
            $this->admin_model->update_trip_planner_images($data);
            $this->session->set_userdata('Update_images','Update_images');
            redirect("Admin/trip_planner");
       
       }else{
            $config['upload_path']   = './uploads/trip_planner_images/';
            $config['allowed_types'] = 'jpeg|jpg|png'; 
            $this->load->library('upload', $config);
            
             
            if ( ! $this->upload->do_upload('image_path') || ($width != '1920' && $height != '685')) {
              $error = array('error' => $this->upload->display_errors()); 
              $error= strip_tags($error['error']);
              $this->session->set_userdata('Error',$error);
              //$this->load->view('upload_form', $error); 
              //$this->session->set_flashdata('item', $myVar);
              $this->session->set_userdata('wrong_img2', 'wrong_img2');
              redirect("Admin/trip_planner");
            }
                
            else {
                $data = array('upload_data' => $this->upload->data());
                $fname=$data['upload_data']['file_name'];
                $data=$this->input->post();
                $data['image_path']=$fname;

                $this->load->model('admin_model');
                $this->admin_model->update_trip_planner_images($data);
                $this->session->set_userdata('Update_images','Update_images');
                redirect("Admin/trip_planner");

            }
        }
    }

    public function update_trip_planner_content() {
        $data=  $this->input->post();
        $data['title'] = $data['textarea_title5'];
        unset($data['textarea_title5']);
        $this->load->library('form_validation');
        $this->form_validation->set_rules('textarea_title5', 'Content Title', 'required');
        $this->form_validation->set_rules('description', 'Content Description', 'required');
        if ($this->form_validation->run() == FALSE)
        {
        $this->session->set_userdata('errors',validation_errors());
        redirect('admin/trip_planner');
        }
        else
        {
        $this->load->model('admin_model');
        $this->admin_model->update_trip_planner_content($data);
        $this->session->set_userdata('update_content','update_content');
        redirect('admin/trip_planner');
        }
    }

    public function add_trip_planner() {
        $data=  $this->input->post();
        //$data['description'] = $data['textarea_name'];
        //unset($data['textarea_name']);
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Content Title', 'required');
        $this->form_validation->set_rules('description', 'Content Description', 'required');
        if ($this->form_validation->run() == FALSE)
        {
        $this->session->set_userdata('errors',validation_errors());
        redirect('admin/trip_planner');
        }
        else
        {
        $this->load->model('admin_model');
        $this->admin_model->add_trip_planner_content($data);
        $this->session->set_userdata('add_content','add_content');
        redirect('admin/trip_planner');
        }
    }

    public function delete_trip_planner() {
        $data=  $this->input->post();
        $this->load->model('admin_model');
        $this->admin_model->delete_trip_planner($data);
        $this->session->set_userdata('delete_content','delete_content');
        redirect('admin/trip_planner');
    }

//-------------------Activities-------------------------------

    public function activities() {
        $data['content_sidebar']=$this->admin_model->activities();
        $data['content']=$this->admin_model->activities();
        $this->load->view('activities',$data);
    }

    public function add_activity() {
        $fn=$_FILES['image_path']['tmp_name'];
        list($width, $height) = getimagesize($fn);
        $config['upload_path']   = './uploads/activities/';
        $config['allowed_types'] = 'jpeg|jpg|png'; 
        $this->load->library('upload', $config);
         
        if ( ! $this->upload->do_upload('image_path') || ($width != '378' && $height != '318')) {
          $error = array('error' => $this->upload->display_errors()); 
          $error= strip_tags($error['error']);
          $this->session->set_userdata('Error',$error);
          //$this->load->view('upload_form', $error); 
          //$this->session->set_flashdata('item', $myVar);
          $this->session->set_userdata('wrong_img2', 'wrong_img2');
          redirect("Admin/activities");
        }
            
        else {
            $data = array('upload_data' => $this->upload->data());
            $fname=$data['upload_data']['file_name'];
            $data=$this->input->post();
            $data['image_path']=$fname;
            //$data['activity_type'] = str_replace(" ","_",$data['activity_type']);
            $this->load->library('form_validation');
            $this->form_validation->set_rules('type', 'Activity Title', 'required');
            if ($this->form_validation->run() == FALSE)
            {
            $this->session->set_userdata('errors',validation_errors());
            redirect('admin/activities');
            }
            else
            {
            $this->load->model('admin_model');
            //print_r($data);exit;
            $this->admin_model->add_activity($data);
            $this->session->set_userdata('add_content','add_content');
            redirect('admin/activities');
            }
        }
    }

    public function update_activity() {
        $fn=$_FILES['image_path']['tmp_name'];
        list($width, $height) = getimagesize($fn);
       if($fn ==''){
            $data=$this->input->post();
            $this->load->model('admin_model');
            $this->admin_model->update_activity($data);
            $this->session->set_userdata('Update_images','Update_images');
            redirect("Admin/activities");
       
       }else{
            $config['upload_path']   = './uploads/activities/';
            $config['allowed_types'] = 'jpeg|jpg|png'; 
            $this->load->library('upload', $config);
            
             
            if ( ! $this->upload->do_upload('image_path') || ($width != '378' && $height != '318')) {
          $error = array('error' => $this->upload->display_errors()); 
          $error= strip_tags($error['error']);
          $this->session->set_userdata('Error',$error);
          //$this->load->view('upload_form', $error); 
          //$this->session->set_flashdata('item', $myVar);
          $this->session->set_userdata('wrong_img2', 'wrong_img2');
          redirect("Admin/activities");
        }
                
            else {
                $data = array('upload_data' => $this->upload->data());
                $fname=$data['upload_data']['file_name'];
                $data=$this->input->post();
                $data['image_path']=$fname;
                $this->load->model('admin_model');
                $this->admin_model->update_activity($data);
                $this->session->set_userdata('Update_images','Update_images');
                redirect("Admin/activities");
            }
        }
    }

    public function delete_activity() {
        $data=  $this->input->post();
        $this->admin_model->delete_activity($data);
        $this->session->set_userdata('delete_content','delete_content');
        redirect('admin/activities');
    }

//-------------------Gallery-----------------------------
    public function activity($type) {
        $data['content_sidebar']=$this->admin_model->activities();
        $data['content2']=$this->admin_model->getactivitycontent($type);
        $data['banner']=$this->admin_model->getactivityimages($type);
        $data['gallery']=$this->admin_model->getactivitygallery($type);
        $data['type'] = $type;
        $this->load->view('activity',$data);
    }

    public function add_activity_content() {
        $data=  $this->input->post();
        $activity_type = $data['activity_type'];
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Content Title', 'required');
        $this->form_validation->set_rules('description', 'Content Description', 'required');
        if ($this->form_validation->run() == FALSE)
        {
        $this->session->set_userdata('errors',validation_errors());
        redirect('admin/activity/'.$activity_type);
        }
        else
        {
        $this->load->model('admin_model');
        $this->admin_model->add_activity_content($data);
        $this->session->set_userdata('add_content','add_content');
        redirect('admin/activity/'.$activity_type);
        }
    }

    public function update_activity_content() {
        $data=  $this->input->post();
        $activity_type = $data['activity_type'];
        $this->load->library('form_validation');
        $this->form_validation->set_rules('description', 'Activity Content', 'required');


        if ($this->form_validation->run() == FALSE)
        {
        $this->session->set_userdata('errors',validation_errors());
        redirect('admin/activity/'.$activity_type);
        }
        else
        {
        $this->admin_model->update_activity_content($data);
        $this->session->set_userdata('update_content','update_content');
        redirect('admin/activity/'.$activity_type);
        }
    }

    public function delete_activity_content() {
        $data=  $this->input->post();
        $activity_type = $data['activity_type'];
        $this->admin_model->delete_activity_content($data);
        $this->session->set_userdata('delete_content','delete_content');
        redirect('admin/activity/'.$activity_type);
    }

    public function update_activity_images() {
       $fn=$_FILES['image_path']['tmp_name'];
       list($width, $height) = getimagesize($fn);
       if($fn ==''){
       $data=$this->input->post();
       $activity_type = $data['activity_type'];
       $this->load->library('form_validation');
        //$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        //$this->form_validation->set_rules('category', 'Category', 'required|in_list[Recommended,Books,Magzines]');

        $this->form_validation->set_rules('description', 'Activity Details', 'required');

       if ($this->form_validation->run() == FALSE)
       {
         $this->session->set_userdata('errors',validation_errors());
         redirect('admin/activity/'.$activity_type);
       }
       else
       {
        $this->admin_model->update_activity_images($data);
        $this->session->set_userdata('update_content','update_content');
        redirect("Admin/activity/".$activity_type);
       }
       
       }else{
        $data=$this->input->post();
        $activity_type = $data['activity_type'];
        $config['upload_path']   = './uploads/gallery_images/';
        $config['allowed_types'] = 'jpeg|jpg|png'; 
        $this->load->library('upload', $config);
        
         
         if (! $this->upload->do_upload('image_path') || ($width != '1920' && $height != '685') || ($width != '485' && $height != '685')) {
            $error = array('error' => $this->upload->display_errors()); 
            $error= strip_tags($error['error']);
            $this->session->set_userdata('Error',$error);
              $this->session->set_userdata('wrong_img2', 'wrong_img2');
            redirect("Admin/activity/".$activity_type);
         }
            
         else {
             $data = array('upload_data' => $this->upload->data());
             $max=$data;
             $fname=$max['upload_data']['file_name'];
             $data=$this->input->post();
             $activity_type = $data['activity_type'];
             $data['image_path']=$fname;
             $this->load->library('form_validation');
            //$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            //$this->form_validation->set_rules('category', 'Category', 'required|in_list[Recommended,Books,Magzines]');

            $this->admin_model->update_activity_images($data);
            $this->session->set_userdata('Update_images','Update_images');
            redirect("Admin/activity/".$activity_type);
           
         }    
       }
    }

    public function add_gallery_image() {
        $fn=$_FILES['image']['tmp_name'];
        list($width, $height) = getimagesize($fn);
        $data=$this->input->post();
        $activity_type = $data['activity_type'];
        $config['upload_path']   = './uploads/gallery/';
        $config['allowed_types'] = 'jpeg|jpg|png'; 
        $this->load->library('upload', $config);
        
         
         if ( ! $this->upload->do_upload('image') || ($width != '500' && $height != '343')) {
            $error = array('error' => $this->upload->display_errors()); 
            $error= strip_tags($error['error']);
            $this->session->set_userdata('Error',$error);
            //$this->load->view('upload_form', $error); 
            //$this->session->set_flashdata('item', $myVar);
            $this->session->set_userdata('wrong_img2', 'wrong_img2');
            redirect("Admin/activity/".$activity_type);
          }
            
         else {
             $data = array('upload_data' => $this->upload->data());
             $max=$data;
             $fname=$max['upload_data']['file_name'];
             $data=$this->input->post();
             $activity_type = $data['activity_type'];
             $data['image']=$fname;
             $this->load->library('form_validation');
            //$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            //$this->form_validation->set_rules('category', 'Category', 'required|in_list[Recommended,Books,Magzines]');

            $this->admin_model->add_gallery_image($data);
            $this->session->set_userdata('add_images','add_images');
            redirect("Admin/activity/".$activity_type);
           
         }


        //$this->session->set_userdata('blank_images','blank_images');
        
    }

    public function update_gallery() {
        $fn=$_FILES['image']['tmp_name'];
        list($width, $height) = getimagesize($fn);
        $data=$this->input->post();
        $activity_type = $data['activity_type'];
        $config['upload_path']   = './uploads/gallery/';
        $config['allowed_types'] = 'jpeg|jpg|png'; 
        $this->load->library('upload', $config);
        
         
         if ( ! $this->upload->do_upload('image') || ($width != '500' && $height != '343')) {
            $error = array('error' => $this->upload->display_errors()); 
            $error= strip_tags($error['error']);
            $this->session->set_userdata('Error',$error);
            //$this->load->view('upload_form', $error); 
            //$this->session->set_flashdata('item', $myVar);
            $this->session->set_userdata('wrong_img2', 'wrong_img2');
            redirect("Admin/activity/".$activity_type);
          }
            
         else {
             $data = array('upload_data' => $this->upload->data());
             $max=$data;
             $fname=$max['upload_data']['file_name'];
             $data=$this->input->post();
             $activity_type = $data['activity_type'];
             $data['image']=$fname;
             $this->load->library('form_validation');
            //$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            //$this->form_validation->set_rules('category', 'Category', 'required|in_list[Recommended,Books,Magzines]');

            $this->admin_model->update_gallery($data);
            $this->session->set_userdata('update_images','update_images');
            redirect("Admin/activity/".$activity_type);
           
         }
         
        //$this->session->set_userdata('blank_images','blank_images');
        
    }

    public function delete_gallery($type, $id) {
        $data['gallery_id'] = $id;
        $activity_type = $type;
        $this->admin_model->delete_gallery($data);
        $this->session->set_userdata('delete_images','delete_images');
        redirect("Admin/activity/".$activity_type);
    }

//----------------------Rewards------------------------------------

    public function rewards() {
        $data['content_sidebar']=$this->admin_model->activities();
        $data['rewards']=$this->admin_model->rewards();
        $data['rewards_image']=$this->admin_model->rewards_images();
        $this->load->view('rewards',$data);
    }

    public function add_rewards() {
      $fn=$_FILES['image']['tmp_name'];
        list($width, $height) = getimagesize($fn);
        $config['upload_path']   = './uploads/rewards/';
        $config['allowed_types'] = 'jpeg|jpg|png'; 
        $this->load->library('upload', $config);
        
         
         if ( ! $this->upload->do_upload('image') || ($width != '467' && $height != '700')) {
            $error = array('error' => $this->upload->display_errors()); 
            $error= strip_tags($error['error']);
            $this->session->set_userdata('Error',$error);
            //$this->load->view('upload_form', $error); 
            //$this->session->set_flashdata('item', $myVar);
            $this->session->set_userdata('wrong_img2', 'wrong_img2');
            redirect("Admin/rewards");
            exit;
          }
            
         else {
             $data = array('upload_data' => $this->upload->data());
             $max=$data;
             $fname=$max['upload_data']['file_name'];
             $data2=$this->input->post();
             $data2['image']=$fname;
             $this->load->library('form_validation');
            //$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            //$this->form_validation->set_rules('category', 'Category', 'required|in_list[Recommended,Books,Magzines]');

            $this->admin_model->add_rewards($data2);
            $this->session->set_userdata('add_images','add_images');
            redirect("Admin/rewards");
           
         }


        //$this->session->set_userdata('blank_images','blank_images');
        
    }

    public function update_rewards() {
      $fn=$_FILES['image']['tmp_name'];
      list($width, $height) = getimagesize($fn);
       if($fn ==''  ){
          $data=$this->input->post();
          $this->load->model('admin_model');
          $this->admin_model->update_rewards($data);
          $this->session->set_userdata('Update_images','Update_images');
          redirect("Admin/rewards");
     
     }else{
          $config['upload_path']   = './uploads/rewards/';
          $config['allowed_types'] = 'jpeg|jpg|png'; 
          $this->load->library('upload', $config);
          
           
          if ( ! $this->upload->do_upload('image')) {
              $error = array('error' => $this->upload->display_errors()); 
              $error= strip_tags($error['error']);
              $this->session->set_userdata('Error',$error);
              //$this->load->view('upload_form', $error); 
              //$this->session->set_flashdata('item', $myVar);
              redirect("Admin/rewards");
          }
              
          else {
              $data = array('upload_data' => $this->upload->data());
              $fname=$data['upload_data']['file_name'];
              $data=$this->input->post();
              $data['image']=$fname;

              $this->load->model('admin_model');
              $this->admin_model->update_rewards($data);
              $this->session->set_userdata('Update_images','Update_images');
              redirect("Admin/rewards");

          }
      }
         
        //$this->session->set_userdata('blank_images','blank_images');
        
    }

    public function delete_rewards() {
        $data=  $this->input->post();
        $this->admin_model->delete_rewards($data);
        $this->session->set_userdata('delete_images','delete_images');
        redirect("Admin/rewards");
    }

    public function update_rewards_image() {
      $fn=$_FILES['image']['tmp_name'];
      list($width, $height) = getimagesize($fn);
        $config['upload_path']   = './uploads/rewards_images/';
        $config['allowed_types'] = 'jpeg|jpg|png'; 
        $this->load->library('upload', $config);
        
         
         if ( ! $this->upload->do_upload('image') || ($width != '1920' && $height != '685')) {
            $error = array('error' => $this->upload->display_errors()); 
            $error= strip_tags($error['error']);
            $this->session->set_userdata('Error',$error);
            //$this->load->view('upload_form', $error); 
            //$this->session->set_flashdata('item', $myVar);
            $this->session->set_userdata('wrong_img2', 'wrong_img2');
            redirect("Admin/rewards");
          }
            
         else {
             $data = array('upload_data' => $this->upload->data());
             $max=$data;
             $fname=$max['upload_data']['file_name'];
             $data2=$this->input->post();
             //$data2['rewards_id']=$fname;
             $data2['image']=$fname;
             $this->load->library('form_validation');
            //$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            //$this->form_validation->set_rules('category', 'Category', 'required|in_list[Recommended,Books,Magzines]');

            $this->admin_model->update_rewards_image($data2);
            $this->session->set_userdata('update_images','update_images');
            redirect("Admin/rewards");
           
         }

         
        //$this->session->set_userdata('blank_images','blank_images');
        
    }

//----------------------Holiday Package--------------------------

    public function holiday_packages() {
        $data['content_sidebar']=$this->admin_model->activities();
        $data['content']=$this->admin_model->holiday_packages();
        $data['banner']=$this->admin_model->holiday_packages_banner();
        $data['content2']=$this->admin_model->holiday_packages_content();
        $this->load->view('holiday_package',$data);
    }

    public function add_holiday_package() {
        $fn=$_FILES['image']['tmp_name'];
        list($width, $height) = getimagesize($fn);
        $config['upload_path']   = './uploads/holiday_package/';
        $config['allowed_types'] = 'jpeg|jpg|png'; 
        $this->load->library('upload', $config);
        
         
        if ( ! $this->upload->do_upload('image')  || ($width != '443' && $height != '303')) {
                $error = array('error' => $this->upload->display_errors()); 
                $error= strip_tags($error['error']);
                $this->session->set_userdata('Error',$error);
                //$this->load->view('upload_form', $error); 
                //$this->session->set_flashdata('item', $myVar);
                $this->session->set_userdata('wrong_img2', 'wrong_img2');
                redirect("Admin/holiday_packages");
        }

        else {
            $data = array('upload_data' => $this->upload->data());
            $max=$data;
            $fname=$max['upload_data']['file_name'];
            $data=  $this->input->post();
            $title = trim($data['title']);
            $data['image']=$fname;
            $data['package_name'] = str_replace(" ", "_", $title);
            $this->load->library('form_validation');
            //$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            //$this->form_validation->set_rules('category', 'Category', 'required|in_list[Recommended,Books,Magzines]');

            $this->admin_model->add_holiday_package($data);
            $this->session->set_userdata('add_images','add_images');
            redirect("Admin/holiday_packages");
        }
           
    }

    public function update_holiday_package() {
        $fn=$_FILES['image']['tmp_name'];
        list($width, $height) = getimagesize($fn);
       if($fn ==''  ){
            $data=$this->input->post();
            $this->admin_model->update_holiday_package($data);
            $this->session->set_userdata('update_images','update_images');
            redirect("Admin/holiday_packages");
       
       }else{
            $config['upload_path']   = './uploads/holiday_package/';
            $config['allowed_types'] = 'jpeg|jpg|png'; 
            $this->load->library('upload', $config);
            
             
            if ( ! $this->upload->do_upload('image')  || ($width != '443' && $height != '303')) {
                $error = array('error' => $this->upload->display_errors()); 
                $error= strip_tags($error['error']);
                $this->session->set_userdata('Error',$error);
                //$this->load->view('upload_form', $error); 
                //$this->session->set_flashdata('item', $myVar);
                $this->session->set_userdata('wrong_img2', 'wrong_img2');
                redirect("Admin/holiday_packages");
            }
                
            else {
                $data = array('upload_data' => $this->upload->data());
                $fname=$data['upload_data']['file_name'];
                $data=$this->input->post();
                $data['image']=$fname;

                $this->admin_model->update_holiday_package($data);
                $this->session->set_userdata('update_images','update_images');
                redirect("Admin/holiday_packages");

            }
        }
    }

    public function delete_holiday_package() {
        $data=  $this->input->post();
        $this->admin_model->delete_holiday_package($data);
        $this->session->set_userdata('delete_images','delete_images');
        redirect('admin/holiday_packages');
    }

    public function update_holiday_image() {
        $fn=$_FILES['image_path']['tmp_name'];
        list($width, $height) = getimagesize($fn);
       if($fn ==''  ){
            $data=$this->input->post();
            $this->admin_model->update_holiday_images($data);
            $this->session->set_userdata('update_images','update_images');
            redirect("Admin/holiday_packages");
       
       }else{
            $config['upload_path']   = './uploads/holiday_images/';
            $config['allowed_types'] = 'jpeg|jpg|png'; 
            $this->load->library('upload', $config);
            
             
            if ( ! $this->upload->do_upload('image_path')  || ($width != '1920' && $height != '685')) {
                $error = array('error' => $this->upload->display_errors()); 
                $error= strip_tags($error['error']);
                $this->session->set_userdata('Error',$error);
                //$this->load->view('upload_form', $error); 
                //$this->session->set_flashdata('item', $myVar);
                $this->session->set_userdata('wrong_img2', 'wrong_img2');
                redirect("Admin/holiday_packages");
            }
                
            else {
                $data = array('upload_data' => $this->upload->data());
                $fname=$data['upload_data']['file_name'];
                $data=$this->input->post();
                $data['image_path']=$fname;

                $this->admin_model->update_holiday_images($data);
                $this->session->set_userdata('update_images','update_images');
                redirect("Admin/holiday_packages");

            }
        }
    }

    public function update_holiday_content() {
    $data=  $this->input->post();
    $this->load->library('form_validation');
    $this->form_validation->set_rules('title', 'Content Title', 'required');
    $this->form_validation->set_rules('description', 'Content Description', 'required');
    if ($this->form_validation->run() == FALSE)
    {
    $this->session->set_userdata('errors',validation_errors());
    redirect('admin/holiday_packages');
    }
    else
    {
    $this->load->model('admin_model');
    $this->admin_model->update_holiday_content($data);
    $this->session->set_userdata('update_image_content','update_image_content');
    redirect('admin/holiday_packages');
    }
}
//----------------------Honeymoon Package--------------------------

    public function honeymoon_packages() {
        $data['content_sidebar']=$this->admin_model->activities();
        $data['content']=$this->admin_model->honeymoon_packages();
        $data['banner']=$this->admin_model->honeymoon_packages_banner();
        $data['content2']=$this->admin_model->honeymoon_packages_content();
        $this->load->view('honeymoon_package',$data);
    }

    public function add_honeymoon_package() {
        $fn=$_FILES['image']['tmp_name'];
        list($width, $height) = getimagesize($fn);
        $config['upload_path']   = './uploads/honeymoon_package/';
        $config['allowed_types'] = 'jpeg|jpg|png'; 
        $this->load->library('upload', $config);
        
         
        if ( ! $this->upload->do_upload('image')  || ($width != '443' && $height != '303')) {
                $error = array('error' => $this->upload->display_errors()); 
                $error= strip_tags($error['error']);
                $this->session->set_userdata('Error',$error);
                //$this->load->view('upload_form', $error); 
                //$this->session->set_flashdata('item', $myVar);
                $this->session->set_userdata('wrong_img2', 'wrong_img2');
                redirect("Admin/honeymoon_packages");
        }

        else {
            $data = array('upload_data' => $this->upload->data());
            $max=$data;
            $fname=$max['upload_data']['file_name'];
            $data=  $this->input->post();
            $title = trim($data['title']);
            $data['image']=$fname;
            $data['package_name'] = str_replace(" ", "_", $title);
            //print_r($data);exit
            $this->load->library('form_validation');
            //$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            //$this->form_validation->set_rules('category', 'Category', 'required|in_list[Recommended,Books,Magzines]');

            $this->admin_model->add_honeymoon_package($data);
            $this->session->set_userdata('add_images','add_images');
            redirect("Admin/honeymoon_packages");
        }
           
    }

    public function update_honeymoon_package() {
        $fn=$_FILES['image']['tmp_name'];
        list($width, $height) = getimagesize($fn);
       if($fn ==''  ){
            $data=$this->input->post();
            $this->admin_model->update_honeymoon_package($data);
            $this->session->set_userdata('update_images','update_images');
            redirect("Admin/honeymoon_packages");
       
       }else{
            $config['upload_path']   = './uploads/honeymoon_package/';
            $config['allowed_types'] = 'jpeg|jpg|png'; 
            $this->load->library('upload', $config);
            
             
            if ( ! $this->upload->do_upload('image')  || ($width != '443' && $height != '303')) {
                $error = array('error' => $this->upload->display_errors()); 
                $error= strip_tags($error['error']);
                $this->session->set_userdata('Error',$error);
                //$this->load->view('upload_form', $error); 
                //$this->session->set_flashdata('item', $myVar);
                $this->session->set_userdata('wrong_img2', 'wrong_img2');
                redirect("Admin/honeymoon_packages");
            }
                
            else {
                $data = array('upload_data' => $this->upload->data());
                $fname=$data['upload_data']['file_name'];
                $data=$this->input->post();
                $data['image']=$fname;

                $this->admin_model->update_honeymoon_package($data);
                $this->session->set_userdata('update_images','update_images');
                redirect("Admin/honeymoon_packages");

            }
        }
    }

    public function delete_honeymoon_package() {
        $data=  $this->input->post();
        $this->admin_model->delete_honeymoon_package($data);
        $this->session->set_userdata('delete_images','delete_images');
        redirect('admin/honeymoon_packages');
    }

    public function update_honeymoon_image() {
        $fn=$_FILES['image_path']['tmp_name'];
        list($width, $height) = getimagesize($fn);
       if($fn ==''  ){
            $data=$this->input->post();
            $this->admin_model->update_honeymoon_images($data);
            $this->session->set_userdata('update_images','update_images');
            redirect("Admin/honeymoon_packages");
       
       }else{
            $config['upload_path']   = './uploads/honeymoon_images/';
            $config['allowed_types'] = 'jpeg|jpg|png'; 
            $this->load->library('upload', $config);
            
             
            if ( ! $this->upload->do_upload('image')  || ($width != '1920' && $height != '685')) {
                $error = array('error' => $this->upload->display_errors()); 
                $error= strip_tags($error['error']);
                $this->session->set_userdata('Error',$error);
                //$this->load->view('upload_form', $error); 
                //$this->session->set_flashdata('item', $myVar);
                $this->session->set_userdata('wrong_img2', 'wrong_img2');
                redirect("Admin/honeymoon_packages");
            }
                
            else {
                $data = array('upload_data' => $this->upload->data());
                $fname=$data['upload_data']['file_name'];
                $data=$this->input->post();
                $data['image_path']=$fname;

                $this->admin_model->update_honeymoon_images($data);
                $this->session->set_userdata('update_images','update_images');
                redirect("Admin/honeymoon_packages");

            }
        }
    }

    public function update_honeymoon_content() {
        $data=  $this->input->post();
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Content Title', 'required');
        $this->form_validation->set_rules('description', 'Content Description', 'required');
        if ($this->form_validation->run() == FALSE)
        {
        $this->session->set_userdata('errors',validation_errors());
        redirect('admin/honeymoon_packages');
        }
        else
        {
        $this->load->model('admin_model');
        $this->admin_model->update_honeymoon_content($data);
        $this->session->set_userdata('update_image_content','update_image_content');
        redirect('admin/honeymoon_packages');
        }
    }

//----------------------Package---------------------------------

    public function package($type) {
        $data['content_sidebar']=$this->admin_model->activities();
        $data['content2']=$this->admin_model->getpackagecontent($type);
        $data['banner']=$this->admin_model->getpackageimages($type);
        $data['iternary']=$this->admin_model->getitenary($type);
        $data['cost']=$this->admin_model->getcost($type);
        $data['inclusions']=$this->admin_model->getinclusions($type);
        $data['gallery']=$this->admin_model->getgallery($type);
        $data['hotel']=$this->admin_model->gethotel($type);
        //$data['gallery']=$this->admin_model->getactivitygallery($type);
        $data['type'] = $type;
        $this->load->view('package',$data);
    }

    public function update_package_content() {
        $data=  $this->input->post();
        $package_name = $data['package_name'];
        $this->load->library('form_validation');
        $this->form_validation->set_rules('description', 'Package Content', 'required');


        if ($this->form_validation->run() == FALSE)
        {
        $this->session->set_userdata('errors',validation_errors());
        redirect('admin/package/'.$package_name);
        }
        else
        {
        $this->admin_model->update_package_content($data);
        $this->session->set_userdata('update_content','update_content');
        redirect('admin/package/'.$package_name);
        }
    }

    public function update_package_images() {
       $fn=$_FILES['image_path']['tmp_name'];
       list($width, $height) = getimagesize($fn);
       if($fn ==''){
            $data=$this->input->post();
            $package_name = $data['package_name'];
            $this->load->library('form_validation');
            //$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            //$this->form_validation->set_rules('category', 'Category', 'required|in_list[Recommended,Books,Magzines]');

            $this->form_validation->set_rules('description', 'Package Details', 'required');

            if ($this->form_validation->run() == FALSE)
            {
             $this->session->set_userdata('errors',validation_errors());
             redirect('admin/package/'.$package_name);
            }
            else
            {
                $this->admin_model->update_package_images($data);
                $this->session->set_userdata('update_content','update_content');
                redirect("Admin/package/".$package_name);
            }
       
       }else{
        $data=$this->input->post();
        $package_name = $data['package_name'];
        $config['upload_path']   = './uploads/package_images/';
        $config['allowed_types'] = 'jpeg|jpg|png'; 
        $this->load->library('upload', $config);
        
        if ( ! $this->upload->do_upload('image_path') || ($width != '1920' && $height != '685') || ($width != '485' && $height != '685')) {
          $error = array('error' => $this->upload->display_errors()); 
          $error= strip_tags($error['error']);
          $this->session->set_userdata('Error',$error);
          //$this->load->view('upload_form', $error); 
          //$this->session->set_flashdata('item', $myVar);
          $this->session->set_userdata('wrong_img2', 'wrong_img2');
          redirect("Admin/package/".$package_name);
        }
            
        else {
            $data = array('upload_data' => $this->upload->data());
            $max=$data;
            $fname=$max['upload_data']['file_name'];
            $data=$this->input->post();
            $package_name = $data['package_name'];
            $data['image_path']=$fname;
            $this->load->library('form_validation');
            //$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            //$this->form_validation->set_rules('category', 'Category', 'required|in_list[Recommended,Books,Magzines]');

            $this->admin_model->update_package_images($data);
            $this->session->set_userdata('Update_images','Update_images');
            redirect("Admin/package/".$package_name);
        }    
       }
    }

    public function add_iternary() {
        $data=  $this->input->post();
        $data['description'] = $data['textarea'];
        unset($data['textarea']);
        $package_name = $data['package_name'];
        $this->load->library('form_validation');
        $this->form_validation->set_rules('day', 'Iternary Day', 'required');
        $this->form_validation->set_rules('title', 'Iternary Title', 'required');
        if ($this->form_validation->run() == FALSE)
        {
        $this->session->set_userdata('errors',validation_errors());
        redirect('Admin/package/'.$package_name);
        }
        else
        {
        $this->admin_model->add_iternary($data);
        $this->session->set_userdata('add_iternary','add_iternary');
        redirect('Admin/package/'.$package_name);
        }
    }

    public function update_iternary() {
        $data=  $this->input->post();
        $package_name = $data['package_name'];
        $this->load->library('form_validation');
        $this->form_validation->set_rules('day', 'Iternary Day', 'required');
        $this->form_validation->set_rules('title', 'Iternary Title', 'required');
        $this->form_validation->set_rules('description', 'Iternary Description', 'required');
        if ($this->form_validation->run() == FALSE)
        {
        $this->session->set_userdata('errors',validation_errors());
        redirect('Admin/package/'.$package_name);
        }
        else
        {
        $this->load->model('admin_model');
        $this->admin_model->update_iternary($data);
        $this->session->set_userdata('update_iternary','update_iternary');
        redirect('Admin/package/'.$package_name);
        }
    }

    public function delete_iternary() {
        $data=  $this->input->post();
        $package_name = $data['package_name'];
        $this->admin_model->delete_iternary($data);
        $this->session->set_userdata('delete_iternary','delete_iternary');
        redirect('Admin/package/'.$package_name);
    }

    public function add_cost() {
        $data=  $this->input->post();
        $package_name = $data['package_name'];
        
        $this->admin_model->add_cost($data);
        $this->session->set_userdata('add_cost','add_cost');
        redirect('Admin/package/'.$package_name);
    }

    public function update_cost() {
        $data=  $this->input->post();
        $package_name = $data['package_name'];
        
        $this->admin_model->update_cost($data);
        $this->session->set_userdata('update_cost','update_cost');
        redirect('Admin/package/'.$package_name);
        
    }

    public function delete_cost() {
        $data=  $this->input->post();
        $package_name = $data['package_name'];
        $this->admin_model->delete_cost($data);
        $this->session->set_userdata('delete_cost','delete_cost');
        redirect('Admin/package/'.$package_name);
    }

    public function add_inclusion() {
        $data=  $this->input->post();
        $data['description'] = $data['textarea_name'];
        unset($data['textarea_name']);
        $package_name = $data['package_name'];
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'Inclusion Title', 'required');
        if ($this->form_validation->run() == FALSE)
        {
        $this->session->set_userdata('errors',validation_errors());
        redirect('Admin/package/'.$package_name);
        }
        else
        {
        $this->admin_model->add_inclusion($data);
        $this->session->set_userdata('add_inclusion','add_inclusion');
        redirect('Admin/package/'.$package_name);
        }
    }

    public function update_inclusions() {
        $data=  $this->input->post();
        $package_name = $data['package_name'];
        
        $this->admin_model->update_inclusions($data);
        $this->session->set_userdata('update_inclusion','update_inclusion');
        redirect('Admin/package/'.$package_name);
        
    }

    public function delete_inclusions() {
        $data=  $this->input->post();
        $package_name = $data['package_name'];
        $this->admin_model->delete_inclusions($data);
        $this->session->set_userdata('delete_inclusion','delete_inclusion');
        redirect('Admin/package/'.$package_name);
    }

    public function add_package_gallery() {
        $fn=$_FILES['image']['tmp_name'];
        list($width, $height) = getimagesize($fn);
        $data=$this->input->post();
        $package_name = $data['package_name'];
        $config['upload_path']   = './uploads/package_gallery/';
        $config['allowed_types'] = 'jpeg|jpg|png'; 
        $this->load->library('upload', $config);
         
         if ( ! $this->upload->do_upload('image') || ($width != '600' && $height != '419')) {
          $error = array('error' => $this->upload->display_errors()); 
          $error= strip_tags($error['error']);
          $this->session->set_userdata('Error',$error);
          //$this->load->view('upload_form', $error); 
          //$this->session->set_flashdata('item', $myVar);
          $this->session->set_userdata('wrong_img2', 'wrong_img2');
          redirect("Admin/package/".$package_name);
        }
            
         else {
             $data = array('upload_data' => $this->upload->data());
             $max=$data;
             $fname=$max['upload_data']['file_name'];
             $data=$this->input->post();
             $package_name = $data['package_name'];
             $data['image']=$fname;
             //print_r($data);exit;
             $this->load->library('form_validation');
            //$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            //$this->form_validation->set_rules('category', 'Category', 'required|in_list[Recommended,Books,Magzines]');

            $this->admin_model->add_package_gallery($data);
            $this->session->set_userdata('add_images','add_images');
            redirect("Admin/package/".$package_name);
           
         }


        //$this->session->set_userdata('blank_images','blank_images');
        
    }

    public function update_package_gallery() {
        $fn=$_FILES['image']['tmp_name'];
        list($width, $height) = getimagesize($fn);
        $data=$this->input->post();
        $package_name = $data['package_name'];
        $config['upload_path']   = './uploads/package_gallery/';
        $config['allowed_types'] = 'jpeg|jpg|png'; 
        $this->load->library('upload', $config);
        
         
         if ( ! $this->upload->do_upload('image') || ($width != '600' && $height != '419')) {
          $error = array('error' => $this->upload->display_errors()); 
          $error= strip_tags($error['error']);
          $this->session->set_userdata('Error',$error);
          //$this->load->view('upload_form', $error); 
          //$this->session->set_flashdata('item', $myVar);
          $this->session->set_userdata('wrong_img2', 'wrong_img2');
          redirect("Admin/package/".$package_name);
          exit;
        }
            
         else {
             $data = array('upload_data' => $this->upload->data());
             $max=$data;
             $fname=$max['upload_data']['file_name'];
             $data=$this->input->post();
             $package_name = $data['package_name'];
             $data['image']=$fname;
             $this->load->library('form_validation');
            //$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            //$this->form_validation->set_rules('category', 'Category', 'required|in_list[Recommended,Books,Magzines]');

            $this->admin_model->update_package_gallery($data);
            $this->session->set_userdata('update_images','update_images');
            redirect("Admin/package/".$package_name);
           
         }
         
        //$this->session->set_userdata('blank_images','blank_images');
        
    }

    public function delete_package_gallery() {
        $data=  $this->input->post();
        $this->admin_model->delete_package_gallery($data);
        $this->session->set_userdata('delete_images','delete_images');
        redirect("Admin/package/".$package_name);
    }

    public function add_hotel() {
        $data=  $this->input->post();
        $data['show_name'] = str_replace(" ", "_", $data['hotel_name']);
        // $data['description'] = $data['textarea_hotel'];
        // unset($data['textarea_hotel']);
        $package_name = $data['package_name'];
        $this->load->library('form_validation');
        $this->form_validation->set_rules('hotel_name', 'hotel Title', 'required');
        if ($this->form_validation->run() == FALSE)
        {
        $this->session->set_userdata('errors',validation_errors());
        redirect('Admin/package/'.$package_name);
        }
        else
        {
        $this->admin_model->add_hotel($data);
        $this->session->set_userdata('add_hotel','add_hotel');
        redirect('Admin/package/'.$package_name);
        }
    }

    public function update_hotel() {
        $data=  $this->input->post();
        //print_r($data);exit;
        $data['show_name'] = str_replace(" ", "_", $data['hotel_name']);
        $package_name = $data['package_name'];
        $this->load->library('form_validation');
        $this->form_validation->set_rules('hotel_name', 'hotel Title', 'required');
        if ($this->form_validation->run() == FALSE)
        {
        $this->session->set_userdata('errors',validation_errors());
        redirect('Admin/package/'.$package_name);
        }
        else
        {
        $this->load->model('admin_model');
        $this->admin_model->update_hotel($data);
        $this->session->set_userdata('update_hotel','update_hotel');
        redirect('Admin/package/'.$package_name);
        }
    }

    public function delete_hotel() {
        $data=  $this->input->post();
        $package_name = $data['package_name'];
        $this->admin_model->delete_hotel($data);
        $this->session->set_userdata('delete_hotel','delete_hotel');
        redirect('Admin/package/'.$package_name);
    }

    public function hotel($type1,$type2) {
        $data['content_sidebar']=$this->admin_model->activities();
        $data['hotel']=$this->admin_model->gethotellist($type1,$type2);
        //$data['gallery']=$this->admin_model->getactivitygallery($type);
        $data['type1'] = $type1;
        $data['type2'] = $type2;
        $this->load->view('hotel_list',$data);
    }

    public function add_hotel_details() {
        $data=  $this->input->post();
        //$data['show_name'] = str_replace(" ", "_", $data['hotel_name']);
        $data['description'] = $data['textarea_hotel'];
        unset($data['textarea_hotel']);
        $package_name = $data['hotel_name'];
        $hotel_id = $data['hotel_id'];
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'hotel Title', 'required');
        if ($this->form_validation->run() == FALSE)
        {
        $this->session->set_userdata('errors',validation_errors());
        redirect('Admin/hotel/'.$package_name."/".$hotel_id);
        }
        else
        {
        $this->admin_model->add_hotel_details($data);
        $this->session->set_userdata('add_hotel','add_hotel');
        redirect('Admin/hotel/'.$package_name."/".$hotel_id);
        }
    }

    public function update_hotel_details() {
        $data=  $this->input->post();
        //print_r($data);exit;
        //$data['show_name'] = str_replace(" ", "_", $data['hotel_name']);
        $package_name = $data['hotel_name'];
        $hotel_id = $data['hotel_id'];
        $this->load->library('form_validation');
        $this->form_validation->set_rules('title', 'hotel Title', 'required');
        if ($this->form_validation->run() == FALSE)
        {
        $this->session->set_userdata('errors',validation_errors());
        redirect('Admin/hotel/'.$package_name."/".$hotel_id);
        }
        else
        {
        $this->load->model('admin_model');
        $this->admin_model->update_hotel_details($data);
        $this->session->set_userdata('update_hotel','update_hotel');
        redirect('Admin/hotel/'.$package_name."/".$hotel_id);
        }
    }

    public function delete_hotel_details() {
        $data=  $this->input->post();
        $package_name = $data['hotel_name'];
        $hotel_id = $data['hotel_id2'];
        $this->admin_model->delete_hotel_details($data);
        $this->session->set_userdata('delete_hotel','delete_hotel');
        redirect('Admin/hotel/'.$package_name."/".$hotel_id);
    }
}
