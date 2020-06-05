<?php

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model', 'user');
        is_loggin();
    }

    public function index()
    {

        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'My Profile';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/my_profile');
        $this->load->view('templates/footer');
    }

    public function editProfile()
    {

        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Name', 'required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Profile';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit_profile');
            $this->load->view('templates/footer');
        } else {
            $this->user->edit_profile();
            $this->session->set_flashdata('message', 'Edited');
            redirect('user');
        }
    }

    public function changePassword()
    {
        $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules(
            'current_password',
            'current password',
            'required|trim|min_length[3]',
            ['min_length' => 'The password min 3 digits']
        );
        $this->form_validation->set_rules(
            'new_password1',
            'new password',
            'required|trim|min_length[3]|matches[new_password2]',
            [
                'min_length' => 'The password min 3 digits',
                'matches' => 'The password dont match!'
            ]
        );
        $this->form_validation->set_rules('new_password2', 'repeat password', 'required|trim|matches[new_password1]');

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Change Password';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/change_password');
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');

            if (!password_verify($current_password, $data['user']['password'])) {

                $this->session->set_flashdata('fail', 'Wrong current password');
                redirect('user/changePassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('fail', 'New password can not be the same as current password');
                    redirect('user/changePassword');
                } else {
                    $this->user->set_change_password();
                    $this->session->set_flashdata('message', 'Password changed!');
                    redirect('user/changePassword');
                }
            }
        }
    }
}
