<?php
class Model_view extends CI_Model
{
    public function logouser($id = null)
    {
        $logo = base_url('template/assets/images/dashboard/profile.jpg');
        if ($id != null) {
            $data = $this->db->get_where("mitra", ["id" => $id])->row();
            $logo = base_url('berkas/logo/' . $data->logo);
        }

        return $logo;
    }
}
