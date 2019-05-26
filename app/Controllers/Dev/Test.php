<?php namespace App\Controllers\Dev;

use App\Controllers\ServiceController;

class Test extends ServiceController
{
	
	public function index()
	{
		
		echo ENVIRONMENT;
		
//		$a = file_get_contents("./log.txt");
//
//		print_r(json_decode(html_entity_decode($a)));
	}
	
	public function getlog()
	{
		$logDir = WRITEPATH . 'logs' . '/' . CI_LOG_SUB_PATH;
		
		$fileName = 'log-'.date('Y-m-d').'.php';
		
		$logfilePullPath = $logDir.'/'.$fileName;
		
		$logContents = file_get_contents($logfilePullPath);
		
		$logExplode = explode(PHP_EOL, $logContents);
		
		
		
		unset($logExplode[0]);
		unset($logExplode[1]);
		
		$logExplode = array_values($logExplode);
		
		
		
		foreach ($logExplode as $eachData)
		{
			$step1_explode = explode('-->', $eachData);
			
			print_r($step1_explode);
			
			
			
			return;
		}
		
	}
	
	//--------------------------------------------------------------------
	
}