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
                a.value as status_tahapan,
				a.keterangan as no_status"
			)
			->join("mitra", "mitra.id = kegiatan.mitra_id", "inner")
			->join("enumeration as a", "a.id = kegiatan.status_tahapan", "inner")
			->get("kegiatan")->result();
		return $data;
	}

	public function getDataTahap1($id = null)
	{
		if ($id != 0) {
			$this->db->where("mitra_id", $id);
		}
		$data = $this->db
			->select(
				"kegiatan.*, 
                a.value as status_tahapan"
			)
			->where("status_tahapan", 43)
			->join("mitra", "mitra.id = kegiatan.mitra_id", "inner")
			->join("enumeration as a", "a.id = kegiatan.status_tahapan", "inner")
			->get("kegiatan")
			->result();
		return $data;
	}

	public function getDataTahap2($id = null)
	{
		if ($id != 0) {
			$this->db->where("mitra_id", $id);
		}
		$data = $this->db
			->select(
				"kegiatan.*, 
                a.value as status_tahapan"
			)
			->where("status_tahapan", 44)
			->join("mitra", "mitra.id = kegiatan.mitra_id", "inner")
			->join("enumeration as a", "a.id = kegiatan.status_tahapan", "inner")
			->get("kegiatan")
			->result();
		return $data;
	}

	public function getDataTahap3($id = null)
	{
		if ($id != 0) {
			$this->db->where("mitra_id", $id);
		}
		$data = $this->db
			->select(
				"kegiatan.*, 
                a.value as status_tahapan"
			)
			->where("status_tahapan", 45)
			->join("mitra", "mitra.id = kegiatan.mitra_id", "inner")
			->join("enumeration as a", "a.id = kegiatan.status_tahapan", "inner")
			->get("kegiatan")
			->result();
		return $data;
	}

	public function getDataTahap4($id = null)
	{
		if ($id != 0) {
			$this->db->where("mitra_id", $id);
		}
		$data = $this->db
			->select(
				"kegiatan.*, 
                a.value as status_tahapan"
			)
			->where("status_tahapan", 46)
			->join("mitra", "mitra.id = kegiatan.mitra_id", "inner")
			->join("enumeration as a", "a.id = kegiatan.status_tahapan", "inner")
			->get("kegiatan")
			->result();
		return $data;
	}

	public function getDataTahap5($id = null)
	{
		if ($id != 0) {
			$this->db->where("mitra_id", $id);
		}
		$data = $this->db
			->select(
				"kegiatan.*, 
                a.value as status_tahapan"
			)
			->where("status_tahapan", 47)
			->join("mitra", "mitra.id = kegiatan.mitra_id", "inner")
			->join("enumeration as a", "a.id = kegiatan.status_tahapan", "inner")
			->get("kegiatan")
			->result();
		return $data;
	}

	public function getDataTahap6($id = null)
	{
		if ($id != 0) {
			$this->db->where("mitra_id", $id);
		}
		$data = $this->db
			->select(
				"kegiatan.*, 
                a.value as status_tahapan"
			)
			->where("status_tahapan", 48)
			->join("mitra", "mitra.id = kegiatan.mitra_id", "inner")
			->join("enumeration as a", "a.id = kegiatan.status_tahapan", "inner")
			->get("kegiatan")
			->result();
		return $data;
	}

	public function komentarTahap2($id = null)
	{
		$data = $this->db
			->select(
				"komentar.*"
			)
			->join("kegiatan", "kegiatan.id = komentar.id_kegiatan", "inner")
			->get("komentar")
			->num_rows();
		return $data;
	}

	public function getDataDetail($id)
	{
		$data = $this->db
			->select(
				"kegiatan.*,
				a.value as status_tahapan"
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
