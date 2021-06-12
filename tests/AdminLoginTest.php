<?php

use \PHPUnit\Framework\TestCase;
use \App\Controllers\Admin\LoginController as AdminLoginController;

class AdminLoginTest extends TestCase {
	public function testValidInput()
	{
		$adminLogin = new AdminLoginController;

		$result = $adminLogin->VerifyUser('admin', 'password');

		$this->assertEquals('success', $result['status']);
	}

	public function testInvalidInput()
	{
		$adminLogin = new AdminLoginController;

		$result = $adminLogin->VerifyUser('', '');

		$this->assertEquals('failed', $result['status']);
	}

	public function testInvalidUsername()
	{
		$adminLogin = new AdminLoginController;

		$result = $adminLogin->VerifyUser('budi', 'password');

		$this->assertEquals('failed', $result['status']);
	}

	public function testInvalidPassword()
	{
		$adminLogin = new AdminLoginController;

		$result = $adminLogin->VerifyUser('admin', '123456');

		$this->assertEquals('failed', $result['status']);
	}
}