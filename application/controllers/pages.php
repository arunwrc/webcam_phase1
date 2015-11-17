<?php
 class Pages extends CI_Controller {

     function view($pages = 'home') {
         $this->load->helper('url');

        if( ! file_exists('application/views/pages/'.$pages.'.php')){

                    show_404();
        }
        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('pages/'.$pages);
        $this->load->view('templates/footer');


     }
	 

	 
 }
?>
