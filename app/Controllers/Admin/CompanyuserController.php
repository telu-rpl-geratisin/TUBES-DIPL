<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\User;
use monken\TablesIgniter;

class CompanyuserController extends BaseController
{
    public function index()
    {
        return view('admin/company', [
            'title' => 'Pengguna Perusahaan'
        ]);
    }

    public function ajaxFetchAll()
    {
        $model = new User();
        $table = new TablesIgniter();

        $table->setTable(
                $model->noticeTable()
                    ->where('type', 'company')
            )
            ->setDefaultOrder('username', 'DESC')
            ->setSearch(['username', 'email', 'name', 'contact'])
            ->setOrder(['username', 'email', 'name'])
            ->setOutput([
                'username', 'email', 'name', 'contact', 
                function($row)
                {
                    $buttonInfo = '<button type="button" class="btn btn-info" data-toggle="modal" data-target="#companyInfoModal" data-company-id="'.$row["id"].'"><i class="fas fa-info-circle"></i> Info</button>';
                    $buttonDel = '<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteConfirmModal" data-company-id="'.$row["id"].'" data-name="'.$row["name"].'"><i class="fas fa-trash"></i> Delete</button>';
                    return  $buttonInfo.' '.$buttonDel;
                }
            ]);

        return $table->getDatatable();
    }
}
