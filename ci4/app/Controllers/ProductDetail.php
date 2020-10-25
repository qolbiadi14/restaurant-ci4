<?php namespace App\Controllers;

use App\Models\M_kategori;
use App\Models\M_menu;

class ProductDetail extends BaseController
{
	public function index($id = null)
	{
		$cart = \Config\Services::cart();
		$model = new M_menu();
		$menu = $model->find($id);

		$kategorimodel = new M_kategori();
		$kategori = $kategorimodel->findAll();

		$db = \Config\Database::connect();
		$query = $db->query("SELECT * FROM tblidentitas");
		$row = $query->getRowArray();

		$data = [
			'cart' => $cart,
			'menu' => $menu,
			'kategori' => $kategori,
			'identitas' => $row

		];
		echo view('product_detail/product_detail',$data);
	}

	//--------------------------------------------------------------------

}