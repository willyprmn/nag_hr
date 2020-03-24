<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class karyawan extends CI_Controller {
	public function __construct()
    {
        parent::__construct();
        $this->load->model(array('hrModel/master/masterDataKaryawan/MasterKaryawan_model'));
        $this->load->model(array('hrModel/master/masterDataKaryawan/MasterKaryawanDetail_model'));
        $this->load->model(array('hrModel/master/masterDataKaryawan/MasterKaryawanKontrak_model'));
        $this->load->model(array('hrModel/master/masterDataKaryawan/MasterKaryawanOther_model'));
        // if($this->session->userdata('status')==false){
        //     redirect('Login');
        // }  
    }

	public function index()
	{	
		$data['masterkaryawan'] = $this->MasterKaryawan_model->read();
		$this->load->view('hr_view/v_header');
		$this->load->view('hr_view/master/karyawan/v_index',$data);
		$this->load->view('hr_view/v_footer');
	}

	// function add()
	// {
	// 	$this->load->view('hr/v_header');
	// 	$this->load->view('hr/master/karyawan/v_index');
	// 	$this->load->view('hr/v_footer');
	// }

	function addData()
	{
		$this->load->library('form_validation');
            
			

            
                $addKaryawan = array(
					'n_nik'				=>	$this->input->post('nik'),
					's_nm_lengkap'		=>	$this->input->post('nama'),
					's_nm_alias'		=>	$this->input->post('alias'),
					's_gender'			=>	$this->input->post('gender'),
					's_tmp_lahir'		=>	$this->input->post('tmp_lahir'),
					'd_tgl_lahir'		=>	$this->input->post('tgl_lahir'),
					's_agama'			=>	$this->input->post('agama'),
					's_gol_darah'		=>	$this->input->post('darah'),
					's_alamat'			=>	$this->input->post('alamat'),
					's_alamat_pindah'	=>	$this->input->post('alamat2'),
					's_pendidikan'		=>	$this->input->post('pendidikan'),
					's_jurusan'			=>	$this->input->post('jurusan'),
					's_status_ptkp'		=>	$this->input->post('ptkp'),
					's_no_hp'			=>	$this->input->post('no_hp'),
					's_hub_jwb'			=>	$this->input->post('jwb')
				);
				$id_karyawan = $this->MasterKaryawan_model->createNewKaryawan($addKaryawan);
				$addKaryawanDet = array(
					'n_id_karyawan'			=>	$id_karyawan,
					's_divisi'			=>	$this->input->post('divisi'),
					's_lokasi'			=>	$this->input->post('lokasi'),
					's_departement'		=>	$this->input->post('depart'),
					's_bagian'			=>	$this->input->post('bagian'),
					's_line'			=>	$this->input->post('line'),
					's_jabatan'			=>	$this->input->post('jabatan'),
					'd_tgl_mulai'		=>	$this->input->post('mulai')
				);

				$addKaryawanKtr = array(
					'n_id_karyawan'			=> $id_karyawan	,
					'd_tgl_mulai1'		=>	$this->input->post('m_kontrak1'),
					'd_tgl_selesai1'	=>	$this->input->post('s_kontrak1'),
					'd_tgl_mulai2'		=>	$this->input->post('m_kontrak2'),
					'd_tgl_selesai2'	=>	$this->input->post('s_kontrak2'),
					'd_tgl_mulai3'		=>	$this->input->post('m_kontrak3'),
					'd_tgl_selesai3'	=>	$this->input->post('s_kontrak3'),
					'd_tgl_permanent'	=>	$this->input->post('permanet'),
					's_status'			=>	$this->input->post('status'),
					'n_no_kontrak'		=>	$this->input->post('no_kontrak')
				);

				$addKaryawanOth = array(
					'n_id_karyawan'			=>	$id_karyawan,
					'n_npwp'			=>	$this->input->post('no_npwp'),
					'n_ktp'				=>	$this->input->post('no_ktp'),
					's_exp_ktp'			=>	$this->input->post('exp'),
					'n_bpjskes'			=>	$this->input->post('no_bpjskes'),
					'd_bpjskes'			=>	$this->input->post('tgl_bpjskes'),
					'n_bpjstk'			=>	$this->input->post('no_bpjstk'),
					'd_bpjstk'			=>	$this->input->post('tgl_bpjstk'),
					'n_rekening'		=>	$this->input->post('no_rek'),
					'd_atm'				=>	$this->input->post('tgl_atm')
				);
                
				
				$resultDet = $this->MasterKaryawanDetail_model->createNewKaryawanDetail($addKaryawanDet);
				$resultKon = $this->MasterKaryawanKontrak_model->createNewKaryawanKontrak($addKaryawanKtr);
				$resultOth = $this->MasterKaryawanOther_model->createNewKaryawanOther($addKaryawanOth);
                
                // if($result > 0)
                // {
                //     $this->session->set_flashdata('success', 'Data Karyawan Sukses Tersimpan');
                // }
                // else
                // {
                //     $this->session->set_flashdata('error', 'Data Karyawan Gagal Tersimpan');
                // }
                
                redirect('master/karyawan');
            
	}
}