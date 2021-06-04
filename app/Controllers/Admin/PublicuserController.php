<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Publicuser;
use monken\TablesIgniter;

class PublicuserController extends BaseController
{
	public function index()
	{
        return view('admin/public', [
            'title' => 'Pengguna Publik'
        ]);
	}

    public function ajaxFetchAll()
    {
        $model = new Publicuser();
        $table = new TablesIgniter();

        $table->setTable($model->noticeTable())
            ->setDefaultOrder('username', 'DESC')
            ->setSearch(['username', 'email', 'first_name', 'phone', 'address'])
            ->setOrder(['username', 'email', 'first_name', 'phone', 'address', null])
            ->setOutput([
                'username', 'email', 'first_name', 'phone', 'address', 
                function($row)
                {
                    return '<button class="btn btn-outline-info">'.$row["id"].'</button>';
                }
            ]);

        return $table->getDatatable();
    }

	public function userDetails($id)
    {
        $user = Publicuser::ins()->find($id);

        dd($user);
    }

    public function deleteUser($id)
    {
        $res = Publicuser::ins()->delete($id);

        dd($res);
    }
}
