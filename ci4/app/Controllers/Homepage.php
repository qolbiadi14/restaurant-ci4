<?php

namespace App\Controllers;

use App\Models\M_kategori;
use App\Models\M_menu;
use App\Models\M_slider;

class Homepage extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $cart = \Config\Services::cart();

        $model = new M_kategori;
        $model2 = new M_menu;
        $model3 = new M_slider;

        $query = $db->query("SELECT * FROM tblidentitas");
        $row = $query->getRowArray();

        $kategori = $model->findAll();
        $menu = $model2->findAll();
        $slider = $model3->findAll();
        $data = [
            'cart' => $cart,
            'kategori' => $kategori,
            'menu' => $menu,
            'identitas' => $row,
            'slider' => $slider
        ];
        echo view('home/homepage', $data);
    }

    //--------------------------------------------------------------------

}
