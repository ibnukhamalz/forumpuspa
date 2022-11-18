<?php
class Model_kegiatan extends CI_Model
{
    public function getData($where)
    {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $data = $this->db
            ->select(
                "kegiatan.*, 
                e1.keterangan as tahapan,
                e1.value as status_tahapan"
            )
            ->join("mitra as m1", "m1.id = kegiatan.mitra_id", "inner")
            ->join("enumeration as e1", "e1.id = kegiatan.status_tahapan", "inner")
            ->get("kegiatan")->result();
        return $data;
    }
    public function getDataNew($where = null)
    {
        if (!empty($where)) {
            $this->db->where($where);
        }
        $data = $this->db
            ->select(
                "kegiatan.*, 
                m1.nama_lengkap as namaforum, 
                e2.value as level, 
                e1.keterangan as tahapan,
                e1.value as status_tahapan"
            )
            ->join("mitra as m1", "m1.id = kegiatan.mitra_id", "inner")
            ->join("enumeration as e1", "e1.id = kegiatan.status_tahapan", "inner")
            ->join("enumeration as e2", "e2.id = m1.jenis_mitra", "inner")
            ->order_by("created_at", "DESC")
            ->limit(3)
            ->get("kegiatan")->result();
        return $data;
    }

    public function getDataDetail($id)
    {
        $data = $this->db
            ->select(
                "kegiatan.*,
                users.logo as logoforum, 
                mitra.nama_lengkap as namaforum, 
                e1.keterangan as tahapan,
                "
            )
            ->join("mitra", "mitra.id = kegiatan.mitra_id", "inner")
            ->join("roles", "roles.mitra_id = mitra.id", "inner")
            ->join("enumeration as e1", "e1.id = kegiatan.status_tahapan", "inner")
            ->join("users", "users.id = roles.user_id", "inner")
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

    public function getDataKomentar($id, $parent_id = null)
    {
        if ($parent_id != "total") {
            $where['komentar.parent_id'] = $parent_id;
        }

        $where['komentar.kegiatan_id'] = $id;
        $data = $this->db
            ->select(
                "komentar.*,
                mitra.id as mitra_id,
                enumeration.keterangan as role_id,
                mitra.nama_lengkap as namaforum"
            )
            ->join("roles", "roles.user_id = komentar.user_id", "inner")
            ->join("mitra", "mitra.id = roles.mitra_id", "inner")
            ->join("enumeration", "enumeration.id = roles.role_id", "inner")
            ->order_by('komentar.created_at', "ASC")
            ->get_where("komentar", $where);
        return $data->result();
    }

    public function hitungprogress($tahap = null, $persentase = null)
    {
        $totalpersentase = 0;
        $persenawal = $this->db
            ->select_sum("other", "total")
            ->get_where("enumeration", ["key" => "tahapan", "keterangan <" => $tahap])->row();
        $totalpersentase = $persenawal->total;

        $persensisa = $this->db->get_where("enumeration", ["key" => "tahapan", "keterangan" => $tahap])->row();

        $totalpersentase = $totalpersentase + ($persensisa->other * $persentase / 100);
        return $totalpersentase;
    }
}
