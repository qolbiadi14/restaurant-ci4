<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\M_user;

class Forgot extends BaseController
{

    public function index()
    {
        $model = new M_user();
        $user = $model->findAll();
        $data = ['user' => $user];
        return view('/admin/forgot_pass',$data);
    }

    public function emailreset()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM tblidentitas");
        $request = \Config\Services::request();
        $services = \Config\Services::email();
        $email = $request->getPost('email');
        $result = $query->getRow();
        $emailtoko = $result->emailtoko;
		$data = ['email' => $email];

        if ($this->updatereset($email)) {
            $services->setFrom($emailtoko);
            $services->setTo($email);
            $services->setSubject('Reset your account password');

            $message = "<p>Anda melakukan permintaan reset password</p>";
            $message .= "<a href='" . base_url('/admin/forgot/conf/'.$email) . "'>klik untuk reset password</a>";
            $services->setMessage($message);

            if ($services->send()) {
                echo "Email berhasil dikirim silahkan cek email anda";
            } else {
                echo "Gagal mengirim email";
            }
        } else {
            die("Email yang anda masukan belum terdaftar");
        }
    }

    public function updatereset($email)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM tbluser WHERE email = '".$email."';");
        $result = $query->getRow();
        if ($result == NULL) {
            return FALSE;
        } else {
            return TRUE;
        }
        
    }

    public function conf($email)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM tbluser WHERE email = '".$email."';");
        $result = $query->getRow();
        $id = $result->iduser;
        $data = ['id' => $id];
        return view('/admin/confirm_pass',$data);
    }

    public function reset()
    {
        $request = \Config\Services::request();
        $id = $request->getPost('iduser');

        $data = [
            'password' => password_hash($request->getPost('password'), PASSWORD_DEFAULT),
        ];
        $model = new M_user();
        $model->update($id, $data);
        return redirect()->to(base_url('/admin/login'));
    }
}
