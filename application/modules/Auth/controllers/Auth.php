<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Auth extends CI_Controller {



	function __construct(){

		parent:: __construct();

		$this->load->model('MasterData');

		$this->load->library('session');

		date_default_timezone_set("ASIA/JAKARTA");

    }



	public function index(){

		$this->load->view('login');

	}



	public function cek_login(){

		$username = $this->input->post('username');

		$password = md5($this->input->post('password'));

		$where = array(

			'username' => $username, 

			'password' => $password

		);

		$table = "user";

		$hasil = $this->MasterData->getWhereDataAll($table,$where);


		if ($hasil->num_rows()>0) {

			$data_user = $hasil->row_array();

			$sess_data['id_user'] = $data_user['id_user'];
			$sess_data['nama_user'] = $data_user['nama_user'];
			$sess_data['email_user'] = $data_user['email'];

			if ($data_user['id_role']==1) {

				$sess_data['role'] = 'admin';

			} else {

				$sess_data['role'] = 'user';				

			}			

			$sess['alert'] = alert_success('Selamat datang '.$data_user['nama_user']);

			$this->session->set_flashdata($sess);

			$this->session->set_userdata($sess_data);

			redirect('User/User/index');


		} else {

			$sess['alert'] = alert_failed('Gagal. Mohon ulangi !');

			$this->session->set_flashdata($sess);

			redirect('Auth/index');

		}

	}



	public function logout(){

		session_destroy();

		redirect('Auth/index');

	}



}