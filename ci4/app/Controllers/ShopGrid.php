<?php namespace App\Controllers;

use App\Models\M_kategori;
use App\Models\M_menu;

class ShopGrid extends BaseController
{
	public function index()
	{
		$model = new M_kategori;
		$model2 = new M_menu;
		$kategori = $model->findAll();
		$menu = $model2->findAll();
		$data = [
			'kategori' => $kategori,
			'menu' => $menu
		];
		echo view('shop_grid/shop_grid',$data);
	}

	//--------------------------------------------------------------------

}
