<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('level') == null) {
			redirect('auth');
		}
	}

	public function index()
	{
		$this->db->from('pelanggan');
		$pelanggan = $this->db->get()->result_array();

		$tanggal = $this->input->post('tanggal');
		if ($tanggal == null) {
			$this->db->from('penjualan a');
		$this->db->join('pelanggan b', 'a.id_pelanggan=b.id_pelanggan', 'left');
		$this->db->order_by('a.tanggal', 'DESC');
		$penjualan = $this->db->get()->result_array();
		} else {
		$this->db->from('penjualan a');
		$this->db->join('pelanggan b', 'a.id_pelanggan=b.id_pelanggan', 'left');
		$this->db->order_by('a.tanggal', 'DESC')->where('a.tanggal', $tanggal);
		$penjualan = $this->db->get()->result_array();
		}

		$data = [
			'judul_halaman' => "halaman penjualan",
			'pelanggan' 	=> $pelanggan,
			'penjualan' 	=> $penjualan
		];

		$this->template->load('template', 'hal_penjualan', $data);
	}

	public function transaksi($id)
	{
		date_default_timezone_set("Asia/Jakarta");
		$tanggal = date('Y-m');
		$this->db->from('penjualan');
		$this->db->where("DATE_FORMAT(tanggal, '%Y-%m') =", $tanggal);
		$jumlah = $this->db->count_all_results();
		$nota = date('ymd') . $jumlah + 1;


		$this->db->from('produk')->where('stok >', 0)->order_by('nama', 'ASC');
		$produk = $this->db->get()->result_array();

		$this->db->from('pelanggan')->where('id_pelanggan', $id);
		$pelanggan = $this->db->get()->row();

		$this->db->from('detail_penjualan a');
		$this->db->join('produk b', 'a.id_produk=b.id_produk', 'left');
		$this->db->where('a.kode_penjualan', $nota);
		$detail = $this->db->get()->result_array();

		$data = [
			'judul_halaman' => "halaman transaksi",
			'id_pelanggan' 	=> $id,
			'nota'			=> $nota,
			'produk'		=> $produk,
			'pelanggan' 	=> $pelanggan,
			'detail'		=> $detail
		];

		$this->template->load('template', 'hal_transaksi', $data);
	}

	public function tambahkeranjang()
	{
		$this->db->from('detail_penjualan');
		$this->db->where('id_produk', $this->input->post('id_produk'));
		$this->db->where('kode_penjualan', $this->input->post('kode_penjualan'));
		$cek = $this->db->get()->result_array();
		if ($cek != null) {
			$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible fade show mx-5 mt-3" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
			Produk sudah ada di keranjang
		</div>');
			redirect($_SERVER['HTTP_REFERER']);
		}

		$this->db->from('produk')->where('id_produk', $this->input->post('id_produk'));
		$harga = $this->db->get()->row()->harga;
		$subtotal = $harga * $this->input->post('jumlah');

		$this->db->from('produk')->where('id_produk', $this->input->post('id_produk'));
		$stok_lama = $this->db->get()->row()->stok;
		$stok_baru = $stok_lama - $this->input->post('jumlah');

		if ($stok_lama <= $this->input->post('jumlah')) {
			$this->session->set_flashdata('notif', '<div class="alert alert-danger alert-dismissible fade show mx-5 mt-3" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
			Maaf stok kurang
		</div>');
			redirect($_SERVER['HTTP_REFERER']);
		} else {

			$data = [
				'kode_penjualan' => $this->input->post('kode_penjualan'),
				'id_produk'		 => $this->input->post('id_produk'),
				'jumlah'		 => $this->input->post('jumlah'),
				'sub_total'		 => $subtotal,
			];
			$this->db->insert('detail_penjualan', $data);

			$data2 = ['stok' => $stok_baru];
			$where = ['id_produk' => $this->input->post('id_produk')];
			$this->db->update('produk', $data2, $where);

			$this->session->set_flashdata('notif', '<div class="alert alert-info alert-dismissible fade show mx-5 mt-3" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
			Produk berhasil di tambahkan ke keranjang
		</div>');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}

	public function hapuskeranjang($id)
	{
		$this->db->from('detail_penjualan')->where('id_detail', $id);
		$stok_hapus = $this->db->get()->row();

		$this->db->from('produk')->where('id_produk', $stok_hapus->id_produk);
		$stok_lama = $this->db->get()->row()->stok;

		$stok_baru = $stok_hapus->jumlah + $stok_lama;

		$data = ['stok' => $stok_baru];
		$where = ['id_produk' => $stok_hapus->id_produk];
		$this->db->update('produk', $data, $where);

		$this->db->where('id_detail', $id);
		$this->db->delete('detail_penjualan');
		$this->session->set_flashdata('notif', '<div class="alert alert-info alert-dismissible fade show mx-5 mt-3" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
			Produk berhasil di hapus dari keranjang
		</div>');
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function bayar()
	{
		$data = [
			'kode_penjualan' => $this->input->post('kode_penjualan'),
			'tanggal'		 => date('y-m-d'),
			'total_harga' 	 => $this->input->post('total_harga'),
			'id_pelanggan'	 => $this->input->post('id_pelanggan'),
		];
		$this->db->insert('penjualan', $data);
		$this->session->set_flashdata('notif', '<div class="alert alert-info alert-dismissible fade show mx-5 mt-3" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">×</span>
			</button>
			Transaksi berhasil
		</div>');
		redirect('penjualan/invoice/' . $this->input->post('kode_penjualan'));
	}

	public function invoice($kode_penjualan)
	{
		$this->db->from('penjualan a');
		$this->db->join('pelanggan b', 'a.id_pelanggan=b.id_pelanggan', 'left');
		$this->db->where('a.kode_penjualan', $kode_penjualan);
		$penjualan = $this->db->get()->row();

		$this->db->from('detail_penjualan a');
		$this->db->join('produk b', 'a.id_produk=b.id_produk', 'left');
		$this->db->where('a.kode_penjualan', $kode_penjualan);
		$detail = $this->db->get()->result_array();

		$data = [
			'judul_halaman' => "halaman Invoice",
			'penjualan' 	=> $penjualan,
			'detail'		=> $detail
		];

		$this->template->load('template', 'hal_invoice', $data);
	}
}
