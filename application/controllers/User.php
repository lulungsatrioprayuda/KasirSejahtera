<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Profil Ku';
        $data['user'] = $this->db->get_where('user_tabel', ['email' => $this->session->userdata('email')])->row_array();
        // echo 'hello ' . $data['user']['name'] . ' !';

        $this->load->view('Element/Elemen_Dashboard/Element_Header', $data);
        $this->load->view('Element/Elemen_Dashboard/Element_Navbar', $data);
        $this->load->view('Element/Elemen_Dashboard/Element_Sidebar', $data);
        $this->load->view('User/Index', $data);
        $this->load->view('Element/Elemen_Dashboard/Element_Footer');
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user_tabel', ['email' => $this->session->userdata('email')])->row_array();
        // echo 'hello ' . $data['user']['name'] . ' !';

        $this->form_validation->set_rules('name_edit', 'Nama', 'required|trim', [
            'required' => 'Isi namanya dulu baru gas'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('Element/Elemen_Dashboard/Element_Header', $data);
            $this->load->view('Element/Elemen_Dashboard/Element_Navbar', $data);
            $this->load->view('Element/Elemen_Dashboard/Element_Sidebar', $data);
            $this->load->view('User/edit', $data);
            $this->load->view('Element/Elemen_Dashboard/Element_Footer');
        } else {
            $name = $this->input->post('name_edit');
            $email = $this->input->post('email_edit');

            // cek jika upload gambar baru
            $upload_image = $_FILES['img_edit']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('img_edit')) {

                    $gambar_lama = $data['user']['image'];
                    if ($gambar_lama != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $gambar_lama);
                    }
                    // berhasil
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    // salah
                    $this->upload->display_errors();
                }
            }

            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user_tabel');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">JOS GANDOS MAMANK KEUBAH</div>');
            redirect('User');
        }
    }

    public function Changepassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user_tabel', ['email' => $this->session->userdata('email')])->row_array();
        // echo 'hello ' . $data['user']['name'] . ' !';

        $this->form_validation->set_rules('current_password', 'Password Lama', 'required|trim');
        $this->form_validation->set_rules('new_password', 'Password Lama', 'required|trim|min_length[3]|matches[new_password1]');
        $this->form_validation->set_rules('new_password1', 'Password Lama', 'required|trim|min_length[3]|matches[new_password]');
        if ($this->form_validation->run() == false) {
            $this->load->view('Element/Elemen_Dashboard/Element_Header', $data);
            $this->load->view('Element/Elemen_Dashboard/Element_Navbar', $data);
            $this->load->view('Element/Elemen_Dashboard/Element_Sidebar', $data);
            $this->load->view('User/changepassword', $data);
            $this->load->view('Element/Elemen_Dashboard/Element_Footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password     = $this->input->post('new_password');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Passwrod lamanya salah!</div>');
                redirect('User/Changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password baru tidak boleh sama dengan password sama!</div>');
                    redirect('User/Changepassword');
                } else {
                    // password_ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user_tabel');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Wes keubah</div>');
                    redirect('User');
                }
            }
        }
    }
}
