<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\M_orderdetail;

class Orderdetail extends BaseController
{
    protected $db;
    protected $query;
    protected $row;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->query = $this->db->query("SELECT * FROM tblidentitas");
        $this->row = $this->query->getRowArray();
    }

    public function index()
    {
        $pager = \Config\Services::pager();
        $model = new M_orderdetail;

        $data = [
            'orderdetail' => $model->paginate(5, 'page'),
            'pager' => $model->pager,
            'identity' => $this->row
        ];
        return view('admin/orderdetail/orderdetail', $data);
    }

    public function cari()
    {
        if (isset($_POST['awal'])) {
            $awal = $_POST['awal'];
            $sampai = $_POST['sampai'];

            $sql = "SELECT * FROM vorderdetail WHERE tglorder BETWEEN '$awal' AND '$sampai' ";

            $result = $this->db->query($sql);
            $row = $result->getResult('array');

            $query = $this->db->query("SELECT * FROM tblidentitas");
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
