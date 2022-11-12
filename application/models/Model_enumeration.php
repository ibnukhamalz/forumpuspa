<?php
class Model_enumeration extends CI_Model
{

    public function getData($key = null, $order_by = null)
    {
        if ($order_by != null) {
            $this->db->order_by($order_by);
        }
        $data = $this->db
            ->get_where("enumeration", ["key" => $key])->result();
        return $data;
    }

    public function getDataDetail($where)
    {
        $data = $this->db
            ->get_where("enumeration", $where)->row();
        return $data;
    }

    public function cekwilayah($id_parent = null)
    {
        $data = $this->db
            ->get_where("mitra", ["id" => $id_parent])->row();
        return $data->kode_wilayah;
    }

    public function cekjenismitra($id_parent = null)
    {
        $data = $this->db
            ->get_where("mitra", ["id" => $id_parent])->row();
        return $data->jenis_mitra;
    }
}
