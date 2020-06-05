<?php

class Submenu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('SubMenu_model', 'submenu');
        is_loggin();
    }

    public function index()
    {

        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['submenu'] = $this->submenu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $data['icon'] = $this->submenu->icon_submenu();
        $data['title'] = 'Submenu Management';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/submenu', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('selectmenu', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'url', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');
        if ($this->form_validation->run() == false) {

            $this->session->set_flashdata('fail', 'Failed!');
            $this->index();
        } else {
            $this->submenu->add_submenu();
            $this->session->set_flashdata('message', 'Added!');
            redirect('submenu');
        }
    }

    public function delete($id)
    {

        $this->submenu->delete_submenu($id);
        $this->session->set_flashdata('message', 'Deleted!');
        redirect('submenu');
    }

    public function getSubMenu()
    {

        echo json_encode($this->submenu->getSubMenuById($this->input->post('id')));
    }

    public function edit()
    {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('selectmenu', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'url', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');
        if ($this->form_validation->run() == false) {

            $this->session->set_flashdata('fail', 'Failed!');
            $this->index();
        } else {
            $this->submenu->edit_submenu();
            $this->session->set_flashdata('message', 'Edited!');
            redirect('submenu');
        }
    }
}
