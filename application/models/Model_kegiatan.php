<?php
class Model_kegiatan extends CI_Model
{
    public function getData($id = null)
    {
        if ($id != 0) {
            $this->db->where("mitra_id", $id);
        }
        $data = $this->db
            ->select(
                "kegiatan.*, 
                a.value as status_tahapan"
            )
            ->join("mitra", "mitra.id = kegiatan.mitra_id", "inner")
            ->join("enumeration as a", "a.id = kegiatan.status_tahapan", "inner")
            ->get("kegiatan")->result();
        return $data;
    }

    public function getDataDetail($id)
    {
        $data = $this->db
            ->select(
                "kegiatan.*"
            )
            ->join("mitra", "mitra.id = kegiatan.mitra_id", "inner")
            ->join("enumeration as a", "a.id = kegiatan.status_tahapan", "inner")
            ->get_where("kegiatan", ["kegiatan.id" => $id])->row();
        return $data;
    }

    public function getDataDetailByUser($id)
    {
        $data = $this->db
            ->select(
                "mitra.*, 
                a.value as jenis_mitra,
                b.value as roles"
            )
            ->join("roles", "roles.mitra_id = mitra.id", "inner")
            ->join("enumeration as b", "b.id = roles.role_id", "inner")
            ->join("enumeration as a", "a.id = mitra.jenis_mitra", "inner")
            ->get_where("mitra", ["roles.user_id" => $id])->row();
        return $data;
    }
}
