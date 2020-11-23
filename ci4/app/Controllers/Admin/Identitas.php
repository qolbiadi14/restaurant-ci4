<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\M_identitas;

class Identitas extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $model = new M_identitas();
        $identitas = $model->find(1);
        $query = $db->query("SELECT * FROM tblidentitas");
        $row = $query->getRowArray();

        $data = [
            'identitas' => $identitas,
            'identity' => $row
        ];

        return view('admin/identitas/update', $data);
    }

    public function find($id = null)
    {
    }

    public function update()
    {
        $id = $this->request->getPost('idtoko');

        $data = [
            'namatoko' => $this->request->getPost('namatoko'),
            'title' => $this->request->getPost('title'),
            'alamattoko' => $this->request->getPost('alamattoko'),
            'emailtoko' => $this->request->getPost('emailtoko'),
            'nomortoko' => $this->request->getPost('nomortoko'),
            'deskripsitoko' => $this->request->getPost('deskripsitoko')
        ];

        $model = new M_identitas();
        $model->update($id, $data);
        return redirect()->to(base_url('/admin/identitas'));
    }

    public function updateGambar()
    {
        $id = $this->request->getPost('idtoko');

        if (isset($_POST['upicon'])) {
            $icon = $this->request->getfile('icon');
            $checkIcon = $icon->getName();
            if (empty($checkIcon)) {
                $checkIcon = $this->request->getPost('icon');
            } else {
                $icon->move('./img/icon');
            }
            $data = ['icon' => $checkIcon];
            // $model = new M_identitas();
            // $model->update($id, $data);
            $db = \Config\Database::connect();
            $tabel = $db->table('tblidentitas');
            $tabel->set('icon', $checkIcon);
            $tabel->where('idtoko', $id);
            $tabel->update();
        }

        if (isset($_POST['uplogo'])) {
            $logo = $this->request->getfile('logo');
            $checkLogo = $logo->getName();
            if (empty($checkLogo)) {
                $checkLogo = $this->request->getPost('logo');
            } else {
                $logo->move('./img/logo');
            }
            $data = ['logo' => $checkLogo];
            $model = new M_identitas();
            $model->update($id, $data);
        }

        if (isset($_POST['uphero'])) {
            $hero = $this->request->getfile('hero');
            $checkHero = $hero->getName();
            if (empty($checkHero)) {
                $checkHero = $this->request->getPost('hero');
            } else {
                $hero->move('./img/hero');
            }
            $data = ['hero' => $checkHero];
            $model = new M_identitas();
            $model->update($id, $data);
        }

        return redirect()->to(base_url('/admin/identitas'));
    }

    //--------------------------------------------------------------------

}
