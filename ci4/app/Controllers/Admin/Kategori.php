<?php namespace App\Controllers\Admin;
use App\Controllers\BaseController;

use App\Models\M_kategori;

class Kategori extends BaseController
{
	public function index()
	{
        $model = new M_kategori;
        $kategori = $model->findAll();
        
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM tblidentitas");
        $row = $query->getRowArray();
		$data = [
            'kategori' => $kategori,
            'identity' => $row
        ];
		return view('admin/kategori/kategori',$data);
	}

	public function create()
	{
	    $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM tblidentitas");
        $row = $query->getRowArray();
        
        $data = [
            'identity' => $row
        ];
		return view("/admin/kategori/insert",$data);
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
		$kategori = $model ->find($id);
		
		$db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM tblidentitas");
        $row = $query->getRowArray();
		$data = [
			'kategori' => $kategori,
			'identity' => $row
		];

		return view("admin/kategori/update",$data);
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
		$model -> delete($id);
		return redirect()->to(base_url("/admin/kategori"));
	}

	//--------------------------------------------------------------------

}