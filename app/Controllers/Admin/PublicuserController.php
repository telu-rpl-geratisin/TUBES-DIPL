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
        $publicModel = new Publicuser();
        $data_table = new TablesIgniter();

        $data_table->setTable($publicModel->noticeFunction())
            ->setDefaultOrder('username', 'DESC')
            ->setSearch(['username', 'email', 'first_name', 'phone', 'address'])
            ->setOrder(['username', 'email', 'first_name', 'phone', 'address'])
            ->setOutput(['username', 'email', 'first_name', 'phone', 'address']);

        return $data_table->getDatatable();
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
