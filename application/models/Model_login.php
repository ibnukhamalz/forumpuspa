<?php
class Model_login extends CI_Model
{
    public function cek($email, $password)
    {
        $ceklogin = $this->db
        ->select("password, users.id, enumeration.keterangan as role_id")
        ->join("roles", "roles.user_id = users.id", "inner")
        ->join("enumeration", "enumeration.id = roles.role_id", "inner")
        ->get_where("users", ["email" => $email])->row();
        if (password_verify($password, $ceklogin->password)) {
            $user_id = $ceklogin->id;
            if (in_array($ceklogin->role_id, [1,2])) {
                $getData = $this->db
                ->select(
                    "roles.user_id,
                    b.keterangan as role_id,
                    users.email,
                    users.verifikasi_akun,
                    roles.mitra_id,
                    mitra.nama_lengkap,
                    a.value as jenis_mitra"
                )
                ->join("roles", "roles.user_id = users.id", "inner")
                ->join("mitra", "mitra.id = roles.mitra_id", "inner")
                ->join("enumeration as a", "a.id = mitra.jenis_mitra", "inner")
                ->join("enumeration as b", "b.id = roles.role_id", "inner")
                ->get_where("users", ["users.id" => $user_id])->row();
            } else {
                $getData = $this->db
                ->select(
                    "roles.user_id,
                    enumeration.keterangan as role_id,
                    users.email,
                    roles.mitra_id,
                    enumeration.value as jenis_mitra"
                )
                ->join("roles", "roles.user_id = users.id", "inner")
                ->join("enumeration", "enumeration.id = roles.role_id", "inner")
                ->get_where("users", ["users.id" => $user_id])->row();
            }

            $data['datalogin'] = $getData;
            $data['login'] = true;
        } else {
            $data['login'] = false;
        }
        return $data;
    }

    public function getDataById($id)
    {
        return $this->db->get_where("users", ["id" => $id])->row();
    }

    public function cekemail($email)
    {
        $ceklogin = $this->db->get_where("users", ["email" => $email])->num_rows();
        return $ceklogin;
    }
}
