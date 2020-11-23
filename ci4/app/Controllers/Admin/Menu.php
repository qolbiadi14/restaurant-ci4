<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\M_kategori;
use App\Models\M_menu;

class Menu extends BaseController
{
	protected $db;
	protected $query;
	protected $row;

	public function __construct()
	{
		$this->db = \Config\Database::connect();
		$this->query = $this->db->query("SELECT * FROM tblidentitas");
		$this->row = $this->query->getRowArray();
	}

	public function index()
	{
		$pager = \Config\Services::pager();
		$model = new M_menu;

		$data = [
			'menu' => $model->paginate(3, 'page'),
			'pager' => $model->pager,
			'identity' => $this->row
		];
		return view('admin/menu/menu', $data);
	}

	public function read()
	{
		$pager = \Config\Services::pager();
		if (isset($_GET['idkategori'])) {
			$id = $_GET['idkategori'];
			$model = new M_menu();
			$jumlah = $model->where('idkategori', $id)->findAll();
			$count = count($jumlah);

			$tampil = 3;
			$mulai = 0;

			if (isset($_GET['page'])) {
				$page = $_GET['page'];
				$mulai = ($tampil * $page) - $tampil;
			}

			$menu = $model->where('idkategori', $id)->findAll($tampil, $mulai);

			$data = [
				'menu' => $menu,
				'pager' => $pager,
				'tampil' => $tampil,
				'total' => $count,
				'identity' => $this->row

			];

			return view("/admin/menu/cari", $data);
		}
	}

	public function create()
	{
		$model = new M_kategori();
		$kategori = $model->findAll();

		$data = [
			'kategori' => $kategori,
			'identity' => $this->row
		];
		echo view("/admin/menu/insert", $data);
	}

	public function insert()
	{
		$request = \Config\Services::request();
		$file = $request->getfile('gambar');
		$name = $file->getName();

		$data = [
			'idkategori' => $request->getPost('idkategori'),
			'menu' => $request->getPost('menu'),
			'gambar' => $name,
			'harga' => $request->getPost('harga')
		];

		$model = new M_menu();

		if ($model->insert($data) === false) {
			$error = $model->errors();
			session()->setFlashdata('info', $error);
			return redirect()->to(base_url("/admin/menu/create"));
		} else {
			$file->move('./upload');
			return redirect()->to(base_url("/admin/menu"));
		}
	}

	public function option()
	{
		$model = new M_kategori();
		$kategori = $model->findAll();
		$data = [
			'kategori' => $kategori
		];
		return view('admin/template/option', $data);
	}

	public function find($id = null)
	{
		$model = new M_menu();
		$menu = $model->find($id);

		$kategorimodel = new M_kategori();
		$kategori = $kategorimodel->findAll();

		$data = [
			'menu' => $menu,
			'kategori' => $kategori,
			'identity' => $this->row

		];

		return view("admin/menu/update", $data);
	}

	public function update()
	{
		$db = \Config\Database::connect();

		$file = $this->request->getfile('gambar');
		$name = $file->getName();

		if (empty($name)) {
			$name = $this->request->getPost('gambar');
		} else {
			$file->move('./upload');
		}

		$idmenu = $this->request->getPost('idmenu');
		$idkategori = $this->request->getPost('idkategori');
		$menu = $this->request->getPost('menu');
		$gambar = $name;
		$harga = $this->request->getPost('harga');

		$sql = "UPDATE tblmenu SET idkategori='$idkategori', menu='$menu', gambar='$name', harga=$harga WHERE idmenu=$idmenu";
		$db->query($sql);
		return redirect()->to(base_url("/admin/menu"));
	}

	public function delete($id = null)
	{
		$model = new M_menu();
		$model->delete($id);
		return redirect()->to(base_url("/admin/menu"));
	}

	//--------------------------------------------------------------------

}
