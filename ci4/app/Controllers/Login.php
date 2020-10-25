<?php

namespace App\Controllers;

use App\Models\M_pelanggan;

class Login extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM tblidentitas");
        $row = $query->getRowArray();

        $cart = \Config\Services::cart();
        $data = ['cart' => $cart, 'identitas' => $row];
        if ($this->request->getMethod() == 'post') {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $model = new M_pelanggan();
            $pelanggan = $model->where(['email' => $email, 'password' => $password, 'aktif' => 1])->first();

            if (empty($pelanggan)) {
                $data['info'] = "Email atau Password Salah !";
            } else {
                $this->setSession($pelanggan);
                return redirect()->to(base_url("homepage"));
            }
        } else {
            # code...
        }
        return view('login/login',$data);
    }

    public function setSession($pelanggan)
    {
        $data = [
            'idpelanggan' => $pelanggan['idpelanggan'],
            'pelanggan' => $pelanggan['pelanggan'],
            'userLoggedIn' => true
        ];
        session()->set($data);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/login'));
    }

    //--------------------------------------------------------------------

}
