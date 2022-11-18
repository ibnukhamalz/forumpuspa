<?php
class Model_view extends CI_Model
{
    public function logouser($id = null)
    {
        $logo = base_url('template/assets/images/logo/user1.png');
        if ($id != null) {
            $data = $this->db->get_where("users", ["id" => $id])->row();
            if ($data->logo != '' and file_exists('berkas/logo/' . $data->logo)) {
                $logo = base_url('berkas/logo/' . $data->logo);
            } else {
                $logo = base_url('template/assets/images/logo/user1.png');
            }
        }

        return $logo;
    }

    public function ver_akun($user_id)
    {
        $cekdata = $this->db->get_where("users", ["id" => $user_id]);
        $verifikasi_akun = "off";
        if ($cekdata->num_rows() == 1) {
            $verifikasi_akun = $cekdata->row()->verifikasi_akun;
        }

        return $verifikasi_akun;
    }
}
