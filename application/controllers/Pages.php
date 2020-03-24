<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Pages extends CI_controller{
	public function view($page = 'home'){
		if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php')){
			show_404();
			
		}
		$data['title'] = ucfirst($page);
		
		$this->load->view('templates/header',$data);
		$this->load->view('templates/wrapper_start',$data);
		$this->load->view('templates/top_menu',$data);
		$this->load->view('templates/menu',$data);
		$this->load->view('templates/container_start',$data);
		$this->load->view('templates/content',$data);
		$this->load->view('templates/container_end',$data);
		$this->load->view('templates/wrapper_end',$data);
		$this->load->view('templates/footer',$data);
		
	}
	
	
}
