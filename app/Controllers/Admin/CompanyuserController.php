<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\User;
use monken\TablesIgniter;
use Config\Database;

class CompanyuserController extends BaseController
{
    public function index()
    {
        return view('admin/company', [
            'title' => 'Pengguna Perusahaan'
        ]);
    }

    public function showVerifyPage()
    {
        return view('admin/verify_company', [
            'title' => 'Verifikasi Perusahaan'
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
                    $buttonInfo = '<button type="button" class="btn btn-info" data-toggle="modal" data-target="#companyInfoModal" data-company-id="'.$row["id"].'"><i class="fas fa-info-circle"></i></button>';
                    $buttonDel = '<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteConfirmModal" data-company-id="'.$row["id"].'" data-name="'.$row["name"].'"><i class="fas fa-trash"></i></button>';
                    return  $buttonInfo.' '.$buttonDel;
                }
            ]);

        return $table->getDatatable();
    }

    public function ajaxFetchUnverified()
    {
        $model = new User();
        $table = new TablesIgniter();

        $table->setTable(
                $model->noticeTable()
                    ->where('type', 'company')
                    ->where('status', 'unverified')
            )
            ->setDefaultOrder('name', 'DESC')
            ->setSearch(['name', 'email'])
            ->setOrder(['name', 'email'])
            ->setOutput([
                'name', 'email',
                function($row) { return '<a href="'.base_url().route_to('admin.company.downVerDoc', $row['id']).'" class="btn btn-info"><i class="fas fa-download"></i> Download</a>'; },
                function($row) { return '<button class="btn btn-info" data-toggle="modal" data-target="#verifyCompanyModal" data-id="'.$row["id"].'" data-name="'.$row["name"].'"><i class="fas fa-clipboard-check"></i> Verifikasi</button>'; }
            ]);

        return $table->getDatatable();
    }

    public function downloadVerificationDoc($id)
    {
        $db = Database::connect();
        $doc = $db->table('company_verification_doc')
            ->where('company_user_id', $id)
            ->get()
            ->getResultArray()[0]['document'];

        // dd($this->response);
        return $this->response->download(ROOTPATH.'storage/document/'.$doc, null);
    }

    public function verifyCompany($id)
    {
        $status = $this->request->getPost('status');
        $res = null;

        switch ($status) {
            case 'accept':
                $res = User::ins()->update($id, [ 'status' => 'verified' ]);
                break;
            case 'denied':
                $res = User::ins()->update($id, [ 'status' => 'denied' ]);
                break;
            default:
                break;
        }

        return json_encode([
            'status' => $res ? 'success' : 'error'
        ]);
    }
}
