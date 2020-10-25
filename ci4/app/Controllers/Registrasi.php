<?php namespace App\Controllers;

use App\Models\M_pelanggan;

class Registrasi extends BaseController
{
	public function index()
	{
		$db = \Config\Database::connect();
		$cart = \Config\Services::cart();
		$query = $db->query("SELECT * FROM tblidentitas");
		$row = $query->getRowArray();
		$data = ['cart' => $cart, 'identitas' => $row];
		return view('login/registrasi', $data);
	}

	public function insert()
	{
		if (isset($_POST['password'])) {
			$data = [
				'pelanggan' => $_POST['pelanggan'],
				'alamat' => $_POST['alamat'],
				'telp' => $_POST['telp'],
				'email' => $_POST['email'],
				'password' => $_POST['password'],
				'konfirmasi' => $_POST['password'],
				'aktif' => 1
			];

			$model = new M_pelanggan();

			if ($model->insert($data) === false) {
				$error = $model->errors();
				session()->setFlashdata('info', $error);
				return redirect()->to(base_url("registrasi"));
			} else {
				return redirect()->to(base_url("registrasi/success"));
			};
		}
	}

	public function success()
	{
	    $db = \Config\Database::connect();
		$cart = \Config\Services::cart();
		$query = $db->query("SELECT * FROM tblidentitas");
		$row = $query->getRowArray();
		$data = ['cart' => $cart, 'identitas' => $row];
		return view('login/success', $data);
	}

	//--------------------------------------------------------------------

}
