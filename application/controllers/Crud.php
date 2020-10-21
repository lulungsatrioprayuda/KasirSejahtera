<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Crud extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Crud_m');
    }

    public function index()
    {
        // pemanggilan data di tabel crud
        $data['rows'] = $this->Crud_m->get_data_crud();
        $data['title'] = 'Crud';
        $data['user'] = $this->db->get_where('user_tabel', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('Element/Elemen_Dashboard/Element_Header', $data);
        $this->load->view('Element/Elemen_Dashboard/Element_Navbar', $data);
        $this->load->view('Element/Elemen_Dashboard/Element_Sidebar', $data);
        $this->load->view('crud/crud_data', $data);
        $this->load->view('Element/Elemen_Dashboard/Element_Footer');
    }

    public function edit($id)
    {
        $query = $this->Crud_m->get_data_crud($id);

        if ($query->num_rows() > 0) {
            $crud_data = $query->row();
            $data = array(
                'page' => 'edit',
                'rows' => $crud_data,
                'user' => $this->db->get_where('user_tabel', ['email' => $this->session->userdata('email')])->row_array(),
                'title' => 'Crud'
            );
            $this->load->view('Element/Elemen_Dashboard/Element_Header', $data);
            $this->load->view('Element/Elemen_Dashboard/Element_Navbar', $data);
            $this->load->view('Element/Elemen_Dashboard/Element_Sidebar', $data);
            $this->load->view('crud/crud_form', $data);
            $this->load->view('Element/Elemen_Dashboard/Element_Footer');
        }
    }

    public function add()
    {
        $crud = new stdClass();
        $crud->id   = null;
        $crud->nama_crud   = null;
        $crud->nohp_crud   = null;

        $data_add = array(
            'page' => 'add',
            'rows' => $crud,
            'user' => $this->db->get_where('user_tabel', ['email' => $this->session->userdata('email')])->row_array(),
            'title' => 'Crud'
        );
        $this->load->view('Element/Elemen_Dashboard/Element_Header', $data_add);
        $this->load->view('Element/Elemen_Dashboard/Element_Navbar', $data_add);
        $this->load->view('Element/Elemen_Dashboard/Element_Sidebar', $data_add);
        $this->load->view('crud/crud_form', $data_add);
        $this->load->view('Element/Elemen_Dashboard/Element_Footer');
    }

    public function Process()
    {
        // pemberian variabel untuk seluruh inputan
        $input = $this->input->post(null, TRUE);
        // jika yang di klik tombol dengan nama edit maka akan di eksekusi di model di bawah ini
        if (isset($_POST['edit'])) {
            $this->Crud_m->edit($input);
            echo "<script>alert('Data ter edit');</script>";
        }
        // jika yang di klik tombol dengan nama add maka akan di eksekusi di model di bawah ini
        else if (isset($_POST['add'])) {
            $this->Crud_m->add($input);
            echo "<script>alert('Data di tambahkan');</script>";
        }
        redirect('Crud');
    }

    public function delete($id)
    {
        $this->Crud_m->delete($id);
        if ($this->db->affected_rows() > 0) {
            echo "<script>alert('Data Terhapus');</script>";
        }
        echo "<script>window.location='" . site_url('Crud') . "';</script>";
    }
}
