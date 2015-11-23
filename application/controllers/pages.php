<?php
 class Pages extends My_Control_Panel {

     function view($pages = 'home') {
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
