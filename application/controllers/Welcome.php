<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	protected $title = "Dashboard";

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_anggota', 'manggota');
		$this->load->model('model_login', 'mlogin');
		$this->load->model('model_crud', 'mcrud');
		if ($this->session->user_id == "") {
			redirect('login');
		}
	}

	public function index()
	{
		$data['title'] = $this->title;
		$data['container'] = "dashboard";
		$kontakperson = $this->db->get_where("users", ["id" => $this->session->user_id])->row();
		$totalall = 1;
		$terisi = 0;
		if (in_array($this->session->role_id, [1, 2])) {
			$cek = $this->db->get_where("mitra", ["id" => $this->session->mitra_id])->row();
			if ($this->session->role_id != 0) {

				foreach ($cek as $key => $value) {
					$totalall += 1;

					if ($cek->$key == "" or is_null($cek->$key)) {
						$terisi += 0;
					} else {
						$terisi += 1;
					}
				}
				if ($kontakperson->name != "" or is_null($kontakperson->name)) {
					$terisi += 1;
				}
				$persentase = number_format(($terisi * 100 / $totalall), 2);
			} else {
				$persentase = 100;
			}
			$data['kelengkapan'] = $persentase;
		}
		$this->load->view('layouts/main', $data);
	}

	public function myprofile($savedata = null)
	{
		$this->form_validation->set_rules('formnya', 'Gagal', 'required');
		if ($this->form_validation->run() == FALSE) {
			if ($savedata == "savefoto") {
				$config = array(
					'path' => "./berkas/logo/",
					'type' => "jpeg|jpg|png"
				);
				$uploadlogo = $this->uploadfile($config, "logo");
				if ($uploadlogo['status'] == 1) {
					$this->db->update("users", ["logo" => $uploadlogo['file_name']], ["id" => $this->session->user_id]);
					redirect('welcome/myprofile');
				}
			}
			$this->viewprofile();
		} else {
			$this->saveprofile($this->input->post('formnya'));
		}
	}

	function viewprofile()
	{
		$data['title'] = "Profil Saya";
		$data['container'] = "myprofile";
		$data['cruddata'] = $this->manggota->getDataDetailByUser($this->session->user_id);
		$data['userdata'] = $this->mlogin->getDataById($this->session->user_id);
		$this->load->view('layouts/main', $data);
	}

	function saveprofile($formnya)
	{
		if ($formnya == "users") {
			$data = array(
				'email' => $this->input->post('email'),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
			);
			$this->mcrud->updateData("users", $data, $this->input->post('id'));
		} else {
			$config = array(
				'path' => "./berkas/dasarhukum/",
				'type' => "pdf"
			);
			$uploaddasarhukum = $this->uploadfile($config, "dasar_hukum", $this->input->post('id') ?? null);
			$medsos = "";
			if (is_array($this->input->post('medsos')) and is_array($this->input->post('medsosakun'))) {
				if (count($this->input->post('medsos')) > 0 and count($this->input->post('medsosakun')) > 0) {
					foreach ($this->input->post('medsos') as $key => $value) {
						$json[$value] = $this->input->post('medsosakun')[$key];
					}
					$medsos = json_encode($json);
				}
			}
			$data = array(
				'medsos' => $medsos,
				'nama_singkat' => $this->input->post('nama_singkat'),
				'nama_lengkap' => ucwords(strtolower($this->input->post('nama_lengkap'))),
				'no_telp_mitra' => $this->input->post('no_telp_mitra'),
				'no_wa_mitra' => $this->input->post('no_wa_mitra'),
				'email_kontak' => strtolower($this->input->post('email_kontak')),
				'website_mitra' => strtolower($this->input->post('website_mitra')),
				'alamat_mitra' => $this->input->post('alamat_mitra'),
				'rincian_kegiatan' => $this->input->post('rincian_kegiatan'),
				'permasalahan' => $this->input->post('permasalahan'),
				'kebutuhan' => $this->input->post('kebutuhan')
			);
			if ($uploaddasarhukum['status'] == true) {
				$data['dasar_hukum'] = $uploaddasarhukum['file_name'];
			}
			$this->mcrud->updateData("mitra", $data, $this->input->post('id'));

			$dataUser = array(
				'name' => $this->input->post('name_user'),
				'no_telp' => $this->input->post('no_telp'),
				'no_wa' => $this->input->post('no_wa'),
			);
			$this->mcrud->updateData("users", $dataUser, $this->session->user_id);
		}

		$this->session->set_flashdata("notif", ["icon" => "success", "title" => "Berhasil", "pesan" => "Data Berhasil diperbaharui ..."]);
		if ($this->input->post('link') != '') {
			redirect($this->input->post('link'));
		} else {
			redirect('welcome/myprofile');
		}
	}

	function uploadfile($confignya, $namainput, $id = null)
	{
		$config['file_name']            = date("YmdHis");
		$config['upload_path']          = $confignya['path'];
		$config['allowed_types']        = $confignya['type'] ?? 'jpg|png|jpeg|pdf';

		$this->load->library('upload', $config);

		$this->upload->initialize($config);
		if ($this->upload->do_upload($namainput)) {
			if ($id != null) {
				$cekdatanya = $this->manggota->getDataDetail($id);
				unlink($confignya['path'] . "/" . $cekdatanya->logo);
				unlink($confignya['path'] . "/" . $cekdatanya->dasar_hukum);
			}
			$data['status'] = true;
			$data['file_name'] = $this->upload->data('file_name');
		} else {
			print_r($this->upload->display_errors());
			$data['status'] = false;
		}
		return $data;
	}
}
