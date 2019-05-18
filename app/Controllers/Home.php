<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;

class Home extends BaseController
{
	public function index()
	{
		return view('welcome_message');
	}
	
	public function test()
	{
		echo "<pre>";
		echo 'APP_NAMESPACE: '.APP_NAMESPACE.PHP_EOL;
		echo 'ROOTPATH: '.ROOTPATH.PHP_EOL;
		
		
		echo "</pre>";
	}

	//--------------------------------------------------------------------

}
