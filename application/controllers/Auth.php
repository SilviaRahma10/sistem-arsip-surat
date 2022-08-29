<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        // site_helper : kick user to back
        is_login();

        // rules for form validation
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('pass', 'Password', 'required|trim');

        // if validation:false
        if ($this->form_validation->run() == false) {
            $data['judul'] =  'Halaman Login';
            $this->load->view('auth/header', $data);
            $this->load->view('auth/index', $data);
            $this->load->view('auth/footer');
        } else {
            // run method
            $this->_login();
        }
    }

    public function _login()
    {
        // true : xss defence
        $uname = htmlspecialchars($this->input->post('username', true));
        $pass = $this->input->post('pass', true);

        // get user data
        $where = "username='$uname' OR email='$uname'"; // login using username atau email
        $this->db->where($where);
        $user = $this->db->get('user')->row_array();

        // if username exist
        if ($user) {
            // if password:true
            if (password_verify($pass, $user['password'])) {
                
                $data = [
                    'username' => $user['username'],
                    'email' => $user['email'],
                    'role_id' => $user['role_id']
                ];

                // set userdata
                $this->session->set_userdata($data);

                
                $this->session->set_flashdata('message',  $data['username']);
                redirect('home');
            } else {
                // flash_msg => if password:false
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username / Password salah!</div>');
                redirect('auth');
            }
        } else {
            // flash_mgs => if username:doesn't exist
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun tidak terdaftar!</div>');
            redirect('auth');
        }
    }

    public function registrasi()
    {
        is_login();

        $this->form_validation->set_rules('name', 'Nama', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[user.username]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('pass1', 'Password', 'required|trim|min_length[8]|matches[pass2]');
        $this->form_validation->set_rules('pass2', 'Konfirmasi Password', 'required|trim|matches[pass1]');

        if ($this->form_validation->run() == false) {
            $data['judul'] =  'Halaman Registrasi';
            $this->load->view('auth/header', $data);
            $this->load->view('auth/registrasi', $data);
            $this->load->view('auth/footer');
        } else {
            // encrypt password before inserting to database
            $password = password_hash($this->input->post('pass1'), PASSWORD_DEFAULT);
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'password' => $password,
                'image' => 'default.svg',
                'role_id' => 2,
                'date_created' => time()
            ];

            // insert data to table `user`
            $this->db->insert('user', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Pendaftaran berhasil. Silahkan login!</div>');
            redirect('auth');
        }
    }


    

    

    public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }

        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[8]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'trim|required|matches[password1]');

        if ($this->form_validation->run() ==  false) {
            $data['judul'] = 'Change Password';
            $this->load->view('auth/header', $data);
            $this->load->view('auth/change-pass', $data);
            $this->load->view('auth/footer');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password berhasil diubah. Silahkan login!</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        // session for => unset userdata
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil keluar!</div>');
        redirect('auth');
    }

    public function notfound()
    {
        $data['judul'] = 'Page Not Found';
        $this->load->view('auth/error_404', $data);
    }
}
