<?php

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }


    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }
        //config validasi
        $this->form_validation->set_rules('email', 'Email', 'required|trim|strtolower|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) {

            $data['title'] = 'Login';
            $this->load->view('auth/login', $data);
        } else {
            $this->login();
        }
    }

    public function addUSer() //dari manage user
    {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('access', 'access', 'required');
        $this->form_validation->set_rules('active', 'active', 'required');
        if ($this->form_validation->run() == false) {
            echo 'fail';
        } else {
            echo true;
        }
    }


    public function login()
    {
        //ambil data dari post
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('tb_user', ['email' => $email])->row_array();

        //jika ada usernya
        if ($user) {

            //jika usernya aktif
            if ($user['is_active'] == "Yes") {

                //cek password
                if (password_verify($password, $user['password'])) {


                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];

                    $this->session->set_userdata($data);

                    //cek role id
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } else {
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Wrong password!
                </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            This email has not been activated!
            </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email not found!
            </div>');
            redirect('auth');
        }
    }


    public function registration()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }
        $this->form_validation->set_rules('name', 'Name', 'required|ucfirst|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|strtolower|valid_email|is_unique[tb_user.email]', [
            'is_unique' => 'This email already exist'
        ]);
        $this->form_validation->set_rules(
            'password1',
            'Password',
            'required|trim|min_length[3]|matches[password2]',
            [

                'min_length' => 'The password min 3 digits',
                'matches' => "The password don't match"

            ]
        );
        $this->form_validation->set_rules('password2', 'Password', 'required|strtolower|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registration';
            $this->load->view('auth/registration', $data);
        } else {

            $data = [

                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => htmlspecialchars('default.jpg'),
                'password' => htmlspecialchars(password_hash($this->input->post('password1', true), PASSWORD_DEFAULT)),
                'role_id' => 2,
                'is_active' => "Yes",
                'date_created' => time()
            ];

            $this->db->insert('tb_user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulations, your account has been created!
            </div>');
            redirect('auth');
        }
    }

    public function logout()
    {

        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            You have been logged out!
            </div>');
        redirect('auth');
    }

    public function blocked()
    {

        $this->load->view('errors/html/error_403');
    }
}
