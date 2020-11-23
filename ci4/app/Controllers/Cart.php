<?php

namespace App\Controllers;

use App\Models\M_menu;

class Cart extends BaseController
{

	public function index()
	{
		$db = \Config\Database::connect();
		$query = $db->query("SELECT * FROM tblidentitas");
		$row = $query->getRowArray();
		$cart = \Config\Services::cart();
		$data = [
			'cart' => $cart,
			'identitas' => $row
		];
		return view('cart/cart', $data);
	}

	public function buy($id = null)
	{
		$cart = \Config\Services::cart();
		$model = new M_menu();
		$menu = $model->find($id);

		$data = array(
			'id'      => $menu['idmenu'],
			'qty'     => 1,
			'name'    => $menu['menu'],
			'price'   => $menu['harga'],
			'gambar'  => $menu['gambar']
		);

		$cart->insert($data);
		return redirect()->to(base_url('/cart'));
	}

	public function tambah($qty, $id)
	{
		$cart = \Config\Services::cart();
		$jumlah = $qty + 1;
		$data = array(
			'rowid' => $id,
			'qty' => $jumlah
		);
		$cart->update($data);
		return redirect()->to(base_url('/cart'));
	}

	public function kurang($qty, $id)
	{
		$cart = \Config\Services::cart();
		$jumlah = $qty - 1;

		$data = array(
			'rowid' => $id,
			'qty' => $jumlah
		);

		if ($qty < 2) {
			return redirect()->to(base_url('/cart/remove/' . $id));
		} else {
			$cart->update($data);
		}

		return redirect()->to(base_url('/cart'));
	}

	public function remove($id)
	{
		$cart = \Config\Services::cart();
		$rowid = $id;
		$cart->remove($rowid);
		return redirect()->to(base_url('/cart'));
	}
	//--------------------------------------------------------------------

}
