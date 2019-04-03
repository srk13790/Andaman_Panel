<?php

class Admin_model extends BI_Model{
//-----------Home Page----------------------------------------------
    public function getContent() {
        //print_r($data);exit;
        $query=$this->db->get('home_about_content');
        $data=$query->result_array();
        return $data;
    }
    
    public function update_content($data) {
       $content_id=$data['home_about_content_id'];
       $content_id = $this->encrypt->decode($content_id);
       $title=$data['title'];
       $description=$data['description'];
        
        $query=$this->db->query("UPDATE `home_about_content` SET `title`='$title',`description`='$description' WHERE `home_about_content_id`='$content_id'");
        //print($query);
    }
    
    
    public function getanimation() {
        //print_r($data);exit;
        $query=$this->db->get('animation');
        $data=$query->result_array();
        return $data;
    }
    
    public function addanimation($data) {
        //print_r($data);exit;
        $query=$this->db->insert('animation', $data);
        //print($query);
    }
    
    public function update_animation($data) {
       $animation_id=$data['animation_id'];
       $category=$data['category'];
       $video_heading=$data['video_heading'];
       $url=$data['url'];
       $source=$data['source'];
        
        $query=$this->db->query("UPDATE `animation` SET `category`='$category',`video_heading`='$video_heading',`url`='$url',`source`='$source' WHERE `animation_id`='$animation_id'");
        //print($query);
    }
    
    public function deleteanimation($data) {
        $animation_id=$data['animation_id'];
        $animation_id = $this->encrypt->decode($animation_id);
        $this->db->where('animation_id', $animation_id);
        $this->db->delete('animation');
    }
    
    public function getbooks() {
        //print_r($data);exit;
        $query=$this->db->get('books');
        $data=$query->result_array();
        return $data;
    }
    //-----------------------------------------Carousel---------------------
    public function getCarousel() {
        //print_r($data);exit;
        $query=$this->db->get('carousel');
        $data=$query->result_array();
        return $data;
    }
    
    public function add_carousel($data) {
        //print_r($data);exit;
        $query=$this->db->insert('carousel', $data);
        //print($query);
    }
    
    public function update_carousel($data) {
       $carousel_id = $this->encrypt->decode($data['carousel_id']);
       $title=$data['title'];
       
       $description=$data['description'];
       if(!isset($data['image_path'])){
        
        $query=$this->db->query("UPDATE `carousel` SET `title`='$title',`description`='$description' WHERE carousel_id='$carousel_id'");
       }else{
        $image_path=$data['image_path'];
        $query=$this->db->query("UPDATE `carousel` SET `title`='$title',`description`='$description', image_path='$image_path' WHERE carousel_id ='$carousel_id'");   
       }//print($query);
    }
    
    public function delete_carousel($data) {
        $carousel_id = $this->encrypt->decode($data['carousel_id']);
        $this->db->where('carousel_id', $carousel_id);
        $this->db->delete('carousel');
    }

    //-----------Our Tour Title----------------------------------------------
    
    public function getTour() {
        //print_r($data);exit;
        $query=$this->db->get('ourtour');
        $data=$query->result_array();
        return $data;
    }

    public function update_our_tour($data) {
       $content=$data['content'];
       
        $query=$this->db->query("UPDATE `ourtour` SET `content`='$content'");
        //print($query);
    }

    public function getTourDetails() {
        //print_r($data);exit;
        $query=$this->db->get('ourtourdetails');
        $data=$query->result_array();
        return $data;
    }

    public function update_otd($data) {
       $otd_id = $this->encrypt->decode($data['otd_id']);
       $title=$data['title'];
       if(!isset($data['image_path'])){
        
        $query=$this->db->query("UPDATE `ourtourdetails` SET `title`='$title' WHERE otd_id='$otd_id'");
       }else{
        $image_path=$data['image_path'];
        $query=$this->db->query("UPDATE `ourtourdetails` SET `title`='$title', image_path='$image_path' WHERE otd_id ='$otd_id'");   
       }//print($query);
    }

    //------------------------------About Andaman--------------------------

    public function getAboutAndaman() {
        //print_r($data);exit;
        $query=$this->db->get('about_andaman');
        $data=$query->result_array();
        return $data;
    }

    public function update_aa($data) {
       $aa_id = $this->encrypt->decode($data['aa_id']);
       $content=$data['content'];
       if(!isset($data['image_path'])){
        //print_r("UPDATE `about_andaman` SET `content`='$content' WHERE aa_id='$aa_id'");exit;
        $query=$this->db->query("UPDATE `about_andaman` SET `content`='$content' WHERE aa_id='$aa_id'");
       }else{
        $image_path=$data['image_path'];
        $query=$this->db->query("UPDATE `about_andaman` SET `content`='$content', image_path='$image_path' WHERE aa_id ='$aa_id'");   
       }//print($query);
    }

    //----------------Activities-------------------------
    public function getActivities() {
        //print_r($data);exit;
        $query=$this->db->get('home_activities');
        $data=$query->result_array();
        return $data;
    }

    public function update_activities($data) {
       $title=$data['title'];
       
        $query=$this->db->query("UPDATE `home_activities` SET `title`='$title'");
        //print($query);
    }

    //------------------------------About Andaman--------------------------

    public function getTripPlanner() {
        //print_r($data);exit;
        $query=$this->db->get('home_trip_planner');
        $data=$query->result_array();
        return $data;
    }

    public function update_tp($data) {
       $tp_id = $this->encrypt->decode($data['tp_id']);
       $content=$data['content'];
       if(!isset($data['image_path'])){
        //print("UPDATE `home_trip_planner` SET `content`='$content' WHERE tp_id`='$tp_id'");exit;
        $query=$this->db->query("UPDATE `home_trip_planner` SET `content`='$content' WHERE tp_id ='$tp_id'");
       }else{
        $image_path = $data['image_path'];
        //print("UPDATE `home_trip_planner` SET `content`='$content', image_path='$image_path' WHERE tp_id ='$tp_id'");exit;
        $query=$this->db->query("UPDATE `home_trip_planner` SET `content`='$content', image_path='$image_path' WHERE tp_id ='$tp_id'");   
       }//print($query);
    }

//-----------Our Events Title----------------------------------------------
    
    public function getEvents() {
        //print_r($data);exit;
        $query=$this->db->get('ourevents');
        $data=$query->result_array();
        return $data;
    }

    public function update_our_events($data) {
       $content=$data['content'];
       
        $query=$this->db->query("UPDATE `ourevents` SET `content`='$content'");
        //print($query);
    }

    public function getEventsDetails() {
        //print_r($data);exit;
        $query=$this->db->get('oureventsdetails');
        $data=$query->result_array();
        return $data;
    }

    public function update_oed($data) {
       $oed_id = $this->encrypt->decode($data['oed_id']);
       $title=$data['title'];
       if(!isset($data['image_path'])){
        
        $query=$this->db->query("UPDATE `oureventsdetails` SET `title`='$title' WHERE oed_id='$oed_id'");
       }else{
        $image_path=$data['image_path'];
        $query=$this->db->query("UPDATE `oureventsdetails` SET `title`='$title', image_path='$image_path' WHERE oed_id ='$oed_id'");   
       }//print($query);
    }

//---------------------About Us------------------------------------------------

    public function getaboutusimages() {
        //print_r($data);exit;
        $query=$this->db->get('about_us_images');
        $data=$query->result_array();
        return $data;
    }

    public function getaboutuscontent() {
        //print_r($data);exit;
        $query=$this->db->get('about_us_content');
        $data=$query->result_array();
        return $data;
    }

    public function gettestimonial() {
        //print_r($data);exit;
        $query=$this->db->get('testimonial');
        $data=$query->result_array();
        return $data;
    }

    public function gettestimonialimage() {
        //print_r($data);exit;
        $query=$this->db->get('testimonial_image');
        $data=$query->result_array();
        return $data;
    }

    public function update_aboutus_images($data) {
       $image_id = $this->encrypt->decode($data['image_id']);
       $content=$data['description'];
       if(!isset($data['image_path'])){
        
        $query=$this->db->query("UPDATE `about_us_images` SET `description`='$content' WHERE image_id='$image_id'");
       }else{
        $image_path=$data['image_path'];
        $query=$this->db->query("UPDATE `about_us_images` SET `description`='$content', image_path='$image_path' WHERE image_id ='$image_id'");   
       }//print($query);
    }

    public function update_testimonial_image($data) {
       $image_id = $this->encrypt->decode($data['image_id']);
       $content=$data['description'];
       if(!isset($data['image_path'])){
        
        $query=$this->db->query("UPDATE `testimonial_image` SET `description`='$content' WHERE image_id='$image_id'");
       }else{
        $image_path=$data['image_path'];
        $query=$this->db->query("UPDATE `testimonial_image` SET `description`='$content', image_path='$image_path' WHERE image_id ='$image_id'");   
       }//print($query);
    }

    public function add_about_us_content($data) {
        //print_r($data);exit;
        $query=$this->db->insert('about_us_content', $data);
        //print($query);
    }

    public function add_testimonial($data) {
        //print_r($data);exit;
        $query=$this->db->insert('testimonial', $data);
        //print($query);
    }

    public function update_about_us_content($data) {
       $content_id=$data['content_id'];
       $content_id = $this->encrypt->decode($content_id);
       $title=$data['title'];
       $description=$data['description'];
        
        $query=$this->db->query("UPDATE `about_us_content` SET `title`='$title',`description`='$description' WHERE `content_id`='$content_id'");
        //print($query);
    }

    public function update_testimonial($data) {
       $testimonial_id=$data['testimonial_id'];
       $testimonial_id = $this->encrypt->decode($testimonial_id);
       $name=$data['name'];
       $location=$data['location'];
       $comment=$data['comment'];
        
        //$query=$this->db->query("UPDATE `testimonial` SET `name`='$name', `location`='$location', `comment`='$comment' WHERE `testimonial_id`='$testimonial_id'");

       if(!isset($data['image_path'])){
        
        $query=$this->db->query("UPDATE `testimonial` SET `name`='$name', `location`='$location', `comment`='$comment' WHERE `testimonial_id`='$testimonial_id'");
       }else{
        $image_path=$data['image_path'];
        $query=$this->db->query("UPDATE `testimonial_image` SET `description`='$content', image_path='$image_path' WHERE image_id ='$image_id'");
        $query=$this->db->query("UPDATE `testimonial` SET image_path='$image_path', `name`='$name', `location`='$location', `comment`='$comment' WHERE `testimonial_id`='$testimonial_id'");  
       }
        //print($query);
    }

    public function delete_testimonial($data) {
        $testimonial_id=$data['testimonial_id'];
        $testimonial_id = $this->encrypt->decode($testimonial_id);
        $this->db->where('testimonial_id', $testimonial_id);
        $this->db->delete('testimonial');
    }

    public function delete_about_us_content($data) {
        $content_id=$data['content_id'];
        $content_id = $this->encrypt->decode($content_id);
        $this->db->where('content_id', $content_id);
        $this->db->delete('about_us_content');
    }
    //------------FAQ-------------------------
    public function getfaq() {
        $query=$this->db->get('faq');
        $data=$query->result_array();
        return $data;
    }

    public function getfaqimages() {
        $query=$this->db->get('faq_images');
        $data=$query->result_array();
        return $data;
    }

    public function getblogimages() {
        $query=$this->db->get('blog_images');
        $data=$query->result_array();
        return $data;
    }

    public function getblog() {
        $query=$this->db->get('blog');
        $data=$query->result_array();
        return $data;
    }

    public function add_faq($data) {
        //print_r($data);exit;
        $query=$this->db->insert('faq', $data);
        //print($query);
    }

    public function update_faq($data) {
       $faq_id=$data['faq_id'];
       $faq_id = $this->encrypt->decode($faq_id);
       $question=$data['question'];
       $answer=$data['answer'];
        
        $query=$this->db->query("UPDATE `faq` SET `question`='$question',`answer`='$answer' WHERE `faq_id`='$faq_id'");
    }

    public function update_faq_images($data) {
       $image_id = $this->encrypt->decode($data['image_id']);
       $content=$data['description'];
       if(!isset($data['image_path'])){
        $query=$this->db->query("UPDATE `faq_images` SET `description`='$content' WHERE image_id='$image_id'");
       }else{
        $image_path=$data['image_path'];
        //print("UPDATE `faq_images` SET `description`='$content', image_path='$image_path' WHERE image_id ='$image_id'");exit;
        $query=$this->db->query("UPDATE `faq_images` SET `description`='$content', image_path='$image_path' WHERE image_id ='$image_id'");   
       }//print($query);
    }

    public function update_blog_images($data) {
       $image_id = $this->encrypt->decode($data['image_id']);
       $content=$data['description'];
       if(!isset($data['image_path'])){
        $query=$this->db->query("UPDATE `blog_images` SET `description`='$content' WHERE image_id='$image_id'");
       }else{
        $image_path=$data['image_path'];
        //print("UPDATE `faq_images` SET `description`='$content', image_path='$image_path' WHERE image_id ='$image_id'");exit;
        $query=$this->db->query("UPDATE `blog_images` SET `description`='$content', image_path='$image_path' WHERE image_id ='$image_id'");   
       }//print($query);
    }

    public function add_blog($data) {
        //print_r($data);exit;
        $query=$this->db->insert('blog', $data);
        //print($query);
    }

    public function update_blog($data) {
       $blog_id = $this->encrypt->decode($data['blog_id']);
       $title=$data['title'];
       $blog_desc=$data['blog_desc'];
       $writer=$data['writer'];
       $blog_date=$data['blog_date'];
       $blog_facebook=$data['blog_facebook'];
       $blog_twitter=$data['blog_twitter'];
       $blog_google=$data['blog_google'];
       $description=$data['description'];
       if(!isset($data['image_path'])){
        $query=$this->db->query("UPDATE `blog` SET `title` = '$title', `blog_desc`='$blog_desc', `writer` = '$writer', `blog_date`='$blog_date', `blog_facebook` = '$blog_facebook', `blog_twitter`='$blog_twitter', `blog_google` = '$blog_google', `description`='$description' WHERE `blog_id` ='$blog_id'");
       }else{
        $image_path=$data['image_path'];
        //print("UPDATE `faq_images` SET `description`='$content', image_path='$image_path' WHERE image_id ='$image_id'");exit;
        $query=$this->db->query("UPDATE `blog` SET `image_path` ='$image_path', `title` = '$title', `blog_desc`='$blog_desc', `writer` = '$writer', `blog_date`='$blog_date', `blog_facebook` = '$blog_facebook', `blog_twitter`='$blog_twitter', `blog_google` = '$blog_google', `description`='$description' WHERE `blog_id` ='$blog_id'");   
       }//print($query);
    }

    public function delete_faq($data) {
        $faq_id=$data['faq_id'];
        $faq_id = $this->encrypt->decode($faq_id);
        $this->db->where('faq_id', $faq_id);
        $this->db->delete('faq');
    }
    public function delete_blog($data) {
        $blog_id=$data['blog_id'];
        $blog_id = $this->encrypt->decode($blog_id);
        $this->db->where('blog_id', $blog_id);
        $this->db->delete('blog');
    }
//------------------------About Andaman---------------------------------------

    public function getaboutandamanimages() {
        //print_r($data);exit;
        $query=$this->db->get('about_andaman_images');
        $data=$query->result_array();
        return $data;
    }

    public function getaboutandamancontent() {
        //print_r($data);exit;
        $query=$this->db->get('about_andaman_content');
        $data=$query->result_array();
        return $data;
    }

    public function add_about_andaman_content($data) {
        //print_r($data);exit;
        $query=$this->db->insert('about_andaman_content', $data);
        //print($query);
    }

    public function update_aboutandaman_images($data) {
       $image_id = $this->encrypt->decode($data['image_id']);
       $content=$data['description'];
       if(!isset($data['image_path'])){
        
        $query=$this->db->query("UPDATE `about_andaman_images` SET `description`='$content' WHERE image_id='$image_id'");
       }else{
        $image_path=$data['image_path'];
        $query=$this->db->query("UPDATE `about_andaman_images` SET `description`='$content', image_path='$image_path' WHERE image_id ='$image_id'");   
       }//print($query);
    }

    public function update_about_andaman_content($data) {
       $content_id=$data['content_id'];
       $content_id = $this->encrypt->decode($content_id);
       $title=$data['title'];
       $description=$data['description'];
        
        $query=$this->db->query("UPDATE `about_andaman_content` SET `title`='$title',`description`='$description' WHERE `content_id`='$content_id'");
        //print($query);
    }

    public function delete_aa($data) {
        $content_id=$data['content_id'];
        $content_id = $this->encrypt->decode($content_id);
        $this->db->where('content_id', $content_id);
        $this->db->delete('about_andaman_content');
    }

    //-----------Events--------------------

    public function geteventimages() {
        //print_r($data);exit;
        $query=$this->db->get('events_images');
        $data=$query->result_array();
        return $data;
    }

    public function geteventcontent() {
        //print_r($data);exit;
        $query=$this->db->get('events_content');
        $data=$query->result_array();
        return $data;
    }

    public function add_events_content($data) {
        //print_r($data);exit;
        $query=$this->db->insert('events_content', $data);
        //print($query);
    }

    public function update_events_images($data) {
       $image_id = $this->encrypt->decode($data['image_id']);
       $content=$data['description'];
       if(!isset($data['image_path'])){
        
        $query=$this->db->query("UPDATE `events_images` SET `description`='$content' WHERE image_id='$image_id'");
       }else{
        $image_path=$data['image_path'];
        $query=$this->db->query("UPDATE `events_images` SET `description`='$content', image_path='$image_path' WHERE image_id ='$image_id'");   
       }//print($query);
    }

    public function update_events_content($data) {
       $content_id=$data['content_id'];
       $content_id = $this->encrypt->decode($content_id);
       $title=$data['title'];
       $description=$data['description'];
        
        $query=$this->db->query("UPDATE `events_content` SET `title`='$title',`description`='$description' WHERE `content_id`='$content_id'");
        //print($query);
    }

    public function delete_event_content($data) {
        $content_id=$data['content_id'];
        $content_id = $this->encrypt->decode($content_id);
        $this->db->where('content_id', $content_id);
        $this->db->delete('events_content');
    }

//-----------MICE Events--------------------

    public function getmiceimages() {
        //print_r($data);exit;
        $query=$this->db->get('mice_images');
        $data=$query->result_array();
        return $data;
    }

    public function getmicecontent() {
        //print_r($data);exit;
        $query=$this->db->get('mice_content');
        $data=$query->result_array();
        return $data;
    }

    public function add_mice_content($data) {
        //print_r($data);exit;
        $query=$this->db->insert('mice_content', $data);
        //print($query);
    }

    public function update_mice_images($data) {
       $image_id = $this->encrypt->decode($data['image_id']);
       $content=$data['description'];
       if(!isset($data['image_path'])){
        
        $query=$this->db->query("UPDATE `mice_images` SET `description`='$content' WHERE image_id='$image_id'");
       }else{
        $image_path=$data['image_path'];
        $query=$this->db->query("UPDATE `mice_images` SET `description`='$content', image_path='$image_path' WHERE image_id ='$image_id'");   
       }//print($query);
    }

    public function update_mice_content($data) {
       $content_id=$data['content_id'];
       $content_id = $this->encrypt->decode($content_id);
       $title=$data['title'];
       $description=$data['description'];
        
        $query=$this->db->query("UPDATE `mice_content` SET `title`='$title',`description`='$description' WHERE `content_id`='$content_id'");
        //print($query);
    }

    public function delete_mice($data) {
        $content_id=$data['content_id'];
        $content_id = $this->encrypt->decode($content_id);
        $this->db->where('content_id', $content_id);
        $this->db->delete('mice_content');
    }

//--------------------Destination Wedding------------------------------

    public function getdestinationweddingimages() {
        //print_r($data);exit;
        $query=$this->db->get('destination_wedding_images');
        $data=$query->result_array();
        return $data;
    }

    public function getdestinationweddingcontent() {
        //print_r($data);exit;
        $query=$this->db->get('destination_wedding_content');
        $data=$query->result_array();
        return $data;
    }

    public function add_destination_wedding_content($data) {
        //print_r($data);exit;
        $query=$this->db->insert('destination_wedding_content', $data);
        //print($query);
    }

    public function update_destination_wedding_images($data) {
       $image_id = $this->encrypt->decode($data['image_id']);
       $content=$data['description'];
       if(!isset($data['image_path'])){
        
        $query=$this->db->query("UPDATE `destination_wedding_images` SET `description`='$content' WHERE image_id='$image_id'");
       }else{
        $image_path=$data['image_path'];
        $query=$this->db->query("UPDATE `destination_wedding_images` SET `description`='$content', image_path='$image_path' WHERE image_id ='$image_id'");   
       }//print($query);
    }

    public function update_destination_wedding_content($data) {
       $content_id=$data['content_id'];
       $content_id = $this->encrypt->decode($content_id);
       $title=$data['title'];
       $description=$data['description'];
        
        $query=$this->db->query("UPDATE `destination_wedding_content` SET `title`='$title',`description`='$description' WHERE `content_id`='$content_id'");
        //print($query);
    }

    public function delete_destination_wedding_content($data) {
        $content_id=$data['content_id'];
        $content_id = $this->encrypt->decode($content_id);
        $this->db->where('content_id', $content_id);
        $this->db->delete('destination_wedding_content');
    }

//--------------------Eco Tour------------------------------

    public function getecotourimages() {
        //print_r($data);exit;
        $query=$this->db->get('eco_tour_images');
        $data=$query->result_array();
        return $data;
    }

    public function getecotourcontent() {
        //print_r($data);exit;
        $query=$this->db->get('eco_tour_content');
        $data=$query->result_array();
        return $data;
    }

    public function add_eco_tour_content($data) {
        //print_r($data);exit;
        $query=$this->db->insert('eco_tour_content', $data);
        //print($query);
    }

    public function update_eco_tour_images($data) {
       $image_id = $this->encrypt->decode($data['image_id']);
       $content=$data['description'];
       if(!isset($data['image_path'])){
        
        $query=$this->db->query("UPDATE `eco_tour_images` SET `description`='$content' WHERE image_id='$image_id'");
       }else{
        $image_path=$data['image_path'];
        $query=$this->db->query("UPDATE `eco_tour_images` SET `description`='$content', image_path='$image_path' WHERE image_id ='$image_id'");   
       }//print($query);
    }

    public function update_eco_tour_content($data) {
       $content_id=$data['content_id'];
       $content_id = $this->encrypt->decode($content_id);
       $title=$data['title'];
       $description=$data['description'];
        
        $query=$this->db->query("UPDATE `eco_tour_content` SET `title`='$title',`description`='$description' WHERE `content_id`='$content_id'");
        //print($query);
    }

    public function delete_eco_tour_content($data) {
        $content_id=$data['content_id'];
        $content_id = $this->encrypt->decode($content_id);
        $this->db->where('content_id', $content_id);
        $this->db->delete('eco_tour_content');
    }

//--------------------Trip Planner------------------------------

    public function gettripplannerimages() {
        //print_r($data);exit;
        $query=$this->db->get('trip_planner_images');
        $data=$query->result_array();
        return $data;
    }

    public function gettripplannercontent() {
        //print_r($data);exit;
        $query=$this->db->get('trip_planner_content');
        $data=$query->result_array();
        return $data;
    }

    public function add_trip_planner_content($data) {
        //print_r($data);exit;
        $query=$this->db->insert('trip_planner_content', $data);
        //print($query);
    }

    public function update_trip_planner_images($data) {
       $image_id = $this->encrypt->decode($data['image_id']);
       $content=$data['description'];
       if(!isset($data['image_path'])){
        
        $query=$this->db->query("UPDATE `trip_planner_images` SET `description`='$content' WHERE image_id='$image_id'");
       }else{
        $image_path=$data['image_path'];
        $query=$this->db->query("UPDATE `trip_planner_images` SET `description`='$content', image_path='$image_path' WHERE image_id ='$image_id'");   
       }//print($query);
    }

    public function delete_trip_planner($data) {
        $content_id=$data['content_id'];
        $content_id = $this->encrypt->decode($content_id);
        $this->db->where('content_id', $content_id);
        $this->db->delete('trip_planner_content');
    }

    public function update_trip_planner_content($data) {
       $content_id=$data['content_id'];
       $content_id = $this->encrypt->decode($content_id);
       $title=$data['title'];
       $description=$data['description'];
        
        $query=$this->db->query("UPDATE `trip_planner_content` SET `title`='$title',`description`='$description' WHERE `content_id`='$content_id'");
        //print($query);
    }

//----------Activities-------------------------------------------
    public function activities() {
        //print_r($data);exit;
        $query=$this->db->get('activities');
        $data=$query->result_array();
        return $data;
    }

    public function add_activity($data) {
        $type=$data['type'];
        $typeNew=str_replace(" ", "_", $type);
        $data['activity_name'] = $typeNew;

        $data2['activity_type'] = $typeNew;
        $data3['activity_type'] = $typeNew;
        $data3['details'] = "Image size should be 1920*685";
        $data4['activity_type'] = $typeNew;
        $data4['details'] = "Image size should be 485*685";
        $data5['activity_type'] = $typeNew;
        $data5['details'] = "Image size should be 378*318";

        $query=$this->db->insert('activities', $data);
        $query=$this->db->insert('activity_content', $data2);
        $query=$this->db->insert('activity_images', $data3);
        $query=$this->db->insert('activity_images', $data4);
        $query=$this->db->insert('activity_images', $data5);
        //print($query);
    }

    public function update_activity($data) {
      $activity_id=$data['activity_id'];
      $activity_id = $this->encrypt->decode($activity_id);
      $type=$data['type'];
      $activity_name=str_replace(" ", "_", $type);
      //print_r($data);exit;
      if(!isset($data['image_path'])){
        $query=$this->db->query("UPDATE `activities` SET `type`='$type', activity_name = '$activity_name' WHERE `activity_id`='$activity_id'");
       }else{
        $image_path=$data['image_path'];
        //print_r("UPDATE `activities` SET `type`='$type', activity_name = '$activity_name', image_path='$image_path' WHERE `activity_id`='$activity_id'");exit;
        $query=$this->db->query("UPDATE `activities` SET `type`='$type', activity_name = '$activity_name', image_path='$image_path' WHERE `activity_id`='$activity_id'");   
       }
    }

    public function delete_activity($data) {
        $activity_id=$data['activity_id'];
        $type=$data['type'];
        $activity_id = $this->encrypt->decode($activity_id);
        $this->db->where('activity_id', $activity_id);
        $this->db->delete('activities');

        $this->db->where('activity_type', $type);
        $this->db->delete('activity_images');

        $this->db->where('activity_type', $type);
        $this->db->delete('activity_content');

        $this->db->where('activity_type', $type);
        $this->db->delete('gallery');
    }

//-----------Activity Type----------------------------------------------
    
    public function getactivitycontent($type) {
        //print_r($data);exit;
        $this->db->where('activity_type', $type );
        $query=$this->db->get('activity_content');
        $data=$query->result_array();
        return $data;
    }

    public function add_activity_content($data) {
        //print_r($data);exit;
        $query=$this->db->insert('activity_content', $data);
        //print($query);
    }

    public function update_activity_content($data) {
       $title=$data['title']; 
       $description=$data['description'];
       $content_id = $this->encrypt->decode($data['content_id']);
       $activity_type=$data['activity_type'];
        $query=$this->db->query("UPDATE `activity_content` SET `title`='$title', `description`='$description' where `content_id` = $content_id");
        //print($query);
    }

    public function delete_activity_content($data) {
        $content_id=$data['content_id'];
        $content_id = $this->encrypt->decode($content_id);
        $this->db->where('content_id', $content_id);
        $this->db->delete('activity_content');
    }

    public function getactivityimages($type) {
        //print_r($data);exit;
        $this->db->where('activity_type', $type );
        $query=$this->db->get('activity_images');
        $data=$query->result_array();
        return $data;
    }

    public function update_activity_images($data) {
       $image_id = $this->encrypt->decode($data['image_id']);
       $description=$data['description'];
       if(!isset($data['image_path'])){
        
        $query=$this->db->query("UPDATE `activity_images` SET `description`='$description' WHERE image_id='$image_id'");
       }else{
        $image_path=$data['image_path'];
        $query=$this->db->query("UPDATE `activity_images` SET `description`='$description', image_path='$image_path' WHERE image_id ='$image_id'");   
       }//print($query);
    }

    public function getactivitygallery($type) {
        //print_r($data);exit;
        $this->db->where('activity_type', $type );
        $query=$this->db->get('gallery');
        $data=$query->result_array();
        return $data;
    }

    public function add_gallery_image($data){
        $query=$this->db->insert('gallery', $data);
    }

    public function update_gallery($data) {
       $image_id = $this->encrypt->decode($data['gallery_id']);
       $image_path=$data['image'];
        $query=$this->db->query("UPDATE `gallery` SET `image`='$image_path' WHERE gallery_id ='$image_id'");   
       
    }

    public function delete_gallery($data) {
        $gallery_id=$data['gallery_id'];
        //$gallery_id = $this->encrypt->decode($gallery_id);
        $this->db->where('gallery_id', $gallery_id);
        $this->db->delete('gallery');
    }

//----------------Rewards-------------------------------

    public function rewards_images() {
        $query=$this->db->get('rewards_images');
        $data=$query->result_array();
        return $data;
    }

    public function rewards() {
        //print_r($data);exit;
        $query=$this->db->get('rewards');
        $data=$query->result_array();
        return $data;
    }

    public function add_rewards($data){
        $query=$this->db->insert('rewards', $data);
    }

    public function update_rewards($data) {
       $rewards_id = $this->encrypt->decode($data['rewards_id']);
       $image_path=$data['image'];
       $title=$data['title'];
       $description=$data['description'];
       if($data['image'] ==''){
        $query=$this->db->query("UPDATE `rewards` SET `title`='$title', `description`='$description' WHERE rewards_id ='$rewards_id'");
       } else {
        $query=$this->db->query("UPDATE `rewards` SET `title`='$title', `description`='$description', `image`='$image_path' WHERE rewards_id ='$rewards_id'");
       }   
       
    }

    public function delete_rewards($data) {
        $rewards_id=$data['rewards_id'];
        $rewards_id = $this->encrypt->decode($rewards_id);
        $this->db->where('rewards_id', $rewards_id);
        $this->db->delete('rewards');
    }

    public function update_rewards_image($data) {
       $image_id = $this->encrypt->decode($data['image_id']);
       $image_path=$data['image'];
       //print("UPDATE `rewards` SET `image_path`='$image_path' WHERE image_id ='$image_id'");exit;
        $query=$this->db->query("UPDATE `rewards_images` SET `image_path`='$image_path' WHERE image_id ='$image_id'");   
       
    }

//------------------Holiday Package-------------

    public function holiday_packages_content() {
        $query=$this->db->get('holiday_packages_content');
        $data=$query->result_array();
        return $data;
    }

    public function holiday_packages_banner() {
        $query=$this->db->get('holiday_packages_image');
        $data=$query->result_array();
        return $data;
    }

    public function holiday_packages() {
        $query=$this->db->get('holiday_packages');
        $data=$query->result_array();
        return $data;
    }

    public function add_holiday_package($data){
        $type = $data['package_name'];
        $data2['package_name'] = $type;
        $data3['package_name'] = $type;
        $data3['details'] = "Image size should be 1920*685";
        $data4['package_name'] = $type;
        $data4['details'] = "Image size should be 485*685";
        $query=$this->db->insert('holiday_packages', $data);
        $query=$this->db->insert('package_content', $data2);
        $query=$this->db->insert('package_images', $data3);
        $query=$this->db->insert('package_images', $data4);
    }

    public function update_holiday_package($data) {
        $package_id=$data['package_id'];
        $package_id = $this->encrypt->decode($package_id);
        $title=trim($data['title']);
        
        $package_name=str_replace(" ", "_", $title);
        //print("UPDATE `holiday_packages` SET `package_name`='$package_name', `title` = '$title' WHERE `package_id`='$package_id'");exit;
        if(!isset($data['image'])){
        
            $query=$this->db->query("UPDATE `holiday_packages` SET `package_name`='$package_name', `title` = '$title' WHERE `package_id`='$package_id'");
        }else{
            $image=$data['image'];
            $query=$this->db->query("UPDATE `holiday_packages` SET `package_name`='$package_name', `title` = '$title', `image` = '$image' WHERE `package_id`='$package_id'");   
        }
        //print($query);
    }

    public function delete_holiday_package($data) {
        $package_id=$data['package_id'];
        $package_id = $this->encrypt->decode($package_id);
        $this->db->where('package_id', $package_id);
        $this->db->delete('holiday_packages');
    }

    public function update_holiday_images($data) {
    $image_id=$data['image_id'];
    $image_id = $this->encrypt->decode($image_id);
    $description=$data['description'];
    //print("UPDATE `holiday_packages_image` SET `description`='$description', `image_path` = '$image_path' WHERE `image_id`='$image_id'");exit;
    if(!isset($data['image_path'])){
        $query=$this->db->query("UPDATE `holiday_packages_image` SET `description`='$description' WHERE `image_id`='$image_id'");
    }else{
        $image=$data['image_path'];
        $query=$this->db->query("UPDATE `holiday_packages_image` SET `description`='$description', `image_path` = '$image' WHERE `image_id`='$image_id'");   
    }
    //print($query);
    }

    public function update_holiday_content($data) {
       $content_id=$data['content_id'];
       $content_id = $this->encrypt->decode($content_id);
       $title=$data['title'];
       $description=$data['description'];
        
        $query=$this->db->query("UPDATE `holiday_packages_content` SET `title`='$title',`description`='$description' WHERE `content_id`='$content_id'");
        //print($query);
    }

//------------------Honeymoon Package-------------

    public function honeymoon_packages_content() {
        $query=$this->db->get('honeymoon_packages_content');
        $data=$query->result_array();
        return $data;
    }

    public function honeymoon_packages_banner() {
        $query=$this->db->get('honeymoon_packages_image');
        $data=$query->result_array();
        return $data;
    }

    public function honeymoon_packages() {
        $query=$this->db->get('honeymoon_packages');
        $data=$query->result_array();
        return $data;
    }

    public function add_honeymoon_package($data){
        $type = $data['package_name'];
        $data2['package_name'] = $type;
        $data3['package_name'] = $type;
        $data3['details'] = "Image size should be 1920*685";
        $data4['package_name'] = $type;
        $data4['details'] = "Image size should be 485*685";
        $query=$this->db->insert('honeymoon_packages', $data);
        $query=$this->db->insert('package_content', $data2);
        $query=$this->db->insert('package_images', $data3);
        $query=$this->db->insert('package_images', $data4);
        
    }

    public function update_honeymoon_package($data) {
        $package_id=$data['package_id'];
        $package_id = $this->encrypt->decode($package_id);
        $title=trim($data['title']);
        $package_name=str_replace(" ", "_", $title);
        //print("UPDATE `honeymoon_packages` SET `package_name`='$package_name', `title` = '$title' WHERE `package_id`='$package_id'");exit;
        if(!isset($data['image'])){
        
            $query=$this->db->query("UPDATE `honeymoon_packages` SET `package_name`='$package_name', `title` = '$title' WHERE `package_id`='$package_id'");
        }else{
            $image=$data['image'];
            $query=$this->db->query("UPDATE `honeymoon_packages` SET `package_name`='$package_name', `title` = '$title', `image` = '$image' WHERE `package_id`='$package_id'");   
        }
        //print($query);
    }

    public function delete_honeymoon_package($data) {
        $package_id=$data['package_id'];
        $package_id = $this->encrypt->decode($package_id);
        $this->db->where('package_id', $package_id);
        $this->db->delete('honeymoon_packages');
    }

    public function update_honeymoon_images($data) {
        $image_id=$data['image_id'];
        $image_id = $this->encrypt->decode($image_id);
        $description=$data['description'];
        //print("UPDATE `honeymoon_packages_image` SET `description`='$description', `image_path` = '$image_path' WHERE `image_id`='$image_id'");exit;
        if(!isset($data['image_path'])){
            $query=$this->db->query("UPDATE `honeymoon_packages_image` SET `description`='$description' WHERE `image_id`='$image_id'");
        }else{
            $image=$data['image_path'];
            $query=$this->db->query("UPDATE `honeymoon_packages_image` SET `description`='$description', `image_path` = '$image' WHERE `image_id`='$image_id'");   
        }
        //print($query);
    }

    public function update_honeymoon_content($data) {
       $content_id=$data['content_id'];
       $content_id = $this->encrypt->decode($content_id);
       $title=$data['title'];
       $description=$data['description'];
        
        $query=$this->db->query("UPDATE `honeymoon_packages_content` SET `title`='$title',`description`='$description' WHERE `content_id`='$content_id'");
        //print($query);
    }

//-----------Package----------------------

    public function getpackagecontent($type) {
        //print_r($data);exit;
        $this->db->where('package_name', $type );
        $query=$this->db->get('package_content');
        $data=$query->result_array();
        return $data;
    }

    public function getpackageimages($type) {
        //print_r($data);exit;
        $this->db->where('package_name', $type );
        $query=$this->db->get('package_images');
        $data=$query->result_array();
        return $data;
    }

    public function update_package_content($data) {
        $content_id = $this->encrypt->decode($data['content_id']);
        $title=$data['title'];
        $description=$data['description'];
        //print("UPDATE `package_content` SET `title`='$title', `description`='$description' WHERE content_id='$content_id'");exit;
        $query=$this->db->query("UPDATE `package_content` SET `title`='$title', `description`='$description' WHERE content_id='$content_id'");
       
    }

    public function update_package_images($data) {
       $image_id = $this->encrypt->decode($data['image_id']);
       $description=$data['description'];
       if(!isset($data['image_path'])){
        
        $query=$this->db->query("UPDATE `package_images` SET `description`='$description' WHERE image_id='$image_id'");
       }else{
        $image_path=$data['image_path'];
        $query=$this->db->query("UPDATE `package_images` SET `description`='$description', image_path='$image_path' WHERE image_id ='$image_id'");   
       }//print($query);
    }


    public function getitenary($type) {
        //print_r($data);exit;
        $this->db->where('package_name', $type );
        $query=$this->db->get('iternary');
        $data=$query->result_array();
        return $data;
    }

    public function add_iternary($data) {
        //print_r($data);exit;
        $query=$this->db->insert('iternary', $data);
        //print($query);
    }

    public function update_iternary($data) {
       $iternary_id=$data['iternary_id'];
       $iternary_id = $this->encrypt->decode($iternary_id);
       $day=$data['day'];
       $title=$data['title'];
       $description=$data['description'];
        
        $query=$this->db->query("UPDATE `iternary` SET `day`='$day', `title`='$title', `description`='$description' WHERE `iternary_id`='$iternary_id'");
        //print($query);
    }

    public function delete_iternary($data) {
        $iternary_id=$data['iternary_id'];
        $iternary_id = $this->encrypt->decode($iternary_id);
        $this->db->where('iternary_id', $iternary_id);
        $this->db->delete('iternary');
    }

    public function getcost($type) {
        //print_r($data);exit;
        $this->db->where('package_name', $type );
        $query=$this->db->get('package_cost');
        $data=$query->result_array();
        return $data;
    }

    public function add_cost($data) {
        //print_r($data);exit;
        $query=$this->db->insert('package_cost', $data);
        //print($query);
    }

    public function update_cost($data) {
       $package_id=$data['package_id'];
       $package_id = $this->encrypt->decode($package_id);
       $package_details=$data['package_details'];
       $meal_plan=$data['meal_plan'];
       $pax2=$data['pax2'];
       $pax4=$data['pax4'];
       $pax6=$data['pax6'];
       $extra_person=$data['extra_person'];
       $extra_child=$data['extra_child'];
        
        $query=$this->db->query("UPDATE `package_cost` SET `package_details`='$package_details', `meal_plan`='$meal_plan', `pax2`='$pax2', `pax4`='$pax4', `pax6`='$pax6', `extra_person`='$extra_person', `extra_child`='$extra_child' WHERE `package_id`='$package_id'");
        //print($query);
    }

    public function delete_cost($data) {
        $package_id=$data['package_id'];
        $package_id = $this->encrypt->decode($package_id);
        $this->db->where('package_id', $package_id);
        $this->db->delete('package_cost');
    }

    public function getinclusions($type) {
        //print_r($data);exit;
        $this->db->where('package_name', $type );
        $query=$this->db->get('inclusions');
        $data=$query->result_array();
        return $data;
    }

    public function add_inclusion($data) {
        //print_r($data);exit;
        $query=$this->db->insert('inclusions', $data);
        //print($query);
    }

    public function update_inclusions($data) {
       $inclusions_id=$data['inclusions_id'];
       $inclusions_id = $this->encrypt->decode($inclusions_id);
       $title=$data['title'];
       $description=$data['description'];
        
        $query=$this->db->query("UPDATE `inclusions` SET `title`='$title', `description`='$description' WHERE `inclusions_id`='$inclusions_id'");
        //print($query);
    }

    public function delete_inclusions($data) {
        $inclusions_id=$data['inclusions_id'];
        $inclusions_id = $this->encrypt->decode($inclusions_id);
        $this->db->where('inclusions_id', $inclusions_id);
        $this->db->delete('inclusions');
    }

    public function getgallery($type) {
        //print_r($data);exit;
        $this->db->where('package_name', $type );
        $query=$this->db->get('package_gallery');
        $data=$query->result_array();
        return $data;
    }

    public function add_package_gallery($data){
        $query=$this->db->insert('package_gallery', $data);
    }

    public function update_package_gallery($data) {
       $image_id = $this->encrypt->decode($data['gallery_id']);
       $image_path=$data['image'];
        $query=$this->db->query("UPDATE `package_gallery` SET `image`='$image_path' WHERE gallery_id ='$image_id'");   
       
    }

    public function delete_package_gallery($data) {
        $gallery_id=$data['gallery_id'];
        $gallery_id = $this->encrypt->decode($gallery_id);
        $this->db->where('gallery_id', $gallery_id);
        $this->db->delete('package_gallery');
    }

    public function gethotelfulllist($type) {
        //print_r($data);exit;
        
        $query=$this->db->get('hotel');
        $data=$query->result_array();
        return $data;
    }

    public function gethotel($type) {
        //print_r($data);exit;
        $this->db->where('package_name', $type );
        $query=$this->db->get('hotel');
        $data=$query->result_array();
        return $data;
    }

    public function add_hotel($data) {
        //print_r($data);exit;
        $query=$this->db->insert('hotel', $data);
        //print($query);
    }

    public function update_hotel($data) {
       $hotel_id=$data['hotel_id'];
       $hotel_id = $this->encrypt->decode($hotel_id);
       $hotel_name=$data['hotel_name'];
       // $title=$data['title'];
       // $description=$data['description'];
        
        $query=$this->db->query("UPDATE `hotel` SET `hotel_name`='$hotel_name' WHERE `hotel_id`='$hotel_id'");
        //print($query);
    }

    public function delete_hotel($data) {
        $hotel_id=$data['hotel_id'];
        $hotel_id = $this->encrypt->decode($hotel_id);
        $this->db->where('hotel_id', $hotel_id);
        $this->db->delete('hotel');
    }

    public function gethotellist($type1, $type2) {
        //print_r($data);exit;
        $this->db->where('hotel_name', $type1);
        $this->db->where('hotel_id', $type2);
        $query=$this->db->get('hotel_list');
        $data=$query->result_array();
        return $data;
    }

    public function add_hotel_details($data) {
        //print_r($data);exit;
        $query=$this->db->insert('hotel_list', $data);
        //print($query);
    }

    public function update_hotel_details($data) {
       $hotel_id=$data['hotel_list_id'];
       $hotel_id = $this->encrypt->decode($hotel_id);
       $title=$data['title'];
       $description=$data['description'];
        //print("UPDATE `hotel_list` SET `title`='$title', `description`='$description' WHERE `hotel_list_id`='$hotel_id'");exit;
        $query=$this->db->query("UPDATE `hotel_list` SET `title`='$title', `description`='$description' WHERE `hotel_list_id`='$hotel_id'");
        //print($query);
    }

    public function delete_hotel_details($data) {
        $hotel_id=$data['hotel_id'];
        $hotel_id = $this->encrypt->decode($hotel_id);
        $this->db->where('hotel_list_id', $hotel_id);
        $this->db->delete('hotel_list');
    }

}