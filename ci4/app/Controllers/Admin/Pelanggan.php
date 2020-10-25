<?php namespace App\Controllers\Admin;
use App\Controllers\BaseController;

use App\Models\M_pelanggan;

class Pelanggan extends BaseController
{
	public function index()
	{
        $pager = \Config\Services::pager();
        
        $model = new M_pelanggan;
        $pelanggan = $model->findAll();
        
        $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM tblidentitas");
        $row = $query->getRowArray();
        
		$data = [
            'pelanggan' => $model->paginate(3,'page'),
			'pager' => $model->pager,
			'identity' => $row
		
        ];
		return view('admin/pelanggan/pelanggan',$data);
    }

    public function delete($id = null)
    {
        $model = new M_pelanggan();
        $model->delete($id);
        return redirect()->to(base_url("/admin/pelanggan"));
    }

    public function update($id=null,$isi=1)
    {
        $model = new M_pelanggan();
        if ($isi==0) {
            $isi=1;
        } else {
            $isi=0;
        }
        
        $data = [
            'aktif' => $isi
        ];

        $model->update($id,$data);
        return redirect()->to(base_url("/admin/pelanggan"));
    }

	//--------------------------------------------------------------------

}