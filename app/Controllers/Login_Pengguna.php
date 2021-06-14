<?php
namespace App\Controllers;;
use App\Models\Model_Login;
class Login_Pengguna extends BaseController
{
	public function index()
	{
		$data = array(
			'title' => 'login',
			'login' => 'login\v_login'
		);
		return view('layout_login/v_wraper',$data);
	}
    
}