<?php

class Menu_model extends CI_Model
{

    public function add_menu()
    {

        $data = [

            'menu' => $this->input->post('menu', true)

        ];
        $this->db->insert('user_menu', $data);
    }

    public function delete_menu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_menu');
    }

    public function getMenuById($id)
    {

        return $this->db->get_where('user_menu', ['id' => $id])->row_array();
    }

    public function edit_menu()
    {
        $data = ['menu' => $this->input->post('menu', true)];
        $dataId = ['id' => $this->input->post('id', true)];
        $this->db->where($dataId);
        $this->db->update('user_menu', $data);
    }
}
