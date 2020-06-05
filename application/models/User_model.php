<?php

class User_model extends CI_Model
{

    public function edit_profile()
    {

        //cek upload image
        $upload_image = $_FILES['image']; //ambil dari name image

        $config['upload_path'] = './assets/img/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']     = '2048';
        $this->load->library('upload', $config);


        if (empty($upload_image['name'])) { //jika gambar tidak diinput

            //name
            $name =  $this->input->post('name');
            $email = $this->input->post('email');
            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('tb_user');
        } else if ($this->upload->do_upload('image')) { //jika gambar berhasil ter upload
            $data['user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

            $old_image = $data['user']['image'];

            if ($old_image != 'default.jpg') {

                unlink(FCPATH . 'assets/img/' . $old_image);
            }

            $new_image = $this->upload->data('file_name'); //berisi data terhadap file yg telah diupload
            $this->db->set('image', $new_image);
            $email = $this->input->post('email');
            $this->db->where('email', $email);
            $this->db->update('tb_user');
        } else {
            $this->session->set_flashdata('fail', $this->upload->display_errors());
            redirect('user/editProfile');
        }
    }

    public function set_change_password()
    {

        $new_password = htmlspecialchars(password_hash($this->input->post('new_password1', true), PASSWORD_DEFAULT));

        $email = $this->session->userdata('email');

        $this->db->set('password', $new_password);
        $this->db->where('email', $email);
        $this->db->update('tb_user');
    }
}
