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
            ->setSearch(['username', 'email', 'first_name', 'last_name', 'phone'])
            ->setOrder(['username', 'email', 'first_name', 'last_name', null, null])
            ->setOutput([
                'username', 'email',
                function($row)
                {
                    return $row["first_name"]." ".$row["last_name"];
                }
                , 'phone', 
                function($row)
                {
                    $buttonInfo = '<button type="button" class="btn btn-info" data-toggle="modal" data-target="#userInfoModal" data-user-id="'.$row["id"].'"><i class="fas fa-info-circle"></i> Info</button>';
                    $buttonDel = '<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteConfirmModal" data-user-id="'.$row["id"].'" data-username="'.$row["username"].'"><i class="fas fa-trash"></i> Delete</button>';
                    return  $buttonInfo.' '.$buttonDel;
                }
            ]);

        return $table->getDatatable();
    }
}
