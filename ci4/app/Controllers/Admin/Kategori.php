<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\M_kategori;

class Kategori extends BaseController
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
		$model = new M_kategori();
		$kategori = $model->findAll();

		$data = [
			'kategori' => $model->paginate(4, 'page'),
			'pager' => $model->pager,
			'identity' => $this->row
		];
		return view('admin/kategori/kategori', $data);
	}

	public function create()
	{

		$data = [
			'identity' => $this->row
		];
		return view("/admin/kategori/insert", $data);
	}

	public function insert()
	{
		$model = new M_kategori();
		if ($model->insert($_POST) === false) {
			$error = $model->errors();
			session()->setFlashdata('info', $error['kategori']);
			return redirect()->to(base_url("/admin/kategori/create"));
		} else {
			return redirect()->to(base_url("/admin/kategori"));
		};
	}

	public function find($id = null)
	{
		$model = new M_kategori();
		$kategori = $model->find($id);

		$data = [
			'kategori' => $kategori,
			'identity' => $this->row
		];

		return view("admin/kategori/update", $data);
	}

	public function update()
	{
		$db = \Config\Database::connect();
		$id = $_POST['idkategori'];
		$kategori = $_POST['kategori'];
		$keterangan = $_POST['keterangan'];
		$sql = "UPDATE tblkategori SET kategori='$kategori', keterangan='$keterangan' WHERE idkategori=$id";
		$db->query($sql);
		return redirect()->to(base_url("/admin/kategori"));
	}

	public function delete($id = null)
	{
		$model = new M_kategori();
		$model->delete($id);
		return redirect()->to(base_url("/admin/kategori"));
	}

	//--------------------------------------------------------------------

}
