<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;
use App\Models\M_orderdetail;

class Orderdetail extends BaseController
{
	public function index()
	{
        $pager = \Config\Services::pager();
        $model = new M_orderdetail;
        
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM tblidentitas");
        $row = $query->getRowArray();
        
		$data = [
            'orderdetail' => $model->paginate(5, 'page'),
            'pager' => $model->pager,
            'identity' => $row
        ];
		return view('admin/orderdetail/orderdetail',$data);
    }

    public function cari()
    {
        if (isset($_POST['awal'])) {
            $awal = $_POST['awal'];
            $sampai = $_POST['sampai'];

            $sql = "SELECT * FROM vorderdetail WHERE tglorder BETWEEN '$awal' AND '$sampai' ";

            $db = \Config\Database::connect();

            $result = $db->query($sql);
            $row = $result->getResult('array');
            
            $query = $db->query("SELECT * FROM tblidentitas");
            $rows = $query->getRowArray();

            $data = [
                'orderdetail' => $row,
                'identity' => $rows
            ];

            return view("/admin/orderdetail/cari", $data);
        }
    }

	//--------------------------------------------------------------------

}