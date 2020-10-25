<?php

namespace App\Controllers;

use App\Models\M_user;

class LoginAdmin extends BaseController
{
    public function index()
    {
        $data = [];
        if ($this->request->getMethod() == 'post') {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $model = new M_user();
            $user = $model->where(['email' => $email, 'password' => $password, 'aktif' => 1])->first();
            
            if (empty($user)) {
                $data['info'] = "Email atau Password Salah !";
            } else {
                $this->setSession($user);
                if ($user['level'] == 'Admin') {
                        return redirect()->to(base_url("/admin"));
                    }
                    if ($user['level'] == 'Kasir') {
                        return redirect()->to(base_url("/kasir"));
                    }
                    if ($user['level'] == 'Admin') {
                        return redirect()->to(base_url("/koki"));
                    }
            }
        } else {
            # code...
        }

        return view('/admin/login', $data);
    }

    public function setSession($user)
    {
        $data = [
            'user' => $user['user'],
            'email' => $user['email'],
            'level' => $user['level'],
            'loggedIn' => true
        ];
        session()->set($data);
    }
    
    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('/admin/login'));
    }

    //--------------------------------------------------------------------

}
