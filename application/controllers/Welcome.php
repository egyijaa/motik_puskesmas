<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('form'); 
		$this->load->model('Login_model');
		// $this->load->model('Admin_model');
	}
	function index()
	{
		if ($this->session->userdata('masuk', TRUE)) {
			redirect('Welcome/home');
		}
		else{
			$this->load->view('layouts/header');
			$this->load->view('menu/login');
		}
	}
	function home()
	{
		if ($this->session->userdata('masuk', TRUE)) {
			$data['totalPasien'] = $this->Login_model->ambilPasien()->num_rows();
			$data['totalPetugas'] = $this->Login_model->ambilPetugas()->num_rows();
			$data['PetugasLogin'] = $this->Login_model->PetugasLogin();
			$data['totalDokter'] = $this->Login_model->ambilDokter()->num_rows();
			$data['totalPoli'] = $this->Login_model->ambilPoli()->num_rows();
			$data['totalRiwayat'] = $this->Login_model->ambilRiwayat()->num_rows();
			$data['totalRiwayatDokter'] = $this->Login_model->ambilRiwayatDokter()->num_rows();
			$data['totalPemeriksaan'] = $this->Login_model->ambilPemeriksaan()->num_rows();
			$akses['totalMintaAkses'] = $this->Login_model->ambilMintaAkses()->num_rows();
			$data['ready'] = $this->Login_model->fetch_hari_tugas();
			$this->load->view('layouts/header', $akses);
			$this->load->view('menu/home', $data, $akses);
			$this->load->view('layouts/footer');
		}
		else {
			redirect('Welcome');
		}
	}
	function pasien()
	{
		if ($this->session->userdata('masuk', TRUE)) {
			$data['pasien'] = $this->Login_model->SemuaPasien();
			$data['periksa'] = $this->Login_model->fetch_periksa();
			$this->load->helper(array('form', 'url'));
        	$this->load->library('form_validation');
			$this->load->view('layouts/header');
			$this->load->view('menu/pasien/pasien',$data);
			$this->load->view('layouts/footer');
		}
		else{
			redirect('Welcome');
		}
	}
	function dokter()
	{
		if ($this->session->userdata('masuk', TRUE)) {
			$data['dokter'] = $this->Login_model->SemuaDokter();
			$this->load->view('layouts/header');
			$this->load->view('menu/dokter/dokter',$data);
			$this->load->view('layouts/footer');
		}
		else{
			redirect('Welcome');
		}
	}
	function petugas()
	{
		if ($this->session->userdata('masuk', TRUE)) {
			$data['petugas'] = $this->Login_model->SemuaPetugas();
			$this->load->view('layouts/header');
			$this->load->view('menu/petugas/petugas',$data);
			$this->load->view('layouts/footer');
		}
		else{
			redirect('Welcome');
		}
	}
	function poliPeriksa()
	{
		if ($this->session->userdata('masuk', TRUE)) {
			$data['poli'] = $this->Login_model->getPoli();
			$data['pemeriksaan'] = $this->Login_model->getPemeriksaan();
			$akses['totalMintaAkses'] = $this->Login_model->ambilMintaAkses()->num_rows();
			$data['dokter'] = $this->Login_model->SemuaDokter();
			$this->load->view('layouts/header', $akses);
			$this->load->view('menu/poliPeriksa/poliPeriksa',$data);
			$this->load->view('layouts/footer');
		}
		else{
			redirect('Welcome');
		}
	}
	function riwayat()
	{
		if ($this->session->userdata('masuk', TRUE)) {
			$data['riwayat'] = $this->Login_model->SemuaRiwayat();
			$data['pasien'] = $this->Login_model->SemuaPasien();
			$data['periksa'] = $this->Login_model->fetch_periksa();
			$this->load->helper(array('form', 'url'));
        	$this->load->library('form_validation');
			$this->load->view('layouts/header');
			$this->load->view('menu/riwayat/riwayat_periksa_pasien',$data);
			$this->load->view('layouts/footer');
		}
		else{
			redirect('Welcome');
		}
	}
	function antrian()
	{
		if ($this->session->userdata('masuk', TRUE)) {
			$data['riwayat'] = $this->Login_model->AntrianPasien();
			$akses['totalMintaAkses'] = $this->Login_model->ambilMintaAkses()->num_rows();
			$this->load->helper(array('form', 'url'));
        	$this->load->library('form_validation');
			$this->load->view('layouts/header',$akses);
			$this->load->view('menu/riwayat/riwayat_antrian',$data);
			$this->load->view('layouts/footer');
		}
		else{
			redirect('Welcome');
		}
	}
	function daftarMintaAkses()
	{
		if ($this->session->userdata('masuk', TRUE)) {
			$data['riwayat'] = $this->Login_model->AntrianAkses();
			$akses['totalMintaAkses'] = $this->Login_model->ambilMintaAkses()->num_rows();
			$this->load->helper(array('form', 'url'));
        	$this->load->library('form_validation');
			$this->load->view('layouts/header',$akses);
			$this->load->view('menu/riwayat/riwayat_minta_akses',$data);
			$this->load->view('layouts/footer');
		}
		else{
			redirect('Welcome');
		}
	}
	
	function form()
	{
		if ($this->session->userdata('masuk', TRUE)) {
			$this->load->helper(array('form', 'url'));
        	$this->load->library('form_validation');
			$nav['kota'] = $this->Login_model->getKota();
			$this->load->view('layouts/header');
			$this->load->view('menu/pasien/form_daftar',$nav);
			$this->load->view('layouts/footer');
		}
		else{
			redirect('Welcome');
		}
	}
	function form_petugas()
	{
		if ($this->session->userdata('masuk', TRUE)) {
			$this->load->helper(array('form', 'url'));
        	$this->load->library('form_validation');
			$nav['poli'] = $this->Login_model->getPoli();
			$this->load->view('layouts/header');
			$this->load->view('menu/petugas/form_petugas',$nav);
			$this->load->view('layouts/footer');
		}
		else{
			redirect('Welcome');
		}
	}
	function formDokter()
	{
		if ($this->session->userdata('masuk', TRUE)) {
			$this->load->helper(array('form', 'url'));
        	$this->load->library('form_validation');
			$data['poli'] = $this->Login_model->getPoli();
			$data['hari'] = $this->Login_model->getHari();
			$this->load->view('layouts/header');
			$this->load->view('menu/dokter/form_dokter_baru',$data);
			$this->load->view('layouts/footer');
		}
		else{
			redirect('Welcome');
		}
	}
	function toRegister()
	{
		if ($this->session->userdata('masuk', TRUE)) {
			redirect('page');
		}
		else{
			$this->load->helper(array('form', 'url'));
        	$this->load->library('form_validation');
			$this->load->library('email');
			$data['angkatan'] = $this->Alumni_model->getAngkatan();
			$this->load->view('layouts/header');
			$this->load->view('depan/v_register', $data);
			$this->load->view('layouts/footer');
		}
		
	}

	function auth()
	{
		$username = htmlspecialchars($this->input->post('username', TRUE), ENT_QUOTES);
		$password =$this->input->post('password');
		$cek_akun = $this->Login_model->auth_akun($username);
		$cek_dokter = $this->Login_model->login_dokter($username);
		if ($cek_akun->num_rows() > 0) { //jika login sebagai admin
			$data = $cek_akun->row_array();
			if (password_verify($password, $data['password'])){
				$this->session->set_userdata('masuk', TRUE);
				if ($data['role'] == 'supervisor'){
					$this->session->set_userdata('akses', '0');
				}
				else {
					$this->session->set_userdata('akses', '1');
				}	
				$this->session->set_userdata('ses_id', $data['idPetugas']);
				$this->session->set_userdata('ses_user', $data['username']);
				$this->session->set_userdata('ses_nama', $data['nama_petugas']);
				$this->session->set_userdata('ses_role', $data['role']);
				$this->Login_model->status_login($username,1);
				redirect($this->session->userdata('rurl'));
			}
			else {
				echo $this -> session -> set_flashdata('#error-msg', '<div class="alert alert-warning" align="center">Password yang anda masukkan Salah!</div>');
				redirect('Welcome');
			}
		}
		else if ($cek_dokter->num_rows() > 0) { //jika login sebagai admin
			$data = $cek_dokter->row_array();
			if (password_verify($password, $data['password'])){
				$this->session->set_userdata('masuk', TRUE);
				$this->session->set_userdata('akses', '1');
				$this->session->set_userdata('ses_id', $data['idDokter']);
				$this->session->set_userdata('ses_user', $data['username']);
				$this->session->set_userdata('ses_nama', $data['nama_dokter']);
				redirect($this->session->userdata('rurl'));
			}
			else {
				echo $this -> session -> set_flashdata('#error-msg', '<div class="alert alert-warning" align="center">Password yang anda masukkan Salah!</div>');
				redirect('Welcome');
			}
		}
		else {  
			echo $this->session-> set_flashdata('#error-msg', '<div class="alert alert-danger" align="center">Username Belum Terdaftar!</div>');
			redirect('Welcome');
		}
	}
	function logout()
	{
		$username = $this->session->userdata('ses_user');
		$this->Login_model->status_login($username,0);
		$this->session->sess_destroy();
		$url = base_url('');
		redirect($url);
	}
	public function pasienbaru()
	{	
		
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
		$this->load->library('email');
        

        $this->form_validation->set_rules('form_intitule', 'No_KTP', 'required|min_length[5]|max_length[30]|is_unique[pasien.no_ktp]');
        $this->form_validation->set_rules('form_intitule2', 'Nama', 'required');
		$this->form_validation->set_rules('form_intitule3', 'Nomor' ,'required|max_length[15]|min_length[9]|is_unique[pasien.no_hp]');
		$this->form_validation->set_rules('kotaPilihan', 'Kota', 'required');
        $this->form_validation->set_rules('form_intitule6', 'Alamat', 'required');

        $this->form_validation->set_message('required', 'Harap isi {field}!, Jangan dikosongkan!');
		$this->form_validation->set_message('is_unique', '{field} sudah dipakai!, Masukkan {field} lain!');

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(['success'=>array(
                'form_intitule' => '<div class="btn btn-outline-success btn-sm ml-2" style="pointer-events: none;">Nomor KTP dapat Digunakan</div>'
            ),'error'=>array(
                'form_intitule' => form_error('form_intitule', '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">', '</div>'),
                'form_intitule2' => form_error('form_intitule2', '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">', '</div>'),
				'form_intitule3' => form_error('form_intitule3', '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">', '</div>'),
				'kotaPilihan' => form_error('kotaPilihan', '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">', '</div>'),
				'form_intitule6' => form_error('form_intitule6', '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">', '</div>')
			)]);
        }
		else {
			$trigger = $this->Login_model->addPasien();
			if (isset($trigger["error"])) {
				echo json_encode(array("message" => "failed", "error" => $trigger["error"]));
			} else {
				echo json_encode(array("message" => "success"));
			}
		}
	}

	public function petugasbaru()
	{	
		
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('form_intitule', 'Username', 'required|min_length[5]|max_length[30]|is_unique[petugas.username]');
        $this->form_validation->set_rules('form_intitule2', 'Nama', 'required');
		$this->form_validation->set_rules('form_intitule3', 'Nomor' ,'required|max_length[15]|min_length[9]|is_unique[petugas.no_hp]');
		$this->form_validation->set_rules('poliPilihan', 'Poli', 'required');
		$this->form_validation->set_rules('role', 'Role', 'required');
        $this->form_validation->set_rules('form_intitule6', 'Alamat', 'required');

        $this->form_validation->set_message('required', 'Harap isi {field}!, Jangan dikosongkan!');
		$this->form_validation->set_message('is_unique', '{field} sudah dipakai!, Masukkan {field} lain!');

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(['success'=>array(
                'form_intitule' => '<div class="btn btn-outline-success btn-sm ml-2" style="pointer-events: none;">Username dapat Digunakan</div>'
            ),'error'=>array(
                'form_intitule' => form_error('form_intitule', '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">', '</div>'),
                'form_intitule2' => form_error('form_intitule2', '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">', '</div>'),
				'form_intitule3' => form_error('form_intitule3', '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">', '</div>'),
				'poliPilihan' => form_error('poliPilihan', '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">', '</div>'),
				'role' => form_error('role', '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">', '</div>'),
				'form_intitule6' => form_error('form_intitule6', '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">', '</div>')
			)]);
        }
		else {
			$trigger = $this->Login_model->addPetugas();
			if (isset($trigger["error"])) {
				echo json_encode(array("message" => "failed", "error" => $trigger["error"]));
			} else {
				echo json_encode(array("message" => "success"));
			}
		}
	}

	public function dokterbaru()
	{	
		
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('form_intitule', 'Nama', 'required');
		$this->form_validation->set_rules('form_intitule2', 'Nomor' ,'required|max_length[15]|min_length[9]|is_unique[dokter.no_hp_dokter]');
		$this->form_validation->set_rules('form_intitule6', 'Username' ,'required|max_length[50]|min_length[6]|is_unique[dokter.username]');
		$this->form_validation->set_rules('poliPilihan', 'Kota', 'required');
		$this->form_validation->set_rules('checkboxPrimary[]', 'Hari', 'required');
        $this->form_validation->set_rules('form_intitule3', 'Alamat', 'required');

        $this->form_validation->set_message('required', 'Harap isi {field}!, Jangan dikosongkan!');
		$this->form_validation->set_message('is_unique', '{field} sudah dipakai!, Masukkan {field} lain!');

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(['error'=>array(
                'form_intitule' => form_error('form_intitule', '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">', '</div>'),
                'form_intitule2' => form_error('form_intitule2', '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">', '</div>'),
				'form_intitule3' => form_error('form_intitule3', '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">', '</div>'),
				'form_intitule6' => form_error('form_intitule6', '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">', '</div>'),
				'checkboxPrimary' => form_error('checkboxPrimary[]', '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">', '</div>'),
				'poliPilihan' => form_error('poliPilihan', '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">', '</div>')
			)]);
        }
		else {
			$trigger = $this->Login_model->addDokter();
			if (isset($trigger["error"])) {
				echo json_encode(array("message" => "failed", "error" => $trigger["error"]));
			} else {
				echo json_encode(array("message" => "success"));
			}
		}
	}
	public function poliBaru()
	{	
		
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('namaPoli', 'Nama', 'required|min_length[5]|is_unique[poli.nama_poli]');

        $this->form_validation->set_message('required', 'Harap isi {field}!, Jangan dikosongkan!');
		$this->form_validation->set_message('is_unique', '{field} sudah dipakai!, Masukkan {field} lain!');

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(['error'=>array(
                'namaPoli' => form_error('namaPoli', '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">', '</div>')
			)]);
        }
		else {
			$trigger = $this->Login_model->addPoli();
			if (isset($trigger["error"])) {
				echo json_encode(array("message" => "failed", "error" => $trigger["error"]));
			} else {
				echo json_encode(array("message" => "success"));
			}
		}
	}
	public function pemeriksaanBaru()
	{	
		
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('namaPemeriksaan', 'Nama', 'required|min_length[5]|is_unique[pemeriksaan.nama_pemeriksaan]');
        $this->form_validation->set_rules('hargaPemeriksaan', 'Harga', 'required');
		$this->form_validation->set_rules('jenisPoli', 'Poli', 'required');

        $this->form_validation->set_message('required', 'Harap isi {field}!, Jangan dikosongkan!');
		$this->form_validation->set_message('is_unique', '{field} sudah dipakai!, Masukkan {field} lain!');

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(['error'=>array(
                'namaPemeriksaan' => form_error('namaPemeriksaan', '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">', '</div>'),
                'hargaPemeriksaan' => form_error('hargaPemeriksaan', '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">', '</div>'),
                'jenisPoli' => form_error('jenisPoli', '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">', '</div>')
			)]);
        }
		else {
			$trigger = $this->Login_model->addPemeriksaan();
			if (isset($trigger["error"])) {
				echo json_encode(array("message" => "failed", "error" => $trigger["error"]));
			} else {
				echo json_encode(array("message" => "success"));
			}
		}
	}
	public function delPasien()
    { 
      $username = $this->input->post('delAlumni');
      $cek_pasien = $this->Login_model->auth_pasien($username);
      if ($cek_pasien->num_rows() != 0){
          $this->Login_model->delPasien();
          echo $this -> session -> set_flashdata('pesanHapus', '<div class="alert alert-warning" align="center"><i class="fas fa-check-double"></i> Akun dengan nomor KTP : '.$username.' Berhasil Dihapus!</div>');
      }
      else {
        echo $this -> session -> set_flashdata('pesanHapus', '<div class="alert alert-danger" align="center">Akun dengan nomor KTP : '.$username.' Tidak Ada atau Sudah Dihapus!</div>');
      }
      redirect('Welcome/pasien');
    }

	public function delPetugas()
    { 
      $username = $this->input->post('delAlumni');
      $cek_petugas = $this->Login_model->auth_petugas($username);
      if ($cek_petugas->num_rows() != 0){
          $this->Login_model->delPetugas($username);
          echo $this -> session -> set_flashdata('pesanHapus', '<div class="alert alert-warning" align="center"><i class="fas fa-check-double"></i> Akun dengan Username : '.$username.' Berhasil Dihapus!</div>');
      }
      else {
        echo $this -> session -> set_flashdata('pesanHapus', '<div class="alert alert-danger" align="center">Akun Username : '.$username.' Tidak Ada atau Sudah Dihapus!</div>');
      }
      redirect('Welcome/petugas');
    }

	public function delPoli()
    { 
      $id = $this->input->post('delAlumni');
      $cek_poli = $this->Login_model->auth_poli($id);
      if ($cek_poli->num_rows() != 0){
          $this->Login_model->delPoli($id);
          echo $this -> session -> set_flashdata('pesanHapus', '<div class="alert alert-warning" align="center"><i class="fas fa-check-double"></i> Jenis Poli Berhasil Dihapus!</div>');
      }
      else {
        echo $this -> session -> set_flashdata('pesanHapus', '<div class="alert alert-danger" align="center">Jenis Poli Tidak Ada atau Sudah Dihapus!</div>');
      }
      redirect('Welcome/poliPeriksa');
    }
	public function delPemeriksaan()
    { 
      $id = $this->input->post('hapusPemeriksaan');
      $cek_pemeriksaan = $this->Login_model->auth_pemeriksaan($id);
      if ($cek_pemeriksaan->num_rows() != 0){
          $this->Login_model->delPemeriksaan($id);
          echo $this -> session -> set_flashdata('pesanHapus2', '<div class="alert alert-warning" align="center"><i class="fas fa-check-double"></i> Jenis Pemeriksaan Berhasil Dihapus!</div>');
      }
      else {
        echo $this -> session -> set_flashdata('pesanHapus2', '<div class="alert alert-danger" align="center">Jenis Pemeriksaan Tidak Ada atau Sudah Dihapus!</div>');
      }
      redirect('Welcome/poliPeriksa');
    }
	public function delDokter()
    { 
      $id = $this->input->post('delAlumni');
      $cek_dokter = $this->Login_model->auth_dokter($id);
      if ($cek_dokter->num_rows() != 0){
          $this->Login_model->delDokter($id);
          echo $this -> session -> set_flashdata('pesanHapus2', '<div class="alert alert-warning" align="center"><i class="fas fa-check-double"></i> Dokter Berhasil Dihapus!</div>');
      }
      else {
        echo $this -> session -> set_flashdata('pesanHapus2', '<div class="alert alert-danger" align="center">Dokter Tidak Ada atau Sudah Dihapus!</div>');
      }
      redirect('Welcome/poliPeriksa');
    }
	public function delRiwayat()
    { 
      $id = $this->input->post('delAlumni');
      $cek_pasien = $this->Login_model->auth_riwayat($id);
      if ($cek_pasien->num_rows() != 0){
          $this->Login_model->delRiwayat();
          echo $this -> session -> set_flashdata('pesanHapus', '<div class="alert alert-info" align="center"><i class="fas fa-check-double"></i> Riwayat dengan Kode : '.$id.' Berhasil Dihapus!</div>');
      }
      else {
        echo $this -> session -> set_flashdata('pesanHapus', '<div class="alert alert-warning" align="center">Riwayat dengan Kode : '.$id.' Tidak Ada atau Sudah Dihapus!</div>');
      }
      redirect('Welcome/riwayat');
    }
	function fetch_state()
	{
		if($this->input->post('periksaID'))
		{
			echo $this->Login_model->fetch_dokter($this->input->post('periksaID'));
		}
	}
	function cek() {
		if ($this->session->userdata('masuk', TRUE)) {
			$data['detail'] = $this->Login_model->SatuRiwayat($this->input->post('riwayatID'));
			$data['id'] = $this->input->post('riwayatID');
			$this->load->view('layouts/header');
			$this->load->view('menu/riwayat/invoice',$data);
			$this->load->view('layouts/footer');
		}
		else{
			redirect('Welcome');
		}
	}
	function cek2() {
		if ($this->session->userdata('masuk', TRUE)) {
			$data['detail'] = $this->Login_model->lastRowRiwayat();
			$this->load->view('layouts/header');
			$this->load->view('menu/riwayat/invoice',$data);
			$this->load->view('layouts/footer');
		}
		else{
			redirect('Welcome');
		}
	}
	function print($id) {
		if ($this->session->userdata('masuk', TRUE)) {
			$data['detail'] = $this->Login_model->SatuRiwayat($id);
			$this->load->view('menu/riwayat/invoice-print', $data);
		}
		else{
			redirect('Welcome');
		}
	}
	public function pasienPeriksaBaru()
	{	
		
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('noKTP', 'Nomor KTP', 'required');
		$this->form_validation->set_rules('jenisPeriksa', 'Periksa', 'required');
		$this->form_validation->set_rules('dokter', 'Dokter', 'required');
		$this->form_validation->set_message('is_unique', '{field} sudah dipakai!, Masukkan {field} lain!');

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(['error'=>array(
                'noKTP' => form_error('noKTP', '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">', '</div>'),
				'namaPetugas' => form_error('namaPetugas', '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">', '</div>'),
				'jenisPeriksa' => form_error('jenisPeriksa', '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">', '</div>'),
				'dokter' => form_error('dokter', '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">', '</div>')
			)]);
        }
		else {
			$trigger = $this->Login_model->addPasienPeriksa();
			if (isset($trigger["error"])) {
				echo json_encode(array("message" => "failed", "error" => $trigger["error"]));
			} else {
				echo json_encode(array("message" => "success"));
			}
		}
	}
	public function updHasilPeriksa()
	{	
		
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        $this->form_validation->set_rules('diagnosa', 'diagnosa', 'required');
		$this->form_validation->set_rules('keterangan', 'keterangan', 'required');

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(['error'=>array(
                'diagnosa' => form_error('diagnosa', '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">', '</div>'),
				'keterangan' => form_error('keterangan', '<div class="btn btn-outline-danger btn-sm ml-2" style="pointer-events: none;">', '</div>')
			)]);
        }
		else {
			$trigger = $this->Login_model->updPasienPeriksa();
			if (isset($trigger["error"])) {
				echo json_encode(array("message" => "failed", "error" => $trigger["error"]));
			} else {
				echo json_encode(array("message" => "success"));
			}
		}
	}
	public function mintaAkses()
    { 
      $id = $this->input->post('delAlumni');
      $cek_akses = $this->Login_model->auth_riwayat($id);
      if ($cek_akses->num_rows() != 0){
          $this->Login_model->mintaAkses();
          echo $this -> session -> set_flashdata('pesanAkses', '<div class="alert alert-info" align="center"><i class="fas fa-check-double"></i> meminta akses untuk Riwayat dengan Kode : '.$id.' Berhasil Dikirimkan!</div>');
      }
      else {
        echo $this -> session -> set_flashdata('pesanAkses', '<div class="alert alert-warning" align="center">Riwayat dengan Kode : '.$id.' Tidak Ada atau Sudah Dihapus!</div>');
      }
      redirect('Welcome/riwayat');
    }
	public function kasiAkses()
    { 
      $id = $this->input->post('delAlumni');
      $cek_akses = $this->Login_model->auth_riwayat($id);
      if ($cek_akses->num_rows() != 0){
          $this->Login_model->kasiAkses();
          echo $this -> session -> set_flashdata('pesanAkses', '<div class="alert alert-info" align="center"><i class="fas fa-check-double"></i> Akses untuk Riwayat dengan kode : '.$id.' Diberikan!</div>');
      }
      else {
        echo $this -> session -> set_flashdata('pesanAkses', '<div class="alert alert-warning" align="center">Riwayat dengan Kode : '.$id.' Tidak Ada atau Sudah Dihapus!</div>');
      }
      redirect('Welcome/daftarMintaAkses');
    }
	public function tolakAkses()
    { 
      $id = $this->input->post('delAlumni');
      $cek_akses = $this->Login_model->auth_riwayat($id);
      if ($cek_akses->num_rows() != 0){
          $this->Login_model->tolakAkses();
          echo $this -> session -> set_flashdata('pesanAkses', '<div class="alert alert-info" align="center"><i class="fas fa-check-double"></i> Akses untuk Riwayat dengan kode : '.$id.' Ditolak!</div>');
      }
      else {
        echo $this -> session -> set_flashdata('pesanAkses', '<div class="alert alert-warning" align="center">Riwayat dengan Kode : '.$id.' Tidak Ada atau Sudah Dihapus!</div>');
      }
      redirect('Welcome/daftarMintaAkses');
    }
}
