<?php

function is_loggin()
{

    $ci = get_instance();
    if (!$ci->session->userdata('email')) {

        redirect('auth');
    } else {

        $role_id = $ci->session->userdata('role_id');
        //ambil controller di url
        $menu = $ci->uri->segment(1);

        $queryMenu = $ci->db->get_where('user_menu', ['menu' => $menu])->row_array();
        $menu_id = $queryMenu['id'];


        $queryAccess = $ci->db->get_where('user_access_menu', [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ]);

        if ($queryAccess->num_rows() < 1) {

            redirect('auth/blocked');
        }
    }
}