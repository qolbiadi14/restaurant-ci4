<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\M_slider;

class Slider extends BaseController
{
    public function index()
    {
        $model = new M_slider();
        $slider = $model->findAll();

        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM tblidentitas");
        $row = $query->getRowArray();
        $data = [
            'slider' => $slider,
            'identity' => $row
        ];
        return view('admin/slider/slider', $data);
    }

    public function create()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM tblidentitas");
        $row = $query->getRowArray();

        $data = [
            'identity' => $row
        ];
        return view("/admin/slider/insert", $data);
    }

    public function insert()
    {
        $model = new M_slider();
        $request = \Config\Services::request();
        $file = $request->getfile('slider');
        $name = $file->getName();

        $data = [
            'slider' => $name
        ];

        $model->insert($data);
        $file->move('./img/slider');
        return redirect()->to(base_url("/admin/slider"));
    }

    public function find($id = null)
    {
        $model = new M_slider();
        $slider = $model->find($id);

        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM tblidentitas");
        $row = $query->getRowArray();
        $data = [
            'slider' => $slider,
            'identity' => $row
        ];

        return view("admin/slider/update", $data);
    }

    public function update()
    {
        $db = \Config\Database::connect();
        $idslider = $this->request->getPost('idslider');
        $file = $this->request->getfile('slider');
        $name = $file->getName();

        if (empty($name)) {
            $name = $this->request->getPost('slider');
        } else {
            $file->move('./img/slider');
        }

        $sql = "UPDATE tblslider SET slider='$name' WHERE idslider=$idslider";
        $db->query($sql);
        return redirect()->to(base_url("/admin/slider"));
    }

    public function delete($id = null)
    {
        $model = new M_slider();
        $model->delete($id);
        return redirect()->to(base_url("/admin/slider"));
    }

    //--------------------------------------------------------------------

}
