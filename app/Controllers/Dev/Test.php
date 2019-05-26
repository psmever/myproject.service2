<?php namespace App\Controllers\Dev;

use App\Controllers\ServiceController;

class Test extends ServiceController
{
	
	public function index()
	{
//		echo WRITEPATH . 'logs/';
		
		$log_contents = file_get_contents(WRITEPATH . 'logs/'.'log-2019-05-25.php');
		
		$arrayLog = explode(PHP_EOL, $log_contents);
		
		
		echo "<pre>";
		print_r($arrayLog);
		
		
		$str = $arrayLog[30];
		
		echo $str;
		echo "</pre>";
	}
	
	//--------------------------------------------------------------------
	
}