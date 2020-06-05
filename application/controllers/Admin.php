<?php

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_loggin();
        $this->load->library('form_validation');
        $this->load->model('Admin_model', 'admin');
    }

    public function index()
    {

        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['total_user'] = $this->db->get('tb_user')->num_rows();


        $data['title'] = 'Dashboard';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates/footer');
    }

    public function manageUser()
    {


        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();
        $data['role'] = $this->db->get('tb_role')->result_array();
        $data['active'] = ['Yes', 'No'];


        $email = $this->session->userdata('email');
        $user = "   SELECT `tb_User`.`id`, `role`, `name`, `email`, `is_active`
                    FROM `tb_user` JOIN `tb_role` 
                    ON `tb_user`.`role_id` = `tb_role`.`id`";


        $data['data'] = $this->db->query($user)->result_array();

        $data['title'] = 'Manage User';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/manage-user', $data);
        $this->load->view('templates/footer');
    }

    public function getUser()
    {
        echo json_encode($this->admin->getUserById($this->input->post('id')));
    }


    public function delete($id)
    {

        $this->admin->delete_user($id);
        $this->session->set_flashdata('message', 'deleted');
        redirect('admin/manageuser');
    }

    public function edit()
    {
        $dataId = $this->input->post('id');

        $data = [

            'role_id' => $this->input->post('access'),
            'is_active' => $this->input->post('active')
        ];

        $this->db->where('id', $dataId);
        $this->db->update('tb_user', $data);

        $this->session->set_flashdata('message', 'edited');
        redirect('admin/manageuser');
    }
}
