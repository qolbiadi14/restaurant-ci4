<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\M_order;

class Order extends BaseController
{
    protected $db;
    protected $query;
    protected $row;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->querys = $this->db->query("SELECT * FROM tblidentitas");
        $this->rows = $this->querys->getRowArray();
    }

    public function index()
    {
        $pager = \Config\Services::pager();

        $sql = "SELECT * FROM vorder";
        $result = $this->db->query($sql);
        $row = $result->getResult('array');

        $total = count($row);
        $tampil = 5;

        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            $mulai = ($tampil * $page) - $tampil;
            $sql = "SELECT * FROM vorder ORDER BY status ASC LIMIT $mulai, $tampil";
        } else {
            $sql = "SELECT * FROM vorder ORDER BY status ASC LIMIT 0, $tampil";
        }

        $result = $this->db->query($sql);
        $row = $result->getResult('array');

        $data = [
            'order' => $row,
            'pager' => $pager,
            'perPage' => $tampil,
            'total' => $total,
            'identity' => $this->rows
        ];
        return view('admin/order/order', $data);
    }

    public function find($id = null)
    {
        $sql = "SELECT * FROM vorder WHERE idorder=$id";
        $result = $this->db->query($sql);
        $row = $result->getResult('array');

        $sql = "SELECT * FROM vorderdetail WHERE idorder=$id";
        $result = $this->db->query($sql);
        $detail = $result->getResult('array');

        $data = [
            'order' => $row,
            'detail' => $detail,
            'identity' => $this->rows
        ];

        return view('admin/order/update', $data);
    }

    public function update()
    {
        if (isset($_POST['bayar'])) {
            $idorder = $_POST['idorder'];
            $total = $_POST['total'];
            $bayar = $_POST['bayar'];

            if ($bayar < $total) {
                session()->setFlashdata('info', 'Pembayaran Kurang !');
                $this->find($idorder);
            } else {
                $kembali = $bayar - $total;
                $sql = "UPDATE tblorder SET bayar=$bayar, kembali=$kembali, status=1 WHERE idorder=$idorder";
                $db = \Config\Database::connect();
                $db->query($sql);
                return redirect()->to(base_url("/admin/order"));
            }
        }
    }

    //--------------------------------------------------------------------

}
