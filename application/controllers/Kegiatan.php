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
        if ($this->session->user_id == "") {
            redirect('login');
        }
    }

    public function index()
    {
        $data['title'] = $this->title;
        $data['subtitle'] = "View";
        $data['container'] = "kegiatan/view";

        $where = array();
        switch ($this->session->role_id) {
            case 0:
                $where = "";
                break;

            case 3:
                $where = "";
                break;

            case 1:
                $where = "(m1.id_parent = '" . $this->session->mitra_id . "' OR status_publikasi = 1)";
                break;

            default:
                $where = "(m1.id = '" . $this->session->mitra_id . "' OR status_publikasi = 1)";
                break;
        }
        $data['listdata'] = $this->mkegiatan->getData($where);
        $data['newkegiatan'] = $this->mkegiatan;
        $data['newenum'] = $this->menum;
        $data['wherelist'] = $where;

        $this->load->view('layouts/main', $data);
    }

    public function detail($id = null)
    {
        $data['title'] = $this->title;
        $data['subtitle'] = "Detail";
        $data['container'] = "kegiatan/detail";
        $data['detailid'] = $id;

        $data['qdetail'] = $this->mkegiatan->getDataDetail($id);
        $data['newkegiatan'] = $this->mkegiatan;
        $data['listkomentar'] = $this->mkegiatan->getDataKomentar($id, 0);
        $data['totalkomentar'] = $this->mkegiatan->getDataKomentar($id, "total");

        $this->load->view('layouts/main', $data);
    }

    public function crud($id = null)
    {
        $this->form_validation->set_rules('mitra_id', 'mitra_id', 'required', array('required' => '*Harus diisi'));
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
        $config = array(
            'path' => "./berkas/foto-kegiatan/",
            'type' => "jpeg|jpg|png"
        );

        $uploadfoto = $this->uploadfile($config, "foto", $this->input->post('id') ?? null);

        $config = array(
            'path' => "./berkas/lampiran-kegiatan/",
            'type' => "pdf"
        );

        $uploadlampiran = $this->uploadfile($config, "lampiran", $this->input->post('id') ?? null);

        $input = array(
            'mitra_id' => $this->input->post('mitra_id'),
            'jenis_kegiatan_id' => $this->input->post('jenis_kegiatan_id'),
            'nama_singkat' => $this->input->post('nama_singkat'),
            'nama_lengkap' => $this->input->post('nama_lengkap'),
            'deskripsi' => $this->input->post('deskripsi'),
            'tujuan_dan_manfaat' => json_encode($this->input->post('tujuan_dan_manfaat')),
            'pihak_yang_terlibat' => $this->input->post('pihak_yang_terlibat'),
            'kebutuhan_sumberdaya' => $this->input->post('kebutuhan_sumberdaya'),
            'sasaran' => json_encode($this->input->post('sasaran')),
            'status_tahapan' => $this->input->post('status_tahapan'),
            'persentase_progres' => $this->input->post('persentase_progres'),
            'keterangan_status_kegiatan' => $this->input->post('keterangan_status_kegiatan'),
            'analisis_resiko' => $this->input->post('analisis_resiko'),
            'keunikan' => $this->input->post('keunikan'),
            'potensi' => $this->input->post('potensi'),
            'strategi_menjaga_keberlangsungan' => $this->input->post('strategi_menjaga_keberlangsungan'),
            'url' => $this->input->post('url'),
            'status_publikasi' => $this->input->post('status_publikasi') ?? 0,
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

    public function savekomen()
    {
        $input = $this->input->post();
        $link = $input['link'];
        unset($input['link']);
        if (empty($input['id'])) {
            $this->mcrud->insertData("komentar", $input);
            $id = $this->db->insert_id();
        } else {
            $id = $input['id'];
            $this->mcrud->updateData("komentar", $input, $id);
        }
        if ($input['parent_id'] != 0) {
            $id = $input['parent_id'];
        }
        redirect($link . "#komentarnya" . $id);
    }

    public function hapuskomen($id = null, $kegiatan_id = null)
    {
        if ($id != null and $kegiatan_id != null) {
            $this->mcrud->deleteData("komentar", $id);
            $this->db->delete("komentar", ["parent_id" => $id]);
            redirect('kegiatan/detail/' . $kegiatan_id . "#komentarall");
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
                $cekdatanya = $this->mkegiatan->getDataDetail($id);
                unlink($confignya['path'] . "/" . $cekdatanya->logo);
                unlink($confignya['path'] . "/" . $cekdatanya->dasar_hukum);
            }
            $data['status'] = true;
            $data['file_name'] = $this->upload->data('file_name');
        } else {
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
}
