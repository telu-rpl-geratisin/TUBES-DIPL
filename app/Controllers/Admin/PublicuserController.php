<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\User;
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
        $model = new User();
        $table = new TablesIgniter();

        $table->setTable(
                $model->noticeTable()
                    ->where('type', 'public')
            )
            ->setDefaultOrder('username', 'DESC')
            ->setSearch(['username', 'email', 'name', 'contact'])
            ->setOrder(['username', 'email', 'name'])
            ->setOutput([
                'username', 'email', 'name', 'contact', 
                function($row)
                {
                    $buttonInfo = '<button type="button" class="btn btn-info" data-toggle="modal" data-target="#userInfoModal" data-user-id="'.$row["id"].'"><i class="fas fa-info-circle"></i></button>';
                    $buttonDel = '<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteConfirmModal" data-user-id="'.$row["id"].'" data-name="'.$row["name"].'"><i class="fas fa-trash"></i></button>';
                    return  $buttonInfo.' '.$buttonDel;
                }
            ]);

        return $table->getDatatable();
    }
}
