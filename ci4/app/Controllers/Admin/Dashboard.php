<?php namespace App\Controllers\Admin;
use App\Controllers\BaseController;

class Dashboard extends BaseController
{
	public function index()
	{
		$db = \Config\Database::connect();
		$order = $db->table('tblorder');
		$orderdetail = $db->table('tblorderdetail');
		$user = $db->table('tbluser');
		$pelanggan = $db->table('tblpelanggan');
		
		$query = $db->query("SELECT * FROM tblidentitas");
        $row = $query->getRowArray();
        
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d');
        $order->where('tglorder',$date);
        $count = $order->get()->resultID->num_rows;

		$data = [
			'order' => $count,
			'orderdetail' => $orderdetail->countAll(),
			'user' => $user->countAll(),
			'pelanggan' => $pelanggan->countAll(),
			'identity' => $row
		];
		
		return view('admin/dashboard', $data);
	}

	//--------------------------------------------------------------------

}
