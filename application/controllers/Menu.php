<?php

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model', 'menu');
        is_loggin();
    }

    public function index()
    {

        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();


        $data['title'] = 'Menu Management';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/menu', $data);
        $this->load->view('templates/footer');
    }

    public function addMenu()
    {
        $this->form_validation->set_rules('menu', 'Menu', 'required');
        if ($this->form_validation->run() == false) {

            $this->session->set_flashdata('fail', 'Failed');
            $this->index();
        } else {
            $this->menu->add_menu();
            $this->session->set_flashdata('message', 'Added');
            redirect('menu');
        }
    }

    public function delete($id)
    {

        $this->menu->delete_menu($id);
        $this->session->set_flashdata('message', 'Deleted');
        redirect('menu');
    }

    public function getMenu()
    {

        echo json_encode($this->menu->getMenuById($this->input->post('id')));
    }

    public function edit()
    {
        $this->form_validation->set_rules('menu', 'Menu', 'required');
        if ($this->form_validation->run() == false) {

            $this->session->set_flashdata('fail', 'Failed');
            $this->index();
        } else {
            $this->menu->edit_menu();
            $this->session->set_flashdata('message', 'Edited');
            redirect('menu');
        }
    }
}
