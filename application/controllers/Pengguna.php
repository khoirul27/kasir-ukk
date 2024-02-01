<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('level') != "admin") {
			redirect('dashboard');
		}
	}

	public function index()
	{
		$this->db->from('user');
		$user = $this->db->get()->result_array();

		$data = [
			'judul_halaman' => "halaman pengguna",
			'user' 			=> $user
		];

		$this->template->load('template', 'hal_pengguna', $data);
	}

	public function simpan()
	{
		$this->db->from('user')->where('username', $this->input->post('username'));
		$cek = $this->db->get()->result_array();

		if ($cek == null) {
			$data = [
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
				'level'    => $this->input->post('level'),
				'nama' 	   => $this->input->post('nama'),
			];
			$this->db->insert('user', $data);

			$this->session->set_flashdata('notif', '<div class="alert alert-info alert-dismissible fade show mx-5 mt-3" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
			Data pengguna berhasil ditambahkan
		</div>');
			redirect('pengguna');
		} else {
			$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible fade show mx-5 mt-3" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
			Username sudah digunakan
		</div>');
			redirect('pengguna');
		}
	}
	public function hapus($id)
	{
		$this->db->where('id_user', $id);
		$this->db->delete('user');
		$this->session->set_flashdata('notif', '<div class="alert alert-info alert-dismissible fade show mx-5 mt-3" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
			Data pengguna berhasil dihapus
		</div>');
		redirect('pengguna');
	}

	public function edit()
	{
		$data = [
			'level' => $this->input->post('level'),
			'nama'  => $this->input->post('nama'),
		];
		$where = [
			'id_user' => $this->input->post('id_user')
		];
		$this->db->update('user',$data,$where);
		$this->session->set_flashdata('notif', '<div class="alert alert-info alert-dismissible fade show mx-5 mt-3" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
			Data pengguna berhasil diedit
		</div>');
		redirect('pengguna');
	}

	public function reset($id)
	{
		$data = [
			'password' => md5(12345)
		];
		$where = [
			'id_user' => $id
		];
		$this->db->update('user',$data,$where);
		$this->session->set_flashdata('notif', '<div class="alert alert-info alert-dismissible fade show mx-5 mt-3" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
			Password berhasil di reset menjadi 12345
		</div>');
		redirect('pengguna');
	}
}
