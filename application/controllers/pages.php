<?php
 class Pages extends My_Control_Panel {

     function registration_form() {
        $this->load->library('user_agent');
		$data['Title']="New Registration";
		$data['Operation_system'] = $this->agent->platform();
		$data['Browser'] = $this->agent->browser();
		$data['Ip_address'] = $_SERVER['REMOTE_ADDR'];
        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('pages/registration_form',$data);
        $this->load->view('templates/footer');


     }
	 

	 
 }
?>
