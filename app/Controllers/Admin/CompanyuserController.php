<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Companyuser;
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
        $model = new Companyuser();
        $table = new TablesIgniter();

        $table->setTable($model->noticeTable())
            ->setDefaultOrder('username', 'DESC')
            ->setSearch(['username', 'email', 'company_name', 'contact'])
            ->setOrder(['username', 'email', 'company_name'])
            ->setOutput([
                'username', 'email', 'company_name', 'contact', 
                function($row)
                {
                    $buttonInfo = '<button type="button" class="btn btn-info" data-toggle="modal" data-target="#companyInfoModal" data-company-id="'.$row["id"].'"><i class="fas fa-info-circle"></i> Info</button>';
                    $buttonDel = '<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteConfirmModal" data-company-id="'.$row["id"].'" data-username="'.$row["username"].'"><i class="fas fa-trash"></i> Delete</button>';
                    return  $buttonInfo.' '.$buttonDel;
                }
            ]);

        return $table->getDatatable();
    }
}
