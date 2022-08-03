<?php
class Login_model extends CI_Model{

    public $hari_ini;
    public function __construct()
    {
        $this->load->library('vigenere'); 
        date_default_timezone_set("Asia/Bangkok");
        $hari = date ("D");
			switch($hari){
				case 'Sun':
					$this->hari_ini = "Minggu";
				break;
		
				case 'Mon':			
					$this->hari_ini = "Senin";
				break;
		
				case 'Tue':
					$this->hari_ini = "Selasa";
				break;
		
				case 'Wed':
					$this->hari_ini = "Rabu";
				break;
		
				case 'Thu':
					$this->hari_ini = "Kamis";
				break;
		
				case 'Fri':
					$this->hari_ini = "Jumat";
				break;
		
				case 'Sat':
					$this->hari_ini = "Sabtu";
				break;

				default:
                    $this->hari_ini = "Tidak di ketahui";		
				break;
			}
    }

	function auth_akun($username){
		$query=$this->db->query("SELECT * FROM petugas WHERE BINARY username ='" . $username . "' LIMIT 1");
		return $query;
	}
	function login_dokter($username){
		$query=$this->db->query("SELECT * FROM dokter WHERE BINARY username ='" . $username . "' LIMIT 1");
		return $query;
	}
	function status_login($username,$status){
		
        $this->db->set('login_status', $status);
        $this->db->where('username', $username);
        $this->db->update('petugas');
        return true;
	}

	//cek nim dan password alumni
	public function getKota()
    {
        $data = $this->db->query("SELECT * FROM kota order by nama_kota");
        return $data->result_array();
    }
	public function getPoli()
    {
        $data = $this->db->query("SELECT * FROM poli");
        return $data->result_array();
    }
	public function getPemeriksaan()
    {
        $data = $this->db->query("SELECT a.*, b.nama_poli FROM pemeriksaan a left JOIN poli b on a.poli_idPoli = b.idPoli;");
        return $data->result_array();
    }
	public function getHari()
    {
        $data = $this->db->query("SELECT * FROM hari");
        return $data->result_array();
    }
    public function addPasien()
    {
        $ktp = $this->input->post('form_intitule');
        $nama = $this->input->post('form_intitule2');
        $nomor = $this->input->post('form_intitule3');
        // $pass = password_hash($this->pass, PASSWORD_DEFAULT);
        $kota = $this->input->post('kotaPilihan');
        date_default_timezone_set("Asia/Bangkok");
        $tanggal = date("Y-m-d H:i:s");
        $date = date( 'Y-m-d H:i:s', strtotime( $this->input->post('tanggal') ) );
        $alamat = $this->input->post('form_intitule6');

        $kota = $this->db->query("SELECT idKota FROM kota WHERE idKota = '" . $kota . "'");
        $kota = $kota->row_array()["idKota"];

        $check = $this->db->query("SELECT no_ktp FROM pasien WHERE BINARY no_ktp = '" . $ktp . "'");
        $check2 = $this->db->query("SELECT no_hp FROM pasien WHERE BINARY no_hp = '" . $nomor . "'");

        $log = array();
        if($check->num_rows() == 1){
            $log["error"] = "Nomor KTP sudah Terdaftar!";
            return $log;
        }
        else if($check2->num_rows() > 0){
            $log["error"] = "Nomor Sudah Terpakai, mohon pakai email lain!";
            return $log;
        }
        $register = $this->db->query("INSERT INTO pasien (no_ktp, nama_pasien, no_hp, tgl_lahir, alamat, kota_idKota, daftar) VALUES ('" . $ktp . "','" . $nama . "','" . $nomor . "','" . $date . "','" . $alamat . "','" . $kota . "','" . $tanggal . "')");
        $log["error"] = $this->db->error();
        if($register){
            $log["error"] = NULL;
        }else{
            $this->db->query("DELETE FROM pasien WHERE no_ktp = '" . $ktp . "'");
        }
        return $log;
    }

    public function addDokter()
    {
        $nama = $this->input->post('form_intitule');
        $username = $this->input->post('form_intitule6');
        $nomor = $this->input->post('form_intitule2');
        // $pass = password_hash($this->pass, PASSWORD_DEFAULT);
        $poli = $this->input->post('poliPilihan');
        $alamat = $this->input->post('form_intitule3');
        $pass = password_hash('dokterbaru123', PASSWORD_DEFAULT);
        
        $check2 = $this->db->query("SELECT no_hp_dokter FROM dokter WHERE BINARY no_hp_dokter = '" . $nomor . "'");

        $log = array();
        if($check2->num_rows() > 0){
            $log["error"] = "Nomor Sudah Terpakai, mohon pakai nomor lain!";
            return $log;
        }
        $register = $this->db->query("INSERT INTO dokter (poli_idPoli, username, password, nama_dokter, no_hp_dokter, alamat_dokter) VALUES ('" . $poli. "','" . $username . "','" . $pass . "','" . $nama . "','" . $nomor . "','" . $alamat . "')");
        $log["error"] = $this->db->error();
        if($register){
            $check = $this->db->query("SELECT idDokter FROM dokter WHERE idDokter=(SELECT MAX(idDokter) FROM dokter);");
            $id = $check->row_array()["idDokter"];
            if ($this->input->post('checkboxPrimary')!=null || $this->input->post('checkboxPrimary') != '') {
                for ($i=0; $i < count($this->input->post('checkboxPrimary')); $i++) { 
                    $this->db->query("INSERT INTO dokter_has_hari (dokter_idDokter, hari_idHari) VALUES ('" . $id. "','" . $this->input->post('checkboxPrimary['.$i.']') . "')");
                }
            }
            $log["error"] = NULL;
        }else{
            $check = $this->db->query("SELECT idDokter FROM dokter WHERE idDokter=(SELECT MAX(idDokter) FROM dokter);");
            $id = $check->row_array()["idDokter"];
            $this->db->query("DELETE FROM dokter WHERE idDokter = '" . $id . "'");
        }
        return $log;
    }
    public function ambilPasien() {
        $query=$this->db->query("SELECT no_ktp FROM pasien");
		return $query;
    }
    public function ambilPetugas() {
        $query=$this->db->query("SELECT username FROM petugas");
		return $query;
    }
    public function PetugasLogin() {
        $data=$this->db->query("SELECT idPetugas, nama_petugas, no_hp FROM petugas where login_status = 1");
		return $data->result_array();
    }
    public function ambilDokter() {
        $query=$this->db->query("SELECT idDokter FROM dokter");
		return $query;
    }
    public function ambilPoli() {
        $query=$this->db->query("SELECT idPoli FROM poli");
		return $query;
    }
    public function ambilPemeriksaan() {
        $query=$this->db->query("SELECT idPemeriksaan FROM pemeriksaan");
		return $query;
    }
    public function ambilMintaAkses() {
        $query=$this->db->query("SELECT idRiwayat FROM pasien_has_pemeriksaan where akses = 1");
		return $query;
    }
    public function ambilRiwayat() {
        $query=$this->db->query("SELECT idRiwayat FROM pasien_has_pemeriksaan");
		return $query;
    }
    public function ambilRiwayatDokter() {
        $query=$this->db->query("SELECT idRiwayat, dokter_idDokter FROM pasien_has_pemeriksaan where dokter_idDokter = '".$this->session->userdata('ses_id')."'");
		return $query;
    }
    public function SemuaPasien() {
        $data =$this->db->query("SELECT a.no_ktp, a.nama_pasien, a.no_hp, a.tgl_lahir, a.alamat, a.daftar, b.nama_kota FROM pasien a left join kota b ON a.kota_idKota = b.idKota order by daftar DESC");
		return $data->result_array();
    }
    public function SemuaPetugas() {
        $data =$this->db->query("SELECT a.*, b.nama_poli FROM petugas a left join poli b on a.poli_idPoli = b.idPoli");
		return $data->result_array();
    }
    public function SemuaDokter() {
        $data =$this->db->query("SELECT a.dokter_idDokter, b.nama_dokter, b.no_hp_dokter, b.alamat_dokter, d.idPoli, d.nama_poli,
        GROUP_CONCAT(DISTINCT c.nama_hari SEPARATOR ', ') AS 'Hari'
    from dokter_has_hari a
    INNER JOIN dokter b
        ON a.dokter_idDokter = b.idDokter
    INNER JOIN hari c
        ON a.hari_idHari = c.idHari
    INNER JOIN poli d
        ON b.poli_idPoli = d.idPoli
    GROUP BY
        a.dokter_idDokter");
		return $data->result_array();
    }
    public function SemuaRiwayat() {
        $data =$this->db->query("SELECT a.nama_Petugas, a.idRiwayat, f.nama_dokter, a.diagnosa, a.keterangan, a.akses, a.pasien_no_ktp, a.periksa_idPemeriksaan, a.tanggal_periksa, c.nama_pasien, d.nama_pemeriksaan, e.idPoli, e.nama_poli FROM pasien_has_pemeriksaan a left join dokter f ON a.dokter_idDokter = f.idDokter left join pasien c ON a.pasien_no_ktp = c.no_ktp left join pemeriksaan d ON a.periksa_idPemeriksaan  = d.idPemeriksaan left join poli e ON d.poli_idPoli  = e.idPoli  order by tanggal_periksa DESC");
		return $data->result_array();
    }
    public function AntrianPasien() {
        $data =$this->db->query("SELECT a.idRiwayat, f.nama_dokter, a.pasien_no_ktp, a.diagnosa, a.keterangan, a.periksa_idPemeriksaan, a.nama_Petugas, a.tanggal_periksa, c.nama_pasien, d.nama_pemeriksaan, e.idPoli, e.nama_poli, a.akses FROM pasien_has_pemeriksaan a left join dokter f ON a.dokter_idDokter = f.idDokter left join pasien c ON a.pasien_no_ktp = c.no_ktp left join pemeriksaan d ON a.periksa_idPemeriksaan  = d.idPemeriksaan left join poli e ON d.poli_idPoli  = e.idPoli  where f.nama_dokter = '".$this->session->userdata('ses_nama')."' order by tanggal_periksa DESC");
		return $data->result_array();
    }
    public function AntrianAkses() {
        $data =$this->db->query("SELECT a.idRiwayat, f.nama_dokter, a.pasien_no_ktp, a.diagnosa, a.keterangan, a.periksa_idPemeriksaan, a.nama_Petugas, a.tanggal_periksa, c.nama_pasien, d.nama_pemeriksaan, e.idPoli, e.nama_poli, a.akses FROM pasien_has_pemeriksaan a left join dokter f ON a.dokter_idDokter = f.idDokter left join pasien c ON a.pasien_no_ktp = c.no_ktp left join pemeriksaan d ON a.periksa_idPemeriksaan  = d.idPemeriksaan left join poli e ON d.poli_idPoli  = e.idPoli  where f.nama_dokter = '".$this->session->userdata('ses_nama')."' and a.akses = 1 order by tanggal_periksa DESC");
		return $data->result_array();
    }
    public function SatuRiwayat($ID) {
        $data =$this->db->query("SELECT a.idRiwayat, a.pasien_no_ktp, a.periksa_idPemeriksaan, a.nama_Petugas, a.tanggal_periksa, a.keterangan, b.idDokter, b.nama_dokter, c.nama_pasien, c.no_hp, c.tgl_lahir, c.daftar, d.nama_pemeriksaan, e.idPoli, a.akses, e.nama_poli FROM pasien_has_pemeriksaan a left join dokter b ON a.dokter_idDokter = b.idDokter left join pasien c ON a.pasien_no_ktp = c.no_ktp left join pemeriksaan d ON a.periksa_idPemeriksaan  = d.idPemeriksaan left join poli e ON d.poli_idPoli  = e.idPoli  where a.idRiwayat = '".$ID."' order by tanggal_periksa DESC;");
		return $data->result_array();
    }
    function auth_pasien($username){
		$query=$this->db->query("SELECT * from pasien WHERE BINARY no_ktp ='" . $username . "'LIMIT 1");
		return $query;
    }
    function auth_petugas($username){
		$query=$this->db->query("SELECT * from petugas WHERE BINARY username ='" . $username . "'LIMIT 1");
		return $query;
    }
    function auth_poli($id){
		$query=$this->db->query("SELECT * from poli WHERE BINARY idPoli ='" . $id . "'LIMIT 1");
		return $query;
    }
    function auth_pemeriksaan($id){
		$query=$this->db->query("SELECT idPemeriksaan from pemeriksaan WHERE BINARY idPemeriksaan ='" . $id . "'LIMIT 1");
		return $query;
    }
    function auth_dokter($id){
		$query=$this->db->query("SELECT idDokter from dokter WHERE BINARY idDokter ='" . $id . "'LIMIT 1");
		return $query;
    }
    function auth_riwayat($riwayat){
		$query=$this->db->query("SELECT * from pasien_has_pemeriksaan WHERE BINARY idRiwayat ='" . $riwayat . "'LIMIT 1");
		return $query;
    }
    public function delPasien()
    {
        $ktp = $this->input->post('delAlumni');
        $this->db->query("DELETE FROM pasien WHERE no_ktp = '" . $ktp . "'");
    }
    public function delPetugas($username)
    {
        $this->db->query("DELETE FROM petugas WHERE username = '" . $username . "'");
    }
    public function delPoli($id)
    {
        $this->db->query("DELETE FROM poli WHERE idPoli = '" . $id . "'");
    }
    public function delPemeriksaan($id)
    {
        $this->db->query("DELETE FROM pemeriksaan WHERE idPemeriksaan = '" . $id . "'");
    }
    public function delDokter($id)
    {
        $this->db->query("DELETE FROM dokter WHERE idDokter = '" . $id . "'");
    }
    public function delRiwayat()
    {
        $riwayat = $this->input->post('delAlumni');
        $this->db->query("DELETE FROM pasien_has_pemeriksaan WHERE idRiwayat = '" . $riwayat . "'");
    }
    function fetch_hari_tugas()
    {   
        $data = $this->db->query("SELECT a.idDokter, a.nama_dokter, a.no_hp_dokter, b.idHari, b.nama_hari, c.dokter_idDokter, c.hari_idHari, d.idPoli, d.nama_poli FROM dokter_has_hari c left join dokter a on c.dokter_idDokter = a.idDokter left join hari b on c.hari_idHari = b.idHari left join poli d on a.poli_idPoli = d.idPoli where b.nama_hari = '".$this->hari_ini."' order by c.hari_idHari");
        return $data->result_array();
    }
    function fetch_periksa()
    { 
        $data = $this->db->query("SELECT DISTINCT  a.idPemeriksaan, a.nama_pemeriksaan, a.poli_idPoli from pemeriksaan a left join dokter b on a.poli_idPoli = b.poli_idPoli left join dokter_has_hari c on b.idDokter = c.dokter_idDokter left JOIN hari d on c.hari_idHari = d.idHari WHERE d.nama_hari = '".$this->hari_ini."'");
        return $data->result_array();
    }

    function fetch_dokter($periksaID)
    {   
       $this->db->select('a.idDokter, a.nama_dokter, b.idHari, b.nama_hari, c.hari_idHari')
                    ->join('dokter_has_hari c','a.idDokter = c.dokter_idDokter','left')
                    ->join('hari b','c.hari_idHari = b.idHari','left')
                    ->where('a.poli_idPoli',$periksaID)
                    ->where('b.nama_hari', $this->hari_ini);
        $this->db->from('dokter a');
        $query = $this->db->get();
        $output = '<option value="">Pilih Dokter</option>';
        foreach($query->result() as $row){
            $output .= '<option value="'.$row->idDokter.'">'.$row->nama_dokter.'</option>';
        }
        return $output;
    }
    
    public function addPasienPeriksa()
    {
        $ktp = $this->input->post('noKTP');
        $petugas = $this->input->post('namaPetugas');
        $dokter = $this->input->post('dokter');
        // $pass = password_hash($this->pass, PASSWORD_DEFAULT);
        $pemeriksaan = $this->input->post('moredata2');
        date_default_timezone_set("Asia/Bangkok");
        $tanggal = date("Y-m-d H:i:s");
        // $keterangan = $this->encryption->encrypt($this->input->post('keterangan'));

        $log = array();
        $register = $this->db->query("INSERT INTO pasien_has_pemeriksaan (dokter_idDokter, periksa_idPemeriksaan, nama_Petugas, pasien_no_ktp, tanggal_periksa, akses) VALUES ('" . $dokter . "','" . $pemeriksaan . "','" . $petugas . "','" . $ktp . "','" . $tanggal . "',0)");
        $log["error"] = $this->db->error();
        if($register){
            $log["error"] = NULL;
        }else{
            $this->db->query("DELETE FROM pasien_has_pemeriksaan order by id desc limit 1");
        }
        return $log;
    }
    public function updPasienPeriksa()
    {   
        $kode = $this->input->post('kode');
        $diagnosa = $this->vigenere->encrypt($this->input->post('diagnosa'), 'diag');
        $keterangan = $this->vigenere->encrypt($this->input->post('keterangan'), 'ket');
        $this->db->query("UPDATE pasien_has_pemeriksaan SET diagnosa = '" . $diagnosa . "', keterangan = '" . $keterangan . "' WHERE idRiwayat = '" . $kode . "'");
    }
    public function mintaAkses()
    {
        $riwayat = $this->input->post('delAlumni');
        $this->db->query("UPDATE pasien_has_pemeriksaan SET akses = 1 WHERE idRiwayat = '" . $riwayat . "'");
    }
    public function kasiAkses()
    {
        $riwayat = $this->input->post('delAlumni');
        $this->db->query("UPDATE pasien_has_pemeriksaan SET akses = 2 WHERE idRiwayat = '" . $riwayat . "'");
    }
    public function tolakAkses()
    {
        $riwayat = $this->input->post('delAlumni');
        $this->db->query("UPDATE pasien_has_pemeriksaan SET akses = 3 WHERE idRiwayat = '" . $riwayat . "'");
    }
    public function lastRowRiwayat() {
        $data = $this->db->query("SELECT a.idRiwayat, a.pasien_no_ktp, a.periksa_idPemeriksaan, a.nama_Petugas, a.tanggal_periksa, a.keterangan, a.akses, b.idDokter, b.nama_dokter, c.nama_pasien, c.no_hp, c.tgl_lahir, c.daftar, d.nama_pemeriksaan, e.idPoli, a.akses, e.nama_poli FROM pasien_has_pemeriksaan a left join dokter b ON a.dokter_idDokter = b.idDokter left join pasien c ON a.pasien_no_ktp = c.no_ktp left join pemeriksaan d ON a.periksa_idPemeriksaan  = d.idPemeriksaan left join poli e ON d.poli_idPoli  = e.idPoli ORDER BY idRiwayat DESC LIMIT 1");
        return $data->result_array();
    }
    public function addPoli()
    {
        $nama = $this->input->post('namaPoli');
        $register = $this->db->query("INSERT INTO poli (nama_poli) VALUES ('" . $nama. "')");
        $log["error"] = $this->db->error();
        if($register){
            $log["error"] = NULL;
        }else{
            $check = $this->db->query("SELECT idPoli FROM poli WHERE idPoli=(SELECT MAX(idPoli) FROM poli);");
            $id = $check->row_array()["idPoli"];
            $this->db->query("DELETE FROM poli WHERE idPoli = '" . $id . "'");
        }
        return $log;
    }
    public function addPemeriksaan()
    {
        $nama = $this->input->post('namaPemeriksaan');
        $harga = $this->input->post('hargaPemeriksaan');
        $poli = $this->input->post('jenisPoli');
        $register = $this->db->query("INSERT INTO pemeriksaan (nama_pemeriksaan, harga, poli_idPoli) VALUES ('" . $nama. "','" . $harga. "','" . $poli. "')");
        $log["error"] = $this->db->error();
        if($register){
            $log["error"] = NULL;
        }else{
            $check = $this->db->query("SELECT idPemeriksaan FROM pemeriksaan WHERE idPemeriksaan=(SELECT MAX(idPemeriksaan) FROM pemeriksaan);");
            $id = $check->row_array()["idPemeriksaan"];
            $this->db->query("DELETE FROM pemeriksaan WHERE idPemeriksaan = '" . $id . "'");
        }
        return $log;
    }

    public function addPetugas()
    {
        $username = $this->input->post('form_intitule');
        $nama = $this->input->post('form_intitule2');
        $nomor = $this->input->post('form_intitule3');
        // $pass = password_hash($this->pass, PASSWORD_DEFAULT);
        $poli = $this->input->post('poliPilihan');
        $role = $this->input->post('role');
        $alamat = $this->input->post('form_intitule6');

        $check = $this->db->query("SELECT username FROM petugas WHERE BINARY username = '" . $username . "'");
        $check2 = $this->db->query("SELECT no_hp FROM petugas WHERE BINARY no_hp = '" . $nomor . "'");
        $pass = password_hash('petugasbaru123', PASSWORD_DEFAULT);

        $log = array();
        if($check->num_rows() == 1){
            $log["error"] = "Username sudah Terdaftar!";
            return $log;
        }
        else if($check2->num_rows() > 0){
            $log["error"] = "Nomor Sudah Terpakai, mohon pakai Nomor lain!";
            return $log;
        }
        $register = $this->db->query("INSERT INTO petugas (poli_idPoli, nama_petugas, no_hp, alamat_petugas, username, password, role, login_status) VALUES ('" . $poli . "','" . $nama . "','" . $nomor . "','" . $alamat . "','" . $username . "','" . $pass . "','" . $role . "','0')");
        $log["error"] = $this->db->error();
        if($register){
            $log["error"] = NULL;
        }else{
            $check = $this->db->query("SELECT idPetugas FROM petugas WHERE idPetugas=(SELECT MAX(idPetugas) FROM petugas);");
            $id = $check->row_array()["idPetugas"];
            $this->db->query("DELETE FROM petugas WHERE idPetugas = '" . $id . "'");
        }
        return $log;
    }
}
