<?php

namespace App\Controllers;
use App\Models\M_orderdetail;

class Histori extends BaseController
{
	public function index($idpelanggan = null)
	{
        $model = new M_orderdetail;
        $histori = $model->where('idpelanggan',$idpelanggan)->findAll();
        
        $db = \Config\Database::connect();
        $cart = \Config\Services::cart();
        $query = $db->query("SELECT * FROM tblidentitas");
        $row = $query->getRowArray();
        $builder = $db->table('vorderdetail');
        $builder->where('idpelanggan',$idpelanggan);
        $count = $builder->countAllResults();
        
		$data = [
            'histori' => $histori,
            'identitas' => $row,
            'cart' => $cart,
            'count' => $count
            
        ];
		return view('histori/histori',$data);
    }

	//--------------------------------------------------------------------

}