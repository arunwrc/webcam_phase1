<?php
 class Register extends My_Control_Panel {

   public function __construct()
     {
         parent::__construct();
         $this->load->model('Register_model');
		 //$this->load->helper('form'); 
		 //$this->load->helper('html'); 
         //$this->load->database();
         //$association_count = $this->register_model->countassociation();
         /*if ($association_count > 0) {
             if($this->session->userdata('usertype_id')!=USERTYPE_ADMIN){//prevent direct access without admin privilage
                 $this->session->set_flashdata('accessDenied', ACCESS_DENIED);
                 redirect(base_url().'dashboard','refresh');
             }
         }*/
     }
     

      /* public function index(){
         $data['association_list'] = $this->register_model->get_association_details();

         $data['Title']="Overview || ".ASSOCIATION_NAME;
         $data['Username'] = $this->session->userdata('first_name');
         $this->load->view('administrator/admin-template/nav',$data);
         $this->load->view('administrator/admin-template/header',$data);
         $this->load->view('administrator/backend/registration_index', $data);
         $this->load->view('administrator/admin-template/footer');
     }*/


     public function registration_action(){
        //validations rules
         /*$this->form_validation->set_rules('name','Association Name', 'required|max_length[50]|xss_clean');
         $this->form_validation->set_rules('registrationnumber','Registration Number', 'required|max_length[50]|xss_clean');
         $this->form_validation->set_rules('address','Address', 'required|max_length[50]|xss_clean');
         $this->form_validation->set_rules('subsitename','Subsite Name', 'required|max_length[50]|xss_clean');
         $this->form_validation->set_rules('email','Email ID', 'required|max_length[50]|xss_clean');
         $this->form_validation->set_rules('about','About', 'required|max_length[50]|xss_clean');
         $this->form_validation->set_rules('location','Location', 'required|max_length[50]|xss_clean');*/
         //$randomgen = random_string('alnum', 16);
         //$randomgen_password = random_string('alnum', 12);
         //if($this->form_validation->run() === FALSE){
			 if (!file_exists(UPLOAD_DIR)) {
 			   mkdir(UPLOAD_DIR, 0777, true);
			 }
			 $img = $this->input->post('base64image');
			 $img = str_replace('data:image/jpeg;base64,', '', $img);
			 $img = str_replace(' ', '+', $img);
			 $data = base64_decode($img);
			 
			$date = new DateTime();
			$timestamp = $date->getTimestamp();
			$file = UPLOAD_DIR.$this->input->post('first_name')."_".$timestamp . '.jpg';
			 $success = file_put_contents($file, $data);
			 
             $data = array( // inputs to validate
                 'first_name'=> $this->input->post('first_name'),
                 'last_name' => $this->input->post('last_name'),
				 'mobile' => $this->input->post('mobile'),
				 'address_1' => $this->input->post('address_1'),
				 'address_2' => $this->input->post('address_2'),
				 'street' => $this->input->post('street'),
				 'province' => $this->input->post('province'),
				 'country' => $this->input->post('country'),
				  'remarks' => $this->input->post('remarks'),
				  'img_file' => $file
                 /*'address' => $this->input->post('address'),
                 'subsite_name' => $this->input->post('subsitename'),
                 'email' => $this->input->post('email'),
                 'about' => $this->input->post('about'),
                 'location' => $this->input->post('location')*/
             );
			 //print_r($data); exit;
              $this->Register_model->add_new($data);
			

         //}
         /*else{ //prepare data array for add and update
             $data = array(
                 'name'=> $this->input->post('name'),
                 'registration_number'=> $this->input->post('registrationnumber'),
                 'address'=> $this->input->post('address'),
                 'subsite_name' => $this->input->post('subsitename'),
                 'email' => $this->input->post('email'),
                 'about' => $this->input->post('about'),
                 'location' => $this->input->post('location')
             );
            if($this->input->post('id')){ // update method
                 $this->register_model->update($data);
                 $this->session->set_flashdata('message','Record  updated successfully');
                 redirect('register', 'refresh');
             }
            else{ // add method
                 $association_count = $this->register_model->countassociation();
                 if ($association_count > 0){ //prevents creating  association more than 1
                     $this->session->set_flashdata('message','Sorry, this action cant be done');
                     redirect('register', 'refresh');
                 }
                 $user_data = array(    // collecting user details
                     'usertype_id' => USERTYPE_ADMIN,
                     'username' => $this->input->post('name'),
                     'password' => $randomgen_password,
                     'user_status_id' => USERSTATUS_ACTIVE
                 );
                 $this->db->insert('users', $user_data);
                 $insert_id = $this->db->insert_id();
                 //user table entry ends
                 $insert_id_data = array(
                     'user_id'=> $insert_id,
                     'key' => $randomgen
                 );
                 $merged_arr = array_merge($data,$insert_id_data);
                 $this->register_model->add_new($merged_arr);
                 $this->session->set_flashdata('message','New record  Added');
                 redirect('register', 'refresh');

             }
         }*/
     }

    /* public function edit($id){
         if((int)$id>0){
             $query = $this->register_model->get_by_id($id);
             $data['id']['value'] = $query['id'];
             $data['name']['value'] = $query['name'];
             $data['registrationnumber']['value'] = $query['registration_number'];
             $data['address']['value'] = $query['address'];
             $data['subsitename']['value'] = $query['subsite_name'];
             $data['email']['value'] = $query['email'];
             $data['about']['value'] = $query['about'];
             $data['location']['value'] = $query['location'];
         }
         $data['Title']="Edit || ".ASSOCIATION_NAME;
         $data['Username'] = $this->session->userdata('first_name');
         $this->load->view('administrator/admin-template/nav',$data);
         $this->load->view('administrator/admin-template/header',$data);
         $this->load->view('administrator/backend/registration', $data);
         $this->load->view('administrator/admin-template/footer');
     }*/



 }


