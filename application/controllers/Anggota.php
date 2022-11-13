<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Anggota extends CI_Controller
{
    protected $title = "Anggota";

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_anggota', 'manggota');
        $this->load->model('model_login', 'mlogin');
        $this->load->model('model_enumeration', 'menum');
    }

    public function index($status = null, $user_id = null)
    {
        $data['title'] = $this->title;
        $data['subtitle'] = "View";
        $data['container'] = "anggota/view";

        $mitra_id = $this->session->mitra_id;

        $data['listdata'] = $this->manggota->getData($mitra_id);
        $data['qlevelf'] = $this->menum->getData("forum");
        $data['qlevelu'] = $this->menum->getData("roles");
        if ($status == "verif") {
            $cekdata = $this->db->get_where("users", ["id" => $user_id]);
            if ($cekdata->num_rows() == 1) {
                $verifikasi_akun = ($cekdata->row()->verifikasi_akun == "off") ? "on" : "off";
                $pesan = "Diaktifkan";
                if ($verifikasi_akun == "off") {
                    $pesan = "Dinonaktifkan";
                }
                $this->db->update("users", ["verifikasi_akun" => $verifikasi_akun], ["id" => $user_id]);
                $this->session->set_flashdata("notif", ["icon" => "success", "title" => "Berhasil", "pesan" => $cekdata->row()->email . " Berhasil " . $pesan . "..."]);
                redirect('anggota');
            }
        }
        $this->load->view('layouts/main', $data);
    }

    public function detail($id = null)
    {
        $data['title'] = "Profil Saya";
        $data['container'] = "anggota/detail";
        $data['cruddata'] = $this->manggota->getDataDetailByUser($id);
        $data['userdata'] = $this->mlogin->getDataById($id);
        $this->load->view('layouts/main', $data);
    }


    // public function crud($id = null)
    // {
    //     $this->form_validation->set_rules('id_parent', 'id_parent', 'required', array('required' => '*Harus diisi'));
    //     $this->form_validation->set_rules('nama_singkat', 'nama_singkat', 'required', array('required' => '*Harus diisi'));
    //     $this->form_validation->set_rules('nama_lengkap', 'nama_lengkap', 'required', array('required' => '*Harus diisi'));
    //     $this->form_validation->set_rules('website_mitra', 'website_mitra', 'required', array('required' => '*Harus diisi'));
    //     $this->form_validation->set_rules('email_mitra', 'email_mitra', 'required', array('required' => '*Harus diisi'));
    //     $this->form_validation->set_rules('alamat_mitra', 'alamat_mitra', 'required', array('required' => '*Harus diisi'));
    //     $this->form_validation->set_rules('no_telp_mitra', 'no_telp_mitra', 'required', array('required' => '*Harus diisi'));
    //     $this->form_validation->set_rules('rincian_kegiatan', 'rincian_kegiatan', 'required', array('required' => '*Harus diisi'));
    //     $this->form_validation->set_rules('permasalahan', 'permasalahan', 'required', array('required' => '*Harus diisi'));
    //     $this->form_validation->set_rules('kebutuhan', 'kebutuhan', 'required', array('required' => '*Harus diisi'));
    //     if (!$this->input->post('id')) {
    //         $this->form_validation->set_rules('email', 'email', 'required', array('required' => '*Harus diisi'));
    //         $this->form_validation->set_rules('password', 'password', 'required', array('required' => '*Harus diisi'));
    //     }

    //     if ($this->form_validation->run() == FALSE) {
    //         if ($this->input->post('id')) $id = $this->input->post('id');
    //         $this->view($id);
    //     } else {
    //         $this->simpan();
    //     }
    // }

    // function view($id = null)
    // {
    //     $data['title'] = $this->title;
    //     $data['subtitle'] = ($id) ? "Form Ubah Data" : "Form Tambah Data";
    //     $data['container'] = "anggota/crud";

    //     $mitra_id = $this->session->mitra_id;

    //     if ($id) $data['crudid'] = $id;
    //     if ($id) $data['cruddata'] = $this->manggota->getDataDetail($id);
    //     $data['qinduk'] = $this->manggota->getDataInduk($mitra_id);
    //     $data['qlevel'] = $this->menum->getData("forum");

    //     $this->load->view('layouts/main', $data);
    // }

    // function simpan()
    // {
    //     $config = array(
    //         'path' => "./berkas/dasarhukum/",
    //         'type' => "pdf"
    //     );
    //     $uploaddasarhukum = $this->uploadfile($config, "dasar_hukum", $this->input->post('id') ?? null);

    //     $kode_wilayah = $this->menum->cekwilayah($this->input->post('id_parent'));
    //     $jenis_mitra = $this->menum->cekjenismitra($this->input->post('id_parent'));
    //     $role_id = $this->input->post('roles');

    //     $inputMitra = array(
    //         'id_parent' => $this->input->post('id_parent'),
    //         'nama_singkat' => $this->input->post('nama_singkat'),
    //         'nama_lengkap' => ucwords(strtolower($this->input->post('nama_lengkap'))),
    //         'kode_wilayah' => $kode_wilayah,
    //         'jenis_mitra' => $jenis_mitra,
    //         'website_mitra' => strtolower($this->input->post('website_mitra')),
    //         'email_mitra' => strtolower($this->input->post('email_mitra')),
    //         'alamat_mitra' => $this->input->post('alamat_mitra'),
    //         'no_telp_mitra' => $this->input->post('no_telp_mitra'),
    //         'rincian_kegiatan' => $this->input->post('rincian_kegiatan'),
    //         'permasalahan' => $this->input->post('permasalahan'),
    //         'kebutuhan' => $this->input->post('kebutuhan')
    //     );

    //     if ($uploaddasarhukum['status'] == true) {
    //         $inputMitra['dasar_hukum'] = $uploadlogo['file_name'];
    //     }
    //     if (!$this->input->post('id')) {

    //         $inputUser = array(
    //             'name' => $this->input->post('nama_singkat'),
    //             'email' => $this->input->post('email'),
    //             'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
    //         );

    //         $this->mcrud->insertData("mitra", $inputMitra);
    //         $mitra_id = $this->db->insert_id();
    //         $this->mcrud->insertData("users", $inputUser);
    //         $user_id = $this->db->insert_id();

    //         $inputRoles = array(
    //             'user_id' => $user_id,
    //             'mitra_id' => $mitra_id,
    //             'role_id' => $role_id
    //         );
    //         $this->mcrud->insertData("roles", $inputRoles);
    //     } else {
    //         $this->mcrud->updateData("mitra", $inputMitra, $this->input->post('id'));
    //     }

    //     $this->session->set_flashdata("notif", ["icon" => "success", "title" => "Berhasil", "pesan" => "Simpan data Berhasil ..."]);
    //     redirect('anggota');
    // }

    // function uploadfile($confignya, $namainput, $id = null)
    // {
    //     $config['file_name']            = date("YmdHis");
    //     $config['upload_path']          = $confignya['path'];
    //     $config['allowed_types']        = $confignya['type'] ?? 'jpg|png|jpeg|pdf';

    //     $this->load->library('upload', $config);

    //     $this->upload->initialize($config);
    //     if ($this->upload->do_upload($namainput)) {
    //         if ($id != null) {
    //             $cekdatanya = $this->manggota->getDataDetail($id);
    //             unlink($confignya['path'] . "/" . $cekdatanya->logo);
    //             unlink($confignya['path'] . "/" . $cekdatanya->dasar_hukum);
    //         }
    //         $data['status'] = true;
    //         $data['file_name'] = $this->upload->data('file_name');
    //     } else {
    //         print_r($this->upload->display_errors());
    //         $data['status'] = false;
    //     }
    //     return $data;
    // }

    // function cekerror($data)
    // {
    //     echo "<pre>";
    //     print_r($data);
    //     die();
    // }
}
