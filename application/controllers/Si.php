<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Si extends CI_Controller {

	public function __construct() {
		parent:: __construct();
		$this->load->model('Si_model');
	}

	public function index() {
		$this->data['title'] = 'Si';
		//pagination
		$this->load->library('pagination');

		//config
		$config['base_url'] = 'http://localhost/pmb/Si/index';
		$config['total_rows'] = $this->Si_model->countAllData();
		$config['per_page'] = 10;

		//styling
		$config['full_tag_open'] = '<nav><ul class="pagination">';
		$config['full_tag_close'] = '</ul></nav>';

		$config['first_link'] = 'Awal';
		$config['first_tag_open'] = '<li class="page-item">';
		$config['first_tag_close'] = '</li>';
		
		$config['last_link'] = 'Akhir';
		$config['last_tag_open'] = '<li class="page-item">';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = '&raquo';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '&laquo';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		
		$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link" href="#">';
		$config['cur_tag_close'] = '</a></li>';
		
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</a></li>';

		$config['attributes'] = array('class' => 'page-link');
		
		// initialize

		$this->pagination->initialize($config);

		$data['start'] = $this->uri->segment(3);
		$this->data['pendaftar'] = $this->Si_model->getPeoples($config['per_page'], $data['start']);

		$this->load->view('Si/Si_list', $this->data);

	}
	public function mhs() {
		
		$data = $this->Si_model->getDataSi();
		echo "<pre>";
		print_r($data);
	}

	public function prodi(){
		$this->data['title'] = "Data prodi";
		$this->data['prodi'] = $this->Si_model->listProdi();
		$this->load->view('Si/prodi', $this->data);
	}
	public function pendaftarprodi1()
	{
		$data['title'] = "Data pendaftar prodi1";
		$prodi = $this->Si_model->prodi();
		foreach($prodi as $key => $p)
		{
			$prodi[$key]['jumlah'] = $this->Si_model->PendaftarProdi1($p['id_prodi']);
			// $prodi[$key]['size'] = rand();
			
		}
		$result = null;
		foreach($prodi as $p => $prod) {
			$result[$p] = [
				"name" => $prod['nama_prodi'],
				"jumlah" => $prod['jumlah'],
				"y" => $prod['jumlah'],
			];
		}
		$data['pendaftar'] = $prodi;
        $data['grafik'] = json_encode($result);
        $this->load->view('Si/prodi1', $data);
		// $this->load->view('Si/Si_add',$data);
		
	}

	public function pendaftarprodi2()
	{
		$data['title'] = "Data pendaftar prodi2";
		$prodi = $this->Si_model->prodi();
		foreach($prodi as $key => $p)
		{
			$prodi[$key]['jumlah'] = $this->Si_model->PendaftarProdi2($p['id_prodi']);
			// $prodi[$key]['size'] = rand();
			
		}
		$result = null;
		foreach($prodi as $p => $prod) {
			$result[$p] = [
				"name" => $prod['nama_prodi'],
				"jumlah" => $prod['jumlah'],
				"y" => $prod['jumlah'],
			];
		}
		$data['pendaftar2'] = $prodi;
		$data['grafik2'] = json_encode($result);
		// echo "<pre>";
		// print_r($data);
		// die;
        $this->load->view('Si/prodi2', $data);
		// $this->load->view('Si/Si_add',$data);
		
	}
	//sampe sini--------------------------------------------
	public function mandiridata(){
		$data['title'] = "Data Mandiri";
		$data["fill"] = "Mandiri";
		$data["mandiri1"] = $this->Si_model->mandiri();
		// echo "<pre>";
		// print_r($data);
		// die;
		$this->load->view("Si/mandiri",$data);
	}
	public function datajalur(){
		$data['title'] = "Data Jalur";
		$data["fill"] = "Jalur";
		$data["jalur"] = $this->Si_model->jalur();
		// echo "<pre>";
		// print_r($data);
		// die;
		$this->load->view("Si/jalur",$data);
	}
	public function PendapatanBank(){
		$data['title'] = "Data Pendapatan Bank";
		$data["fill"] = "Bank";
		$data["bank"] = $this->Si_model->bank();
		// echo "<pre>";
		// print_r($data);
		// die;
		$this->load->view("Si/bank",$data);
	}

	
	public function KeteranganBayar(){
		$data['title'] = "Data Keterangan Bayar";
		$data["fill"] = "Keterangan Bayar";
		$data["ket"] = $this->Si_model->ket_bayar(); // baru disini
		// echo "<pre>";
		// print_r($data);
		// die;
		$this->load->view("Si/ket_bayar00",$data);
	}

	public function coba(){
		$data['title'] = 'Grafik pendaftar berdsarkan Bank';
		$bank = $this->Si_model->listbank();
		$pendaftar = $this->Si_model->pendaftarBank();
		
		// echo $this->db->last_query();
		$categories = null;
		$lunas = null;
		$belum_lunas = null;
		$sumtotal = 0;
		foreach($bank as $i => $b){
			$categories[] = $b['nama_bank'];
			foreach ($pendaftar as $key => $value) {
				if($b['id_bank'] == $value['id_bank']){
					if($value['ket_bayar'] == 'sudah'){
						$sumtotal += $value['id_bank'];
						$lunas[] = intval($value['jumlah']);
					}else {
						$sumtotal += $value['jumlah'];
						$belum_lunas[] = intval($value['jumlah']);
					}
				}
			}
		}
		$result[] = [
			'name' => 'Lunas',
			'data' => $lunas
		];
		$result[] = [
			'name' => 'Belum Lunas',
			'data' => $belum_lunas
		];
		
		$data['subtitle'] = 'Total Pendapatan';
		$grafik['data'] = json_encode($result);
		$grafik['categories'] = json_encode($categories);
		$data['grafik'] = $grafik;
		$this->load->view('Si/ket_bayar00',$data);
		// $this->render('Si/ket_bayar00',$data);

	}

}




