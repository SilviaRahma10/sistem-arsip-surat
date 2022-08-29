<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function ubahProfile()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $email = $this->input->post('email');
        $username = $this->input->post('username');

        $upload_image = $_FILES['image']['name'];
        // jika ada gambar yang diupload
        if ($upload_image) {
            $config['allowed_types'] = 'jpg|png|svg';
            $config['max_size'] = '512';
            $config['upload_path'] = './assets/img/profile/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $old_image = $data['user']['image'];
                // jika old image not a default image > delete image
                if ($old_image != 'default.svg') {
                    // unlink or chmod 777
                    unlink(FCPATH . 'assets/img/profile/' . $old_image);
                }

                // update image
                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
            } else {
                $this->session->set_flashdata('upload_error', '<div class="alert alert-danger">' . $this->upload->display_errors() . '</div>');
                redirect('user');
            }
        }

        $this->db->set('username', $username);
        $this->db->where('email', $email);
        $this->db->update('user');

        $this->session->set_flashdata('msg', 'diupdate.');
        redirect('user');
    }

    public function ubahPassword()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $upass = $data['user']['password'];
        $pass = $this->input->post('password');
        $newpass = $this->input->post('newpass');

        // jika password yang di verify tidak sama dengan password user dari db
        if (!password_verify($pass, $upass)) {
            $this->session->set_flashdata('msg', 'Password Lama Salah!');
            redirect('user/ubahpass');
        } else {
            // jika input password lama sama dengan input password baru
            if ($newpass == $pass) {
                $this->session->set_flashdata('msg', 'Password baru tidak boleh sama dengan password lama.');
                redirect('user/ubahpass');
            } else {
                // jika tidak sama dengan password baru
                $pass_hash = password_hash($newpass, PASSWORD_DEFAULT);

                $this->db->set('password', $pass_hash);
                $this->db->where('email', $this->session->userdata('email'));
                $this->db->update('user');

                $this->session->set_flashdata('ubahpass', '<div class="alert alert-success">Password berhasil diubah.</div>');
                redirect('user/ubahpass');
            }
        }
    }
}
