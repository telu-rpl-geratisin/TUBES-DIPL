<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Companyuser;

class CompanyuserController extends BaseController
{
    public function index()
    {
        $users = Companyuser::ins()->findAll();

        dd($users);
    }

    public function userDetails($id)
    {
        $user = Companyuser::ins()->find($id);

        dd($user);
    }

    public function deleteUser($id)
    {
        $res = Companyuser::ins()->delete($id);

        dd($res);
    }
}
