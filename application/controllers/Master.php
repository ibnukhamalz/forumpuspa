<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{
    protected $title = "Master";

    public function __construct()
    {
        parent::__construct();
        $this->load->model('model_crud', 'mcrud');
        $this->load->model('model_enumeration', 'menum');
    }

    public function index($sub = null)
    {
        $data['title'] = $this->title;
        $data['sub'] = $sub;
        $data['subtitle'] = "View";
        $data['container'] = "master/view";

        $data['listdata'] = $this->menum->getData(str_replace("_", " ", $sub));
        $this->load->view('layouts/main', $data);
    }

    public function save($sub = null)
    {
        $input = $this->input->post();
        if ($input['id'] == "") {
            $this->mcrud->insertData("enumeration", $input);
        } else {
            $this->mcrud->updateData("enumeration", $input, $input['id']);
        }
        $this->session->set_flashdata("notif", ["icon" => "success", "title" => "Berhasil", "pesan" => "Simpan data Berhasil ..."]);
        redirect("master/index/" . $sub);
    }

    public function delete($sub = null, $id = null)
    {
        if ($sub != null and $id != null) {

            $this->mcrud->deleteData("enumeration", $id);
            $this->session->set_flashdata("notif", ["icon" => "success", "title" => "Berhasil", "pesan" => "Hapus data Berhasil ..."]);
            redirect("master/index/" . $sub);
        }
        redirect("welcome");
    }
}
