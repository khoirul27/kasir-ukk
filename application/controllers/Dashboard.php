<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
		date_default_timezone_set("Asia/Jakarta");
		$tanggal = date('Y-m-d');
		$this->db->select('sum(total_harga) as total_harga');
		$this->db->from('penjualan');
		$this->db->where("DATE_FORMAT(tanggal, '%Y-%m-%d') =", $tanggal);
		$penjualan_hari_ini = $this->db->get()->row()->total_harga;

		$tanggal = date('Y-m');
		$this->db->select('sum(total_harga) as total_harga');
		$this->db->from('penjualan');
		$this->db->where("DATE_FORMAT(tanggal, '%Y-%m') =", $tanggal);
		$penjualan_bulan_ini = $this->db->get()->row()->total_harga;

		$this->db->from('penjualan');
		$this->db->where("DATE_FORMAT(tanggal, '%Y-%m') =", $tanggal);
		$transaksi_bulan_ini = $this->db->count_all_results();

		$this->db->from('produk');
		$jumlah_produk = $this->db->count_all_results();

		$this->db->from('detail_penjualan a');
		$this->db->join('produk b', 'a.id_produk = b.id_produk');
		$this->db->select('b.nama, SUM(a.jumlah) as jumlah_produk');
		$this->db->group_by('a.id_produk');
		$this->db->order_by('jumlah_produk', 'desc');
		$this->db->limit(3);
		$terlaris = $this->db->get()->result_array();

		if ($penjualan_bulan_ini == null) {
			$penjualan_bulan_ini = 0;
		}
		if ($penjualan_hari_ini == null) {
			$penjualan_hari_ini = 0;
		}
		if ($transaksi_bulan_ini == null) {
			$transaksi_bulan_ini = 0;
		}
		if ($jumlah_produk == null) {
			$jumlah_produk = 0;
		}

		$data = [
			'judul_halaman' 	  => "halaman dashboard",
			'penjualan_hari_ini'  => $penjualan_hari_ini,
			'penjualan_bulan_ini' => $penjualan_bulan_ini,
			'transaksi_bulan_ini' => $transaksi_bulan_ini,
			'jumlah_produk'		  => $jumlah_produk,
			'terlaris'			  => $terlaris
		];

		$this->template->load('template', 'hal_home', $data);
	}
}
