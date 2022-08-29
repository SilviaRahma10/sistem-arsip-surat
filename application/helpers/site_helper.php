<?php
// semua controller 
function is_logout()
{
    $ci = get_instance();
    if (!$ci->session->userdata('username')) {
        redirect('auth');
    }
}

// controller admin
function is_admin()
{
    $ci = get_instance();
    if ($ci->session->userdata('role_id') != 1) {
        redirect('auth/notfound');
    }
}

// method index, registrasi > auth controller
function is_login()
{
    $ci = get_instance();
    if ($ci->session->userdata('username')) {
        redirect('surat-masuk');
    }
}
