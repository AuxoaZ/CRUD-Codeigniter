<?php

class Admin_model extends CI_Model
{

    public function delete_user($id)
    {

        $this->db->where('id', $id);
        $this->db->delete('tb_user');
    }

    public function getUserById($id)
    {

        return $this->db->get_where('tb_user', ['id' => $id])->row_array();
    }
}
