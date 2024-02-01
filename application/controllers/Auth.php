<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function index()
    {
        $this->load->view('hal_login');
    }

    public function login()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $this->db->where('username', $username)->where('password', $password);
        $this->db->from('user');
        $cek = $this->db->get()->row();
        if ($cek == null) {
            $this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible fade show mx-5 mt-3" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
			Username atau password salah
		</div>');
            redirect('auth');
        } else {
            $data = [
                'username' => $cek->username,
                'password' => $cek->password, 
                'level' => $cek->level,
                'nama' => $cek->nama
            ];
            $this->session->set_userdata($data);
            redirect('dashboard');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth');
    }
}
