<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
        $this->form_validation->set_rules('email_login', 'Email', 'required|trim|valid_email', [
            'valid_email' => 'kudu Email kang, uduk jenneng mu',
            'required'    => 'lho kok kosong',
        ]);
        $this->form_validation->set_rules('password_login', 'Password', 'required|trim', [
            'required'    => 'iki jok sampe kosong mamank',
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Sek le';
            $this->load->view('Element/Elemen_Auth/Header', $data);
            $this->load->view('Auth/Login');
            $this->load->view('Element/Elemen_Auth/Footer');
        } else {
            // validasinya lung atau fungsi login
            $this->_login();
        }
    }
    private function _login()
    {
        // method ini method khusus di file Auth.php tidak bisa di akses di controller lain!
        $email = $this->input->post('email_login');
        $password = $this->input->post('password_login');

        $user = $this->db->get_where('user_tabel', ['email' => $email])->row_array();

        // logika juka usernya ada
        if ($user != null) {
            // jika user is_actienya 1 atau "active"

            if ($user['is_active'] == 1) {
                // statement kalo sudah aktivasi
                // nah kalau aktive check passwordnya di sini sama atau nggak di databasenya
                if (password_verify($password, $user['password'])) {
                    // ini statement yang di eksekusi jika passwordnya benar
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    // ini untuk men set atau menyiapkan data user yang di siapkan di dalam variabel $data
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('Admin');
                    } else {
                        redirect('user');
                    }
                } else {
                    // di sini statement kalo passwordnya salah
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">PASSWORD E SALAH MANG</div>');
                    redirect('Auth');
                }
            } else {
                // statement kalo belum melakukan aktivasi
                $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">HAYO URUNG AKTIVASI EMAIL YOOO (:</div>');
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">WADUH MANK AKUN IKI URUNG DAFTAR DISEK</div>');
            redirect('Auth');
        }
    }

    public function Registration()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }

        $this->form_validation->set_rules('name_regis', 'Name', 'required|trim');
        $this->form_validation->set_rules('email_regis', 'Email', 'required|trim|is_unique[user_tabel.email]|valid_email', [
            'is_unique' => 'woong lio wes make email iki',
        ]);
        $this->form_validation->set_rules('password1_regis', 'Password', 'required|trim|min_length[2]|matches[password2_regis]', [
            'matches' => 'password kudu podo',
            'min_length' => 'kurang panjang',

        ]);
        $this->form_validation->set_rules('password2_regis', 'Password', 'required|trim|matches[password1_regis]');

        if ($this->form_validation->run() == false) {

            $data['title'] = 'Registrasi Le';
            $this->load->view('Element/Elemen_Auth/Header', $data);
            $this->load->view('Auth/Register');
            $this->load->view('Element/Elemen_Auth/Footer');
        } else {
            $email = $this->input->post('email_regis', true);
            $data = [
                'name' => htmlspecialchars($this->input->post('name_regis', true)),
                'email' => htmlspecialchars($email),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1_regis'), PASSWORD_DEFAULT),
                'role_id'  => 2,
                'is_active' => 0,
                'date_created' => time()
            ];
            // persiapan token
            $token = base64_encode(random_bytes(32));

            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];

            $this->db->insert('user_tabel', $data);
            $this->db->insert('user_token', $user_token);

            $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">JOS GANDOS MAMANK, AKTIFKAN NOH DI GMAIL</div>');
            redirect('Auth');
        }
    }

    public function Logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">WES METU AWAKMU MANK</div>');
        redirect('Auth');
    }

    public function Blocked()
    {
        $this->load->view('Element/Elemen_Dashboard/Element_Header');
        $this->load->view('Auth/Blokir');
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user_tabel', ['email' => $email])->row_array();
        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user_tabel');

                    $this->db->delete('user_token', ['email' => $email]);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' DAH AKTIF LOGIN</div>');
                    redirect('Auth');
                } else {
                    $this->db->delete('user_tabel', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Token kadaluarsa</div>');
                    redirect('Auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Token salah</div>');
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akunmu raonok rausak verify</div>');
            redirect('Auth');
        }
    }

    private function _sendEmail($token, $type)
    {
        $mail_config['smtp_host'] = 'ssl://smtp.googlemail.com';
        $mail_config['smtp_port'] = '465';
        $mail_config['smtp_user'] = 'PostKantal@gmail.com';
        $mail_config['smtp_pass'] = '4lun9d14n2';
        // $mail_config['smtp_crypto'] = 'tls';
        $mail_config['protocol'] = 'smtp';
        $mail_config['mailtype'] = 'html';
        // $mail_config['send_multipart'] = FALSE;
        $mail_config['charset'] = 'utf-8';
        // $mail_config['wordwrap'] = TRUE;
        $this->email->initialize($mail_config);

        $this->email->set_newline("\r\n");

        $this->load->library('email', $mail_config);

        $this->email->from('PostKantal@gmail.com', 'Yakuza');
        $this->email->to($this->input->post('email_regis'));
        if ($type == 'verify') {

            $this->email->subject('Aktivasi');
            $this->email->message('Klik link ini untuk veritifikasi akun ini : <a href="' . base_url() . 'Auth/verify?email=' . $this->input->post('email_regis') . '& token=' . urlencode($token) . '"> Aktifkan</a>');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Klik link ini untuk veritifikasi akun ini : <a href="' . base_url() . 'Auth/resetpassword?email=' . $this->input->post('email_regis') . '& token=' . urlencode($token) . '"> Reset password</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }


    public function forgotPassword()
    {
        $this->form_validation->set_rules('email_regis', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run() ==  false) {
            $data['title'] = 'Forgot Password';
            $this->load->view('Element/Elemen_Auth/Header', $data);
            $this->load->view('Auth/Forgot_Password');
            $this->load->view('Element/Elemen_Auth/Footer');
        } else {
            $email = $this->input->post('email_regis');
            $user = $this->db->get_where('user_tabel', ['email' => $email, 'is_active' => 1])->row_array();
            if ($user) {
                // 
                $token = base64_encode(random_bytes(32));

                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];;

                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot');
                $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Email wes ke kirim monggo di cek</div>');
                redirect('Auth/forgotPassword');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Raono email nang kene atauf blom aktivasi!</div>');
                redirect('Auth/forgotPassword');
            }
        }
    }

    public function resetPassword()
    {
        $email  = $this->input->get('email');
        $token  = $this->input->get('token');

        $user = $this->db->get_where('user_tabel', ['email' => $email])->row_array();

        if ($user) {
            // 
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Token Salah</div>');
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal Reset Password email raonok</div>');
            redirect('Auth');
        }
    }

    public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }
        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[2]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[2]|matches[password1]');
        if ($this->form_validation->run() ==  false) {
            $data['title'] = 'Change Password';
            $this->load->view('Element/Elemen_Auth/Header', $data);
            $this->load->view('Auth/Change_Password');
            $this->load->view('Element/Elemen_Auth/Footer');
        } else {
            // 
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email =  $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user_tabel');

            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">password wes keubah</div>');
            redirect('Auth');
        }
    }
}
