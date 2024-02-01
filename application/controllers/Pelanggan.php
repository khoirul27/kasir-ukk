<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('level') == null) {
			redirect('dashboard');
		}
	}

	public function index()
	{
		$this->db->from('pelanggan');
		$pelanggan = $this->db->get()->result_array();

		$data = [
			'judul_halaman' => "halaman pelanggan",
			'pelanggan' 	=> $pelanggan
		];

		$this->template->load('template', 'hal_pelanggan', $data);
	}

	public function simpan()
	{
			$data = [
				'nama' 	 => $this->input->post('nama'),
				'alamat' => $this->input->post('alamat'),
				'telp' 	 => $this->input->post('telp')
			];
			$this->db->insert('pelanggan', $data);

			$this->session->set_flashdata('notif', '<div class="alert alert-info alert-dismissible fade show mx-5 mt-3" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
			Data pelanggan berhasil ditambahkan
		</div>');
			redirect('pelanggan');
	
	}
	public function hapus($id)
	{
		$this->db->where('id_pelanggan', $id);
		$this->db->delete('pelanggan');
		$this->session->set_flashdata('notif', '<div class="alert alert-info alert-dismissible fade show mx-5 mt-3" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
			Data pelanggan berhasil dihapus
		</div>');
		redirect('pelanggan');
	}

	public function edit()
	{
		$data = [
            'nama'   => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'telp'   => $this->input->post('telp')
        ];
		$where = [
			'id_pelanggan' => $this->input->post('id_pelanggan')
		];
		$this->db->update('pelanggan',$data,$where);
		$this->session->set_flashdata('notif', '<div class="alert alert-info alert-dismissible fade show mx-5 mt-3" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
			Data pelanggan berhasil diedit
		</div>');
		redirect('pelanggan');
	}

}
