<?php
class Model_crud extends CI_Model
{
    public function insertData($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function updateData($table, $data, $id)
    {
        $this->db->update($table, $data, ["id" => $id]);
    }

    public function deleteData($table, $id)
    {
        $this->db->delete($table, ["id" => $id]);
    }

    public function deleteDataWhere($table, $where)
    {
        $this->db->delete($table, $where);
    }
}
