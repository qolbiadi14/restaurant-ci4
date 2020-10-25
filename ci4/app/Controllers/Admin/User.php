<?php namespace App\Controllers\Admin;
use App\Controllers\BaseController;

use App\Models\M_user;

class User extends BaseController
{
	public function index()
	{
        $pager = \Config\Services::pager();
        $model = new M_user;
        $user = $model->findAll();
        
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM tblidentitas");
        $row = $query->getRowArray();
        
		$data = [
            'user' => $model->paginate(3, 'page'),
            'pager' => $model->pager,
            'identity' => $row
        ];
		return view('admin/user/user',$data);
    }

    public function create()
    {
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM tblidentitas");
        $row = $query->getRowArray();
        $data = [
                'level' => ['Admin', 'Koki', 'Kasir'],
                'identity' => $row
            ];

        return view('/admin/user/insert', $data);
    }

    public function insert()
    {
        if (isset($_POST['password'])) {
            $data = [
                    'user' => $_POST['user'],
                    'email' => $_POST['email'],
                    'password' => $_POST['password'],
                    'level' => $_POST['level'],
                    'aktif' => 1
                ];

            $model = new M_user();
            $model->insert($data);
            return redirect()->to(base_url("/admin/user"));
        }
    }

    public function delete($id = null)
    {
        $model = new M_user();
        $model->delete($id);
        return redirect()->to(base_url("/admin/user"));
    }

    public function update($id = null, $isi = 1)
    {
        $model = new M_user();
        if ($isi == 0) {
            $isi = 1;
        } else {
            $isi = 0;
        }

        $data = [
                'aktif' => $isi
            ];

        $model->update($id, $data);
        return redirect()->to(base_url("/admin/user"));
    }

    public function find($id = null)
    {
        $model = new M_user();
        $user = $model->find($id);

        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM tblidentitas");
        $row = $query->getRowArray();
        
        $data = [
                'user' => $user,
                'level' => ['Admin', 'Koki', 'Kasir'],
                'identity' => $row

            ];

        return view("admin/user/update", $data);
    }

    public function change()
    {
        $id = $_POST['iduser'];

        $data = [
                'user' => $_POST['user'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'level' => $_POST['level']
            ];

        $model = new M_user();
        $model->update($id, $data);
        return redirect()->to(base_url('/admin/user'));
    }

	//--------------------------------------------------------------------

}