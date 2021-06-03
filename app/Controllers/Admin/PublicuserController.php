<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Publicuser;

class PublicuserController extends BaseController
{
	public function index()
	{
		$users = Publicuser::ins()->findAll();

        return view('admin/public', [
            'title' => 'Pengguna Publik',
            'users' => $users
        ]);
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
