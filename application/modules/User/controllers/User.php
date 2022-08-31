<?php

defined('BASEPATH') or exit('No direct script access allowed');



class User extends CI_Controller
{



	function __construct()
	{

		parent::__construct();

		$this->load->model('MasterData');

		$this->load->library('session');

		date_default_timezone_set("ASIA/JAKARTA");

		if ($this->session->userdata('role') != 'user') {

			redirect('Auth/Auth/index');
		}
	}

	public function index()
	{

		$data['nav'] = 1;

		$id_user = $this->session->userdata('id_user');

		$data['kategori'] = $this->MasterData->getData('kategori');



		$select = 'sum(nominal_pengeluaran) as total';

		$where = "month(waktu) = month(CURRENT_DATE) and year(waktu) = year(CURRENT_DATE) and id_user='$id_user'";

		$data['bulan'] = $this->MasterData->getWhereData($select, 'pengeluaran', $where)->row()->total;



		$select = "ifnull(sum(nominal_pengeluaran),0) as total";

		$where = "date(waktu) = CURRENT_DATE() and id_user='$id_user'";

		$data['today'] = $this->MasterData->getWhereData($select, 'pengeluaran', $where)->row()->total;



		$select = "ifnull(sum(nominal_pengeluaran),0) as total";

		$where = "date(waktu) = CURRENT_DATE() and id_user='$id_user' and id_kategori=1";

		$data['sandang'] = $this->MasterData->getWhereData($select, 'pengeluaran', $where)->row()->total;



		$where = "date(waktu) = CURRENT_DATE() and id_user='$id_user' and id_kategori=2";

		$data['pangan'] = $this->MasterData->getWhereData($select, 'pengeluaran', $where)->row()->total;



		$where = "date(waktu) = CURRENT_DATE() and id_user='$id_user' and id_kategori=3";

		$data['papan'] = $this->MasterData->getWhereData($select, 'pengeluaran', $where)->row()->total;



		$where = "date(waktu) = CURRENT_DATE() and id_user='$id_user' and id_kategori=4";

		$data['tersier'] = $this->MasterData->getWhereData($select, 'pengeluaran', $where)->row()->total;


		$now = new DateTime("7 days ago", new DateTimeZone('Asia/Jakarta'));
		$interval = new DateInterval('P1D'); // 1 Day interval
		$period = new DatePeriod($now, $interval, 7); // 7 Days

		$sevenday = array();
		foreach ($period as $day) {
			$key = $day->format('Y-m-d');
			array_push($sevenday, $key);
		}

		$data['date'] = array_reverse($sevenday, true);

		$data['weekly'] = $this->MasterData->transaksi_pengeluaran()->result();

		// var_dump($data['seminggu']);


		$this->load->view('header');

		$this->load->view('navigation', $data);

		$this->load->view('main', $data);

		$this->load->view('footer');
	}

	function simpan()
	{
		$data = $_POST;
		$datetime = date('Y-m-d H:i:s');
		$data['waktu'] = $datetime;
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://bulananku-laravel.pieceofsite.com/api/get_from_web/outcome',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => array('email' => $this->session->userdata('email_user'), 'description' => $data['ket_pengeluaran'], 'nominal' => $data['nominal_pengeluaran'], 'category_id' => $data['id_kategori']),
		));

		$response = curl_exec($curl);
		curl_close($curl);
		$result = json_decode($response);

		if (empty($result)) {
			$sess['alert'] = alert_failed('Gagal pengiriman data api. Mohon ulangi !');
			$this->session->set_flashdata($sess);
			redirect('User/index');
		}

		if ($result->success == true) {
			$save = $this->MasterData->inputData($data, 'pengeluaran');
			if ($save) {
				$sess['alert'] = alert_success('Berhasil disimpan.');
				$this->session->set_flashdata($sess);
				redirect('User/index');
			} else {
				$sess['alert'] = alert_failed('Gagal. Mohon ulangi !');
				$this->session->set_flashdata($sess);
				redirect('User/index');
			}
		} else {
			$sess['alert'] = alert_failed('Gagal pengiriman data api. Mohon ulangi !');
			$this->session->set_flashdata($sess);
			redirect('User/index');
		}
	}

	function simpanPemasukan()
	{
		$data = $_POST;
		$datetime = date('Y-m-d H:i:s');
		$data['tanggal'] = $datetime;

		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://bulananku-laravel.pieceofsite.com/api/get_from_web/income',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => array('email' => $this->session->userdata('email_user'), 'description' => $data['ket'], 'nominal' => $data['nominal']),
		));

		$response = curl_exec($curl);
		curl_close($curl);
		$result = json_decode($response);

		if (empty($result)) {
			$sess['alert'] = alert_failed('Gagal pengiriman data api. Mohon ulangi !');
			$this->session->set_flashdata($sess);
			redirect('User/index');
		}

		if ($result->success == true) {
			$save = $this->MasterData->inputData($data, 'pemasukan');
			if ($save) {
				$sess['alert'] = alert_success('Berhasil disimpan.');
				$this->session->set_flashdata($sess);
				redirect('User/index');
			} else {
				$sess['alert'] = alert_failed('Gagal. Mohon ulangi !');
				$this->session->set_flashdata($sess);
				redirect('User/index');
			}
		} else {
			$sess['alert'] = alert_failed('Gagal pengiriman data api. Mohon ulangi !');
			$this->session->set_flashdata($sess);
			redirect('User/index');
		}
	}

	function report($thn = '')
	{

		$data['nav'] = 2;

		if ($thn == '') {
			$thn = date('Y');
		}

		$select = 'month(waktu) as bulan, sum(nominal_pengeluaran) as total';

		$where = "year(waktu) = '$thn' GROUP by month(waktu)";

		$data['outcome'] = $this->MasterData->getWhereData($select, 'pengeluaran', $where)->result();

		$select = "month(tanggal) as bulan, sum(nominal) as total";

		$where = "year(tanggal) = '$thn' GROUP by month(tanggal)";

		$data['income'] = $this->MasterData->getWhereData($select, 'pemasukan', $where)->result();

		$select = 'distinct(year(waktu)) as year';

		$data['years'] = $this->MasterData->getSelectData($select, 'pengeluaran')->result();

		$where = 'month(waktu) = month(NOW()) and year(waktu) = year(NOW())';

		$data['detail'] = $this->MasterData->getWhereData('*', 'pengeluaran', $where)->result();

		// var_dump($data['laporan']);exit();

		$this->load->view('header');

		$this->load->view('navigation', $data);

		$this->load->view('report', $data);

		$this->load->view('footer');
	}
}
