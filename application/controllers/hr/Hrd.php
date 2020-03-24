<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hrd extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        //session login
        $this->load->model('mlogin');
        
        //load model hr
        // $this->load->model('hrModel/master/masterDataKaryawan/MasterKaryawan_model');
        // $this->load->model('hrModel/master/masterDataKaryawan/MasterKaryawanDetail_model');
        // $this->load->model('hrModel/master/masterDataKaryawan/MasterKaryawanKontrak_model');
        // $this->load->model('hrModel/master/masterDataKaryawan/MasterKaryawanOther_model');
    }

    public function index()
    {
/* 		print_r($this->mlogin->logged_id());
		die(); */
        if($this->mlogin->logged_id())
        {

        
   //         $this->load->view("dashboard/dashboard"); 
 		$this->load->view('templates/header'); //ini static templete dasar
		$this->load->view('templates/wrapper_start'); //ini static templete dasar
		$this->load->view('templates/top_menu'); //ini static templete dasar
		$this->load->view('templates/menu'); //ini static templete dasar
		$this->load->view('templates/container_start'); //ini static templete dasar
		$this->load->view('hr_v/master_v/masterKaryawan_v/content_header'); //ini dynamic
		$this->load->view('hr_v/master_v/masterKaryawan_v/content'); //ini dynamic
		$this->load->view('hr_v/master_v/masterKaryawan_v/js'); //ini dynamic
		$this->load->view('templates/container_end'); //ini static templete dasar
		$this->load->view('templates/wrapper_end'); //ini static templete dasar
		$this->load->view('templates/footer');	 //ini static templete dasar
//$this->load->view("dashboard/dashboard");  		

        }else{

            //jika session belum terdaftar, maka redirect ke halaman login
            redirect("login");

        }
    }

    public function logout()
    {

 		
        $this->session->sess_destroy();
        redirect('login'); 
    }

    public function addKaryawan(){
        $this->load->view('templates/header'); //ini static templete dasar
		$this->load->view('templates/wrapper_start'); //ini static templete dasar
		$this->load->view('templates/top_menu'); //ini static templete dasar
		$this->load->view('templates/menu'); //ini static templete dasar
		$this->load->view('templates/container_start'); //ini static templete dasar
		$this->load->view('hr_v/master_v/masterKaryawan_v/content_header'); //ini dynamic
		$this->load->view('hr_v/master_v/masterKaryawan_v/content_add'); //ini dynamic
		$this->load->view('hr_v/master_v/masterKaryawan_v/js'); //ini dynamic
		$this->load->view('templates/container_end'); //ini static templete dasar
		$this->load->view('templates/wrapper_end'); //ini static templete dasar
		$this->load->view('templates/footer');	 //ini static templete dasar
    }

}
