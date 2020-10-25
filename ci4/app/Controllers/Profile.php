<?php

namespace App\Controllers;

use App\Models\M_pelanggan;

class Profile extends BaseController
{
	public function index($idpelanggan = null)
	{
		$cart = \Config\Services::cart();
		$model = new M_pelanggan();
		$pelanggan = $model->find($idpelanggan);

		$db = \Config\Database::connect();
		$query = $db->query("SELECT * FROM tblidentitas");
		$row = $query->getRowArray();

		$data = [
			'cart' => $cart,
			'pelanggan' => $pelanggan,
			'identitas' => $row
		];
		return view('profile/profile', $data);
	}

	public function edit($idpelanggan = null)
	{
		$cart = \Config\Services::cart();
		$model = new M_pelanggan();
		$pelanggan = $model->find($idpelanggan);

		$db = \Config\Database::connect();
		$query = $db->query("SELECT * FROM tblidentitas");
		$row = $query->getRowArray();

		$data = [
			'cart' => $cart,
			'pelanggan' => $pelanggan,
			'identitas' => $row
		];

		return view('profile/edit_profile', $data);
	}

	public function update()
	{
		$request = \Config\Services::request();
		$idpelanggan = $_POST['idpelanggan'];
		$file = $request->getfile('foto');
		$name = $file->getName();

		if (empty($name)) {
			$name = $request->getPost('foto');
		} else {
			$file->move('./upload/profile');
		}
		$pelanggan = $_POST['pelanggan'];
		$alamat = $_POST['alamat'];
		$telp = $_POST['telp'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		$sql = "UPDATE tblpelanggan SET pelanggan='$pelanggan', alamat='$alamat', telp=$telp, email='$email', password='$password',foto='$name' WHERE idpelanggan=$idpelanggan";
		$db = \Config\Database::connect();
		$db->query($sql);

		return redirect()->to(base_url('/profile/index/' . session()->get('idpelanggan')));
	}

	//--------------------------------------------------------------------

}
