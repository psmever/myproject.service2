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
//		echo 'APP_NAMESPACE: '.APP_NAMESPACE.PHP_EOL;
//		echo 'ROOTPATH: '.ROOTPATH.PHP_EOL;
//		echo 'ROOTPATH: '.ROOTPATH.PHP_EOL;
//		echo base_url().PHP_EOL;
//		print_r($_ENV);

//		echo $this->sessionDriver;

//		echo APP_BASE_URL;
//		echo APP_BASE_URI;
//		echo APP_DOCUMENT_ROOT;
		
		echo base_url(),PHP_EOL;
		
		print_r($_SERVER);
		echo "</pre>";
	}

	//--------------------------------------------------------------------

}
