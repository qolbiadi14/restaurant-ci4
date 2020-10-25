<?php

namespace App\Controllers;

use App\Models\M_pelanggan;

class Forgot extends BaseController
{

    public function index()
    {
        $db = \Config\Database::connect();
        $model = new M_pelanggan();
        $pelanggan = $model->findAll();
        $query = $db->query("SELECT * FROM tblidentitas");
        $row = $query->getRowArray();

        $cart = \Config\Services::cart();
        $data = ['cart' => $cart, 'pelanggan' => $pelanggan, 'identitas' => $row];
        return view('login/forgot_pass',$data);
    }

    public function emailreset()
    {
        helper('text');
        $db = \Config\Database::connect();
		$cart = \Config\Services::cart();
        $request = \Config\Services::request();
        $services = \Config\Services::email();
        
        $email = $request->getPost('email');
        $query = $db->query("SELECT * FROM tblidentitas");
		$row = $query->getRowArray();
		$result = $query->getRow();
        $emailtoko = $result->emailtoko;
        $resetKey = random_string('alnum', 50);
		$data = ['cart' => $cart, 'identitas' => $row, 'email' => $email];

        if ($this->updatereset($email, $resetKey)) {
            $services->setFrom($emailtoko);
            $services->setTo($email);
            $services->setSubject('Reset your account password');

            $message = "<p>Anda melakukan permintaan reset password</p>";
            $message .= "<a href='" . base_url('forgot/conf/'.$email.'/'.$resetKey) . "'>klik untuk reset password</a>";
            $services->setMessage($message);

            if ($services->send()) {
                return view('login/ceksuccess', $data);
            } else {
                return view('login/cekgagal', $data);
            }
        } else {
            die("Email yang anda masukan belum terdaftar");
        }
    }

    public function updatereset($email, $resetKey)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('tblpelanggan');
        $q = $db->query("SELECT * FROM tblpelanggan WHERE email = '$email'");
        $result = $q->getRow();
        $id = $result->idpelanggan;
        $query = $builder->getWhere(['email' => $email]);
        $result = $query->getRow();
        $builder->set('token',$resetKey);
        $builder->where('idpelanggan',$id);
        $builder->update();
        if ($result == NULL) {
            return FALSE;
        } else {
            return TRUE;
        }
        
    }

    public function conf($email, $resetKey)
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM tblpelanggan WHERE email = '$email'");
        $queryId = $db->query("SELECT * FROM tblidentitas");
        $row = $queryId->getRowArray();
        $result = $query->getRow();
        $id = $result->idpelanggan;

        $cart = \Config\Services::cart();
        $data = ['cart' => $cart, 'id' => $id, 'identitas' => $row , 'token' => $resetKey];
        return view('login/confirm_pass',$data);
    }

    public function reset()
    {
        $db = \Config\Database::connect();
        $request = \Config\Services::request();
        $table = $db->table('tblpelanggan');
        
        $id = $request->getPost('idpelanggan');
        $password = $request->getPost('password');
        $konfirmasi = $request->getPost('password');
        $token = $request->getPost('token');

		$select = $db->query("SELECT token FROM tblpelanggan WHERE idpelanggan = '$id'");
		$result = $select->getRow();
		$cek = $result->token;
		
		if ($token == $cek) {
		    $sql = $db->query("UPDATE tblpelanggan SET password='$password' WHERE idpelanggan=$id");
		    $delete = "UPDATE tblpelanggan SET token='' WHERE idpelanggan=$id";
		    $db->query($delete);
		    return redirect()->to(base_url('forgot/success'));
		} else {
		    return redirect()->to(base_url('forgot/tokensalah'));
		}
        
    }

    public function success()
    {
        $db = \Config\Database::connect();
		$cart = \Config\Services::cart();
		$query = $db->query("SELECT * FROM tblidentitas");
		$row = $query->getRowArray();
		$data = ['cart' => $cart, 'identitas' => $row];
        return view('login/fsuccess', $data);
    }
    
    public function tokensalah()
    {
        $db = \Config\Database::connect();
		$cart = \Config\Services::cart();
		$query = $db->query("SELECT * FROM tblidentitas");
		$row = $query->getRowArray();
		$data = ['cart' => $cart, 'identitas' => $row];
        return view('login/tokensalah', $data);
    }
}
