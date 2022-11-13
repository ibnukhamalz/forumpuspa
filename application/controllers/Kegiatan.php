<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan extends CI_Controller
{
	protected $title = "Kegiatan";

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_kegiatan', 'mkegiatan');
		$this->load->model('model_enumeration', 'menum');
		$this->load->model('model_crud', 'mcrud');
	}

	public function index()
	{
		$data['title'] = $this->title;
		$data['subtitle'] = "View";
		$data['container'] = "kegiatan/view";

		$mitra_id = $this->session->mitra_id;

		$data['listdata'] = $this->mkegiatan->getData($mitra_id);
		$data['listtahap1'] = $this->mkegiatan->getDataTahap1($mitra_id);
		$data['listtahap2'] = $this->mkegiatan->getDataTahap2($mitra_id);
		$data['listtahap3'] = $this->mkegiatan->getDataTahap3($mitra_id);
		$data['listtahap4'] = $this->mkegiatan->getDataTahap4($mitra_id);
		$data['listtahap5'] = $this->mkegiatan->getDataTahap5($mitra_id);
		$data['listtahap6'] = $this->mkegiatan->getDataTahap6($mitra_id);
		$data['komentartahap2'] = $this->mkegiatan->komentarTahap2($mitra_id);
		$this->load->view('layouts/main', $data);
	}

	public function crud($id = null)
	{
		$this->form_validation->set_rules('mitra_id', 'mitra_id', 'required', array('required' => '*Harus diisi'));
		$this->form_validation->set_rules('jenis_kegiatan_id', 'jenis_kegiatan_id', 'required', array('required' => '*Harus diisi'));
		$this->form_validation->set_rules('nama_singkat', 'nama_singkat', 'required', array('required' => '*Harus diisi'));
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'required', array('required' => '*Harus diisi'));
		$this->form_validation->set_rules('tujuan_dan_manfaat', 'tujuan_dan_manfaat', 'required', array('required' => '*Harus diisi'));
		$this->form_validation->set_rules('pihak_yang_terlibat', 'pihak_yang_terlibat', 'required', array('required' => '*Harus diisi'));
		$this->form_validation->set_rules('kebutuhan_sumberdaya', 'kebutuhan_sumberdaya', 'required', array('required' => '*Harus diisi'));
		$this->form_validation->set_rules('sasaran', 'sasaran', 'required', array('required' => '*Harus diisi'));
		$this->form_validation->set_rules('status_tahapan', 'status_tahapan', 'required', array('required' => '*Harus diisi'));
		$this->form_validation->set_rules('persentase_progres', 'persentase_progres', 'required', array('required' => '*Harus diisi'));
		$this->form_validation->set_rules('analisis_resiko', 'analisis_resiko', 'required', array('required' => '*Harus diisi'));
		$this->form_validation->set_rules('strategi_menjaga_keberlangsungan', 'strategi_menjaga_keberlangsungan', 'required', array('required' => '*Harus diisi'));
		$this->form_validation->set_rules('indikator_keberhasilan', 'indikator_keberhasilan', 'required', array('required' => '*Harus diisi'));
		if ($this->form_validation->run() == FALSE) {
			if ($this->input->post('id')) $id = $this->input->post('id');
			$this->viewcrud($id);
		} else {
			$this->simpan();
		}
	}

	function viewcrud($id = null)
	{
		$data['title'] = $this->title;
		$data['subtitle'] = ($id) ? "Form Ubah Data" : "Form Tambah Data";
		$data['container'] = "kegiatan/crud";

		$mitra_id = $this->session->mitra_id;

		if ($id) $data['crudid'] = $id;
		if ($id) $data['cruddata'] = $this->mkegiatan->getDataDetail($id);
		$data['enuJK'] = $this->menum->getData("jenis kegiatan");
		$data['enuTM'] = $this->menum->getData("tujuan kegiatan");
		$data['enuSK'] = $this->menum->getData("sasaran kegiatan");
		$data['enuT'] = $this->menum->getData("tahapan", "keterangan ASC");

		$this->load->view('layouts/main', $data);
	}

	function lihat($id = null)
	{
		$data['title'] = $this->title;
		$data['subtitle'] = "Detail Kegiatan";
		$data['container'] = "kegiatan/lihat";

		$mitra_id = $this->session->mitra_id;

		if ($id) $data['crudid'] = $id;
		if ($id) $data['cruddata'] = $this->mkegiatan->getDataDetail($id);
		$data['enuJK'] = $this->menum->getData("jenis kegiatan");
		$data['enuTM'] = $this->menum->getData("tujuan kegiatan");
		$data['enuSK'] = $this->menum->getData("sasaran kegiatan");
		$data['enuT'] = $this->menum->getData("tahapan", "keterangan ASC");

		$this->load->view('layouts/main', $data);
	}

	function simpan()
	{

		$configFoto = array(
			'path' => "./berkas/foto-kegiatan/",
			'type' => "jpeg|jpg|png"
		);

		$uploadfoto = $this->uploadfile($configFoto, "foto", $this->input->post('id') ?? null);

		$configLampiran = array(
			'path' => "./berkas/lampiran-kegiatan/",
			'type' => "pdf"
		);

		$uploadlampiran = $this->uploadfile($configLampiran, "lampiran", $this->input->post('id') ?? null);

		$kode_wilayah = $this->menum->cekwilayah($this->input->post('id_parent'));
		$jenis_mitra = $this->menum->cekjenismitra($this->input->post('id_parent'));
		$role_id = $this->input->post('roles');

		$input = array(
			'mitra_id' => $this->input->post('mitra_id'),
			'jenis_kegiatan_id' => $this->input->post('jenis_kegiatan_id'),
			'nama_singkat' => $this->input->post('nama_singkat'),
			'deskripsi' => $this->input->post('deskripsi'),
			'tujuan_dan_manfaat' => json_encode($this->input->post('tujuan_dan_manfaat')),
			'pihak_yang_terlibat' => $this->input->post('pihak_yang_terlibat'),
			'kebutuhan_sumberdaya' => $this->input->post('kebutuhan_sumberdaya'),
			'sasaran' => json_encode($this->input->post('sasaran')),
			'status_tahapan' => $this->input->post('status_tahapan'),
			'persentase_progres' => $this->input->post('persentase_progres'),
			'analisis_resiko' => $this->input->post('analisis_resiko'),
			'strategi_menjaga_keberlangsungan' => $this->input->post('strategi_menjaga_keberlangsungan'),
			'indikator_keberhasilan' => $this->input->post('indikator_keberhasilan')
		);
		if ($uploadfoto['status'] == true) {
			$input['foto'] = $uploadfoto['file_name'];
		}
		if ($uploadlampiran['status'] == true) {
			$input['lampiran'] = $uploadlampiran['file_name'];
		}
		if (!$this->input->post('id')) {
			$this->mcrud->insertData("kegiatan", $input);
		} else {
			$this->mcrud->updateData("kegiatan", $input, $this->input->post('id'));
		}

		$this->session->set_flashdata("notif", ["icon" => "success", "title" => "Berhasil", "pesan" => "Simpan data Berhasil ..."]);
		redirect('kegiatan');
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
				$cekdatanya = $this->mkegiatan->getDataDetail($id);
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

	function cekerror($data)
	{
		echo "<pre>";
		print_r($data);
		die();
	}

	function deletedata($id = null)
	{
		$this->mcrud->deleteData("kegiatan", 'id', $id);
		$this->session->set_flashdata("notif", ["icon" => "success", "title" => "Berhasil", "pesan" => "Data berhasil dihapus ..."]);
		redirect('kegiatan');
	}
}
