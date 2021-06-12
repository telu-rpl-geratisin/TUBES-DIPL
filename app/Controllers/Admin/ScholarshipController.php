<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Scholarship;
use monken\TablesIgniter;

class ScholarshipController extends BaseController
{
	public function index()
    {
        return view('admin/scholarship', [
            'title' => 'Beasiswa'
        ]);
    }

    public function ajaxFetchAll()
    {
        $model = new Scholarship();
        $table = new TablesIgniter();

        $table->setTable($model->noticeTable())
            ->setDefaultOrder('name', 'DESC')
            ->setSearch(['name', 'end_date', 'rating'])
            ->setOrder(['name', 'end_date', 'rating',null, 'is_verified', null])
            ->setOutput([
                'name', 'user_name', 'end_date', 'rating',
                function($row) { return '<a href="'.$row['link'].'" target="_blank">'.$row['link'].'</a>'; },
                function($row) {
                    return ($row['is_verified'] === 'Y') ? '<span class="badge badge-success">Terverifikasi</span>' : '<span class="badge badge-danger">Belum<br>Terverifikasi</span>';
                },
                function($row)
                {
                    $buttonInfo = '<button type="button" class="btn btn-info" data-toggle="modal" data-target="#scholarshipInfoModal" data-scholarship-id="'.$row["id"].'"><i class="fas fa-info-circle"></i></button>';
                    $buttonDel = '<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteConfirmModal" data-scholarship-id="'.$row["id"].'" data-name="'.$row["name"].'"><i class="fas fa-trash"></i></button>';
                    return  $buttonInfo.' '.$buttonDel;
                }
            ]);

        return $table->getDatatable();
    }
}
