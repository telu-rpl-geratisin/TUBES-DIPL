<?php

namespace App\Controllers\Company;

use App\Controllers\BaseController;
use App\Models\User;
use Config\Database;

class CompanyController extends BaseController
{
	public function showVerifyCompany($id)
	{
		$company_name = User::ins()->find($id)['name'];
		$company_id = User::ins()->find($id)['id'];
		// dd($scholarship);

		return view('company/verify_company', [
			'title' => 'Verifikasi Perusahaan',
			'page_id' => 'verify_scholarship',
			'company_name' => $company_name,
			'company_id' => $company_id
		]);
	}

	public function verifyCompany($id)
	{
		$company = User::ins()->find($id);
		$document = $this->request->getFile('document');

		if($document->getFileName() != '') {
			$name = str_replace(" ", "_", $company['name']);
			$name = strtolower($name);
			$new_name = $name.'_verification_'.random_string('numeric', 16).'.'.$document->getExtension();
			$data['document'] = $new_name;
			$document->move(ROOTPATH.'/storage/document', $new_name);
		}

		// dd($data);

		// connect to db
		$db = Database::connect();

		$res = $db->table('company_verification_doc')
			->insert([
				'company_user_id' => $id,
				'document' => $data['document']
			]);

		// dd($res->resultID);

		if($res->resultID) {
			$this->session->setFlashdata('msg', 'Anda telah sukses mengajukan verifikasi perusahaan.');
		}else{
			$this->session->setFlashdata('data_error', $scholarship->errors());
        	return redirect()->back()->withInput();
		}

		return redirect()->back();
	}

	public function showVerificationHelp()
	{
		$company_id = User::ins()->where('username', $this->session->get('username'))->first()['id'];
		// dd($company_id);
		return view('company/company_verification_help',[
			'title' => 'Informasi Verifikasi Perusahaan',
			'page_id' => 'verify_company',
			'company_id' => $company_id
		]);
	}
}
