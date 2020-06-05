<?php

class SubMenu_model extends CI_Model
{

    public function getSubMenu()
    {
        $query =   "SELECT `user_submenu`.*, `user_menu`.`menu`
        FROM `user_submenu` JOIN `user_menu`
        ON `user_submenu`.`menu_id` = `user_menu`.`id`
    ";

        return $this->db->query($query)->result_array();
    }

    public function add_submenu()
    {

        $data = [

            'title' => $this->input->post('title', true),
            'menu_id' => $this->input->post('selectmenu', true),
            'url' => $this->input->post('url', true),
            'icon' => $this->input->post('icon', true),
            'is_active' => $this->input->post('active', true)

        ];
        $this->db->insert('user_submenu', $data);
    }

    public function delete_submenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_submenu');
    }

    public function getSubMenuById($id)
    {

        return $this->db->get_where('user_submenu', ['id' => $id])->row_array();
    }

    public function edit_submenu()
    {
        $data = [
            'title' => $this->input->post('title', true),
            'menu_id' => $this->input->post('selectmenu', true),
            'url' => $this->input->post('url', true),
            'icon' => $this->input->post('icon', true),
            'is_active' => $this->input->post('active', true)
        ];
        $dataId = ['id' => $this->input->post('id', true)];
        $this->db->where($dataId);
        $this->db->update('user_submenu', $data);
    }

    public function icon_submenu()
    {

        return $data['icon'] = [
            'far fa-fw fa-address-book',
            'fas fa-fw fa-angel',
            'fas fa-fw fa-female',
            'fas fa-fw fa-tachometer-alt',
            'fas fa-fw fa-user-edit',
            'fas fa-fw fa-unlock-alt'
        ];
    }
}
