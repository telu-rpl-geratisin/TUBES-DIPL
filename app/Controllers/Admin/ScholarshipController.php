<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Scholarship;
use monken\TablesIgniter;
use Config\Database;

class ScholarshipController extends BaseController
{
	public function index()
    {
        // $model = new Scholarship();
        // dd($model->noticeTable()->get()->getResultArray());
        return view('admin/scholarship', [
            'title' => 'List Beasiswa'
        ]);
    }

    public function showVerifyPage()
    {
        return view('admin/verify_scholarship', [
            'title' => 'Verifikasi Beasiswa'
        ]);
    }

    public function ajaxFetchAll()
    {
        $model = new Scholarship();
        $table = new TablesIgniter();

        $buttonInfo = "";
        $buttonDel = "";

        $table->setTable($model->noticeTable())
            ->setDefaultOrder('name', 'DESC')
            ->setSearch(['name', 'user_name', 'end_date', 'rating'])
            ->setOrder(['name', 'user_name', 'end_date', 'rating', 'status'])
            ->setOutput([
                'name', 'user_name', 'end_date',
                function($row) { return number_format((float)$row['rating'], 2, '.', ''); },
                function($row) { return '<a href="'.$row['link'].'" target="_blank">'.$row['link'].'</a>'; },
                function($row) {
                    $badge = '';
                    switch ($row['status']) {
                        case 'unverified':
                            $badge = '<span class="badge badge-secondary">Belum<br>Terverifikasi</span>';
                            break;
                        case 'verified':
                            $badge = '<span class="badge badge-success">Terverifikasi</span>';
                            break;
                        case 'denied':
                            $badge = '<span class="badge badge-danger">Verifikasi<br>Ditolak</span>';
                            break;
                        default:
                            break;
                    }
                    return $badge;
                },
                function($row)
                {
                    $buttonInfo = '<button type="button" class="btn btn-info" data-toggle="modal" data-target="#scholarshipInfoModal" data-scholarship-id="'.$row['id'].'"><i class="fas fa-info-circle"></i></button>';
                    $buttonDel = '<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteConfirmModal" data-scholarship-id="'.$row['id'].'" data-name="'.$row["name"].'"><i class="fas fa-trash"></i></button>';
                    return  $buttonInfo.' '.$buttonDel;
                }
            ]);

        return $table->getDatatable();
    }

    public function ajaxFetchUnverified()
    {
        $model = new Scholarship();
        $table = new TablesIgniter();

        $table->setTable(
                $model->noticeTable()
                    ->where('scholarship.status', 'unverified')
            )
            ->setDefaultOrder('name', 'DESC')
            ->setSearch(['name', 'user_name'])
            ->setOrder(['name', 'user_name'])
            ->setOutput([
                'name', 'user_name',
                function($row) { return '<a href="'.base_url().route_to('admin.scholarship.downVerDoc', $row['id']).'" class="btn btn-info"><i class="fas fa-download"></i> Download</a>'; },
                function($row) { return '<button class="btn btn-info" data-toggle="modal" data-target="#verifyScholarshipModal" data-id="'.$row["id"].'" data-name="'.$row["name"].'"><i class="fas fa-clipboard-check"></i> Verifikasi</button>'; }
            ]);

        return $table->getDatatable();
    }

    public function downloadVerificationDoc($id)
    {
        $db = Database::connect();
        $doc = $db->table('scholarship_verification_doc')
            ->where('scholarship_id', $id)
            ->get()
            ->getResultArray()[0]['document'];

        // dd($this->response);
        return $this->response->download(ROOTPATH.'storage/document/'.$doc, null);
    }

    public function verifyScholarship($id)
    {
        $status = $this->request->getPost('status');
        $res = null;

        switch ($status) {
            case 'accept':
                $res = Scholarship::ins()->update($id, [ 'status' => 'verified' ]);
                break;
            case 'denied':
                $res = Scholarship::ins()->update($id, [ 'status' => 'denied' ]);
                break;
            default:
                break;
        }

        return json_encode([
            'status' => $res ? 'success' : 'error'
        ]);
    }
}
