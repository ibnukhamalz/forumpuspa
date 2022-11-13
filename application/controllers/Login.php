<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_login', 'mlogin');
        $this->load->model('model_anggota', 'manggota');
        $this->load->model('model_enumeration', 'menum');
    }

    public function index()
    {
        $this->load->view('login');
    }

    public function ceklogin()
    {
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            redirect('login');
        } else {
            $username = $this->input->post('email');
            $password = $this->input->post('password');

            $ceklogin = $this->mlogin->cek($username, $password);
            if ($ceklogin['login'] == true) {
                switch ($ceklogin['datalogin']->role_id) {
                    case 0:
                        $roles = "Super Admin";
                        break;

                    case 1:
                        $roles = "Admin Forum " . $ceklogin['datalogin']->jenis_mitra;
                        $this->session->mitra_id = $ceklogin['datalogin']->mitra_id;
                        break;

                    default:
                        $roles = "Anggota Forum " . $ceklogin['datalogin']->jenis_mitra;
                        $this->session->mitra_id = $ceklogin['datalogin']->mitra_id;
                        break;
                }

                $this->session->user_id = $ceklogin['datalogin']->user_id;
                $this->session->email = $ceklogin['datalogin']->email;
                $this->session->mitra = $ceklogin['datalogin']->nama_lengkap;
                $this->session->roles = $roles;
                $this->session->role_id = $ceklogin['datalogin']->role_id;

                $this->session->set_flashdata("notif", ["icon" => "success", "title" => "Berhasil", "pesan" => "Anda telah berhasil Login ..."]);
                redirect('welcome');
            } else {
                $this->session->set_flashdata("notif", ["icon" => "error", "title" => "Gagal", "pesan" => "Email / Kata sandi yang Anda masukkan salah"]);
                redirect('login');
            }
        }
    }

    public function logout()
    {
        session_destroy();
        $this->session->set_flashdata("notif", ["icon" => "success", "title" => "Berhasil", "pesan" => "Anda telah berhasil Login ..."]);
        redirect('login');
    }

    public function register($crypt = null)
    {

        $this->form_validation->set_rules('nama_singkat', 'nama_singkat', 'required', array('required' => "*Harus diisi"));
        $this->form_validation->set_rules('email', 'email', 'required', array('required' => "*Harus diisi"));
        $this->form_validation->set_rules('password', 'password', 'required', array('required' => "*Harus diisi"));

        $roles = array("pusat-admin", "provinsi-admin", "pemda-admin", "pusat-anggota", "provinsi-anggota", "pemda-anggota");
        if ($this->form_validation->run() == FALSE) {
            if ($crypt == null or !in_array(base64_decode($crypt), $roles)) {
                redirect('login');
            } else {
                $this->view($crypt);
            }
        } else {
            $this->save();
        }

        // pusat-admin = login/register/cHVzYXQtYWRtaW4
        // provinsi-admin = login/register/cHJvdmluc2ktYWRtaW4
        // pemda-admin = login/register/cGVtZGEtYWRtaW4

        // pusat-anggota = login/register/cHVzYXQtYW5nZ290YQ
        // provinsi-anggota = login/register/cHJvdmluc2ktYW5nZ290YQ
        // pemda-anggota = login/register/cGVtZGEtYW5nZ290YQ
    }

    function view($crypt)
    {
        $encrypt = explode("-", base64_decode($crypt));
        $qForum = $this->menum->getDataDetail(["value" => ucwords($encrypt[0])]);
        $data['jenis_mitra'] = $qForum->id;
        $data['qinduk'] = $this->manggota->getDataInduk(["jenis_mitra" => $qForum->id, "id_parent" => 0]);
        $data['qlevel'] = $this->menum->getData("forum");
        $data['qprovinsi'] = json_decode($this->api->daerah("provinces"));
        // echo "<pre>";
        // print_r($encrypt);
        // print_r($data);
        // die();
        // provinces
        // province
        // regencies
        // regency
        $data['encrypt'] = $crypt;
        $this->load->view('register', $data);
    }

    function save()
    {
        $link           = $this->input->post('link');
        $email          = $this->input->post('email');
        $password       = $this->input->post('password');
        $token          = $this->input->post('token');
        $nama_singkat   = $this->input->post('nama_singkat');
        $kode_wilayah   = $this->input->post('kode_wilayah');

        $encrypt = explode("-", base64_decode($this->input->post('encrypt')));

        $qRoles = $this->menum->getDataDetail(["value" => ucwords($encrypt[1])]);
        $role_id = $qRoles->id;

        $qForum = $this->menum->getDataDetail(["value" => ucwords($encrypt[0])]);
        $jenis_mitra = $qForum->id;
        if ($encrypt[1] == "admin") {
            $id_parent = 0;
        } else {
            $id_parent = $this->input->post('id_parent');
        }
        if ($encrypt[0] == "pemda") {
            $kode_wilayah = $this->menum->cekwilayah($id_parent);
        }
        // print_r($role_id);
        // echo "-";
        // print_r($jenis_mitra);
        // echo "-";
        // print_r($id_parent);
        // echo "-";
        // print_r($kode_wilayah);
        // // die();
        $inputuser = array(
            "email"     => $email,
            "password"  => password_hash($password, PASSWORD_DEFAULT),
            "token"     => $token
        );

        $cekemail = $this->db->get_where("users", ["email" => $email]);
        if ($cekemail->num_rows() == 0) {
            $this->db->insert("users", $inputuser);
            $user_id = $this->db->insert_id();
        } else {
            $this->session->set_flashdata("notif", ["icon" => "error", "title" => "Gagal", "pesan" => "Email sudah didaftarkan ..."]);
            redirect($link);
        }

        $inputmitra = array(
            "id_parent" => $id_parent,
            "nama_singkat" => $nama_singkat,
            "kode_wilayah" => $kode_wilayah,
            "jenis_mitra" => $jenis_mitra
        );
        $this->db->insert("mitra", $inputmitra);
        $mitra_id = $this->db->insert_id();

        $inputroles = array(
            "user_id" => $user_id,
            "mitra_id" => $mitra_id,
            "role_id" => $role_id
        );
        $this->db->insert("roles", $inputroles);

        $this->session->set_flashdata("notif", ["icon" => "success", "title" => "Berhasil", "pesan" => "Pendaftaran Berhasil ..."]);
        redirect('login');
        // $config = [
        //     'mailtype'  => 'html',
        //     'charset'   => 'utf-8',
        //     'protocol'  => 'smtp',
        //     'smtp_host' => 'mail.tech-doit.my.id',
        //     'smtp_user' => 'programmer@tech-doit.my.id',  // Email gmail
        //     'smtp_pass'   => 'l1vK!m{gk^6*',  // Password gmail
        //     'smtp_crypto' => 'ssl',
        //     'smtp_port'   => 465
        // ];

        // $this->load->library('email', $config);

        // $this->email->from('programmer@tech-doit.my.id', 'test');

        // $this->email->to('ibnukhamalz@gmail.com'); // Ganti dengan email tujuan

        // $this->email->subject('Kirim Email dengan SMTP Gmail CodeIgniter | MasRud.com');

        // $this->email->message("Ini adalah contoh email yang dikirim menggunakan SMTP Gmail pada CodeIgniter.<br><br> Klik <strong><a href='https://masrud.com/kirim-email-codeigniter/' target='_blank' rel='noopener'>disini</a></strong> untuk melihat tutorialnya.");

        // if ($this->email->send()) {
        //     echo 'Sukses! email berhasil dikirim.';
        // } else {
        //     echo $this->email->print_debugger();
        //     echo 'Error! email tidak dapat dikirim.';
        // }
    }

    public function cekemail()
    {
        $email = $this->input->post('value');
        if ($email != '') {
            $response = $this->mlogin->cekemail($email);
        } else {
            $response = "";
        }

        echo $response;
    }

    public function daerah()
    {
        $id = $this->input->post('id');
        if ($id != "") {
            $data = $this->api->daerah("regencies", $id);
        } else {
            $data = "{}";
        }
        echo $data;
    }
}
