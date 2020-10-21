<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function index()
    {
        // Mengeola Menu
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user_tabel', ['email' => $this->session->userdata('email')])->row_array();
        // echo 'hello ' . $data['user']['name'] . ' !';


        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu_input', 'Menu', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('Element/Elemen_Dashboard/Element_Header', $data);
            $this->load->view('Element/Elemen_Dashboard/Element_Navbar', $data);
            $this->load->view('Element/Elemen_Dashboard/Element_Sidebar', $data);
            $this->load->view('Menu/Index', $data);
            $this->load->view('Element/Elemen_Dashboard/Element_Footer');
        } else {
            $data = [
                'menu'  => htmlspecialchars($this->input->post('menu_input', true))
            ];
            $this->db->insert('user_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Ketambah Boi',  '</div>');
            redirect('Menu');
        }
    }

    public function SubMenu()
    {
        $posting =
            $data['title'] = 'SubMenu Management';
        $data['user'] = $this->db->get_where('user_tabel', ['email' => $this->session->userdata('email')])->row_array();
        // logika sub menu
        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->load->model('Menu_model', 'menu');
        $data['submenu'] = $this->menu->getSubMenu();

        $this->form_validation->set_rules('sub_menu_input', 'SubMenu', 'required|trim');
        $this->form_validation->set_rules('menu_id_input', 'Menu', 'required|trim');
        $this->form_validation->set_rules('url_submenu', 'Url', 'required|trim');
        $this->form_validation->set_rules('icon_submenu', 'Icon', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('Element/Elemen_Dashboard/Element_Header', $data);
            $this->load->view('Element/Elemen_Dashboard/Element_Navbar', $data);
            $this->load->view('Element/Elemen_Dashboard/Element_Sidebar', $data);
            $this->load->view('menu/Submenu', $data);
            $this->load->view('Element/Elemen_Dashboard/Element_Footer');
        } else {
            $data = [
                'title_db'      => $this->input->post('sub_menu_input'),
                'menu_id'           => $this->input->post('menu_id_input'),
                'url'           => $this->input->post('url_submenu'),
                'icon'           => $this->input->post('icon_submenu'),
                'is_active_menu'           => $this->input->post('is_active_input')
            ];

            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Ketambah Boi',  '</div>');
            redirect('Menu/Submenu');
        }
    }
}
