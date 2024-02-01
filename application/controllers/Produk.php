<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
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
		$this->db->from('produk a');
		$this->db->join('kategori_produk b', 'a.id_kategori=b.id_kategori', 'left');
		$produk = $this->db->get()->result_array();

		$this->db->from('kategori_produk');
		$kategori = $this->db->get()->result_array();

		$data = [
			'judul_halaman' => "halaman produk",
			'produk'	    => $produk,
			'kategori' 		=> $kategori
		];

		$this->template->load('template', 'hal_produk', $data);
	}

	public function simpan()
	{
		$data = [
			'nama'		  => $this->input->post('nama'),
			'kode_produk' => $this->input->post('kode_produk'),
			'id_kategori' => $this->input->post('id_kategori'),
			'harga' 	  => $this->input->post('harga'),
			'stok' 		  => $this->input->post('stok'),
		];
		$this->db->insert('produk', $data);

		$this->session->set_flashdata('notif', '<div class="alert alert-info alert-dismissible fade show mx-5 mt-3" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
			Data produk berhasil ditambahkan
		</div>');
		redirect('produk');
	}
	public function hapus($id)
	{
		$this->db->where('id_produk', $id);
		$this->db->delete('produk');
		$this->session->set_flashdata('notif', '<div class="alert alert-info alert-dismissible fade show mx-5 mt-3" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
			Data produk berhasil dihapus
		</div>');
		redirect('produk');
	}

	public function edit()
	{
		$data = [
			'nama' => $this->input->post('nama'),
			'kode_produk' => $this->input->post('kode_produk'),
			'id_kategori' => $this->input->post('id_kategori'),
			'harga' => $this->input->post('harga'),
			'stok' => $this->input->post('stok'),
		];
		$where = [
			'id_produk' => $this->input->post('id_produk')
		];
		$this->db->update('produk', $data, $where);
		$this->session->set_flashdata('notif', '<div class="alert alert-info alert-dismissible fade show mx-5 mt-3" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
			Data produk berhasil diedit
		</div>');
		redirect('produk');
	}

	public function simpan_kategori()
	{
		$data = [
			'kategori' => $this->input->post('kategori')
		];
		$this->db->insert('kategori_produk', $data);
		$this->session->set_flashdata('notif', '<div class="alert alert-info alert-dismissible fade show mx-5 mt-3" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
			Data kategori produk berhasil ditambahkan
		</div>');
		redirect('produk');
	}

	public function hapus_kategori($id)
	{
		$this->db->where('id_kategori', $id);
		$this->db->delete('kategori_produk');
		$this->session->set_flashdata('notif', '<div class="alert alert-info alert-dismissible fade show mx-5 mt-3" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
			Data kategori produk berhasil dihapus
		</div>');
		redirect('produk');
	}
	public function edit_kategori()
	{
		$data = [
			'kategori' => $this->input->post('kategori')
		];
		$where = [
			'id_kategori' => $this->input->post('id_kategori')
		];
		$this->db->update('kategori_produk', $data, $where);
		$this->session->set_flashdata('notif', '<div class="alert alert-info alert-dismissible fade show mx-5 mt-3" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
			Data kategori produk berhasil diedit
		</div>');
		redirect('produk');
	}
}
