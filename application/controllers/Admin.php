<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct(){
		parent:: __construct();
		$this->load->model('MasterData');
		$this->load->library('session');
		date_default_timezone_set("ASIA/JAKARTA");
    }

	function index(){

		$data['kategori'] = $this->MasterData->getData('kategori');

		$this->load->view('map/header');
		$this->load->view('map/navigation');
		$this->load->view('map/main',$data);
		$this->load->view('map/footer');
	}

	function getDataBangunan(){
		$data = $this->MasterData->getData('bangunan')->result();
		echo json_encode($data);
	}

}

