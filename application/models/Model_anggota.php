<?php
class Model_anggota extends CI_Model
{
    public function getData($id_parent = null)
    {
        if ($id_parent != 0) {
            $this->db->where("id_parent", $id_parent);
        }
        $data = $this->db
            ->select(
                "mitra.*, 
                users.name as kontak_person,
                a.value as jenis_mitra,
                b.value as roles"
            )
            ->join("roles", "roles.mitra_id = mitra.id", "inner")
            ->join("enumeration as b", "b.id = roles.role_id", "inner")
            ->join("enumeration as a", "a.id = mitra.jenis_mitra", "inner")
            ->join("users", "users.id = roles.user_id", "inner")
            ->get("mitra")->result();
        return $data;
    }

    public function getDataInduk($where = null)
    {
        if ($where != null) {
            $this->db->where($where);
        }
        $data = $this->db
            ->select(
                "mitra_id,
                mitra.nama_singkat,
                mitra.kode_wilayah,
                mitra.nama_lengkap"
            )
            ->group_by("roles.mitra_id")
            ->join("mitra", "mitra.id = roles.mitra_id", "inner")
            ->join("enumeration as a", "a.id = roles.role_id", "inner")
            ->get_where("roles", ["a.keterangan" => 1])->result();
        return $data;
    }

    public function getDataDetail($id)
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
            ->get_where("mitra", ["mitra.id" => $id])->row();
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
