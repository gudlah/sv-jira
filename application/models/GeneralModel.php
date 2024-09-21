<?php defined('BASEPATH') OR exit('No direct script access allowed');

class GeneralModel extends CI_Model {
	public function getAll($table) {
        return $this->db->get($table);
    }

    public function getWhere($table, $where) {
        return $this->db->get_where($table, $where);
    }

    public function insert($table, $data) {
        $this->db->insert($table, $data);
    }

    public function update($table, $where, $data) {
        $this->db->set($data)
            ->where($where)
            ->update($table);
    }

    public function delete($table, $where) {
        $this->db->delete($table, $where);
    }
}