<?php namespace App\Controllers\Dev;

use App\Controllers\ServiceController;


class Test extends ServiceController
{
	
	public function index()
	{
	
	}
	
	public function user()
	{
		$master = new \App\Models\Api\MasterModel();
		$result = $master->getTestData();
		
		print_r($result);
	}
	
	
	public function getlog()
	{
		echo "<pre>".PHP_EOL;
		$logDir = WRITEPATH . 'logs' . '/' . CI_LOG_SUB_PATH;
		
		$fileName = 'log-'.date('Y-m-d').'.php';
		
		$logfilePullPath = $logDir.'/'.$fileName;
		
		$logContents = file_get_contents($logfilePullPath);
		
		$logExplode = explode(PHP_EOL, trim($logContents));
		
		
		
		
		unset($logExplode[0]);
		unset($logExplode[1]);
		
		$logExplode = array_values($logExplode);
		
		foreach ($logExplode as $eachData)
		{
			$step1_explode = explode('-->', $eachData);
			
			$logInfo = trim($step1_explode[0]);
			$logMessage = trim($step1_explode[1]);
			
			$arrayLogMessage = explode("[***]", $logMessage);
			
			$errorCheck = (isset($arrayLogMessage[0]) && $arrayLogMessage[0]) ? trim($arrayLogMessage[0]) : false;
			$log_division = (isset($arrayLogMessage[1]) && $arrayLogMessage[1]) ? trim($arrayLogMessage[1]) : false;
			$log_id = (isset($arrayLogMessage[2]) && $arrayLogMessage[2]) ? trim($arrayLogMessage[2]) : false;
			$log_date = (isset($arrayLogMessage[3]) && $arrayLogMessage[3]) ? trim($arrayLogMessage[3]) : false;
			$log_server_info = (isset($arrayLogMessage[4]) && $arrayLogMessage[4]) ? trim($arrayLogMessage[4]) : false;
			$log_server_message = (isset($arrayLogMessage[5]) && $arrayLogMessage[5]) ? trim($arrayLogMessage[5]) : false;
			$log_data = (isset($arrayLogMessage[6]) && $arrayLogMessage[6]) ? trim($arrayLogMessage[6]) : false;
			
			
			if($errorCheck && $errorCheck == SITE_ERROR_NAME)
			{
				print_r([
					'log_division' => $log_division,
					'log_id' => $log_id,
					'log_date' => $log_date,
					'log_server_info' => $log_server_info,
					'log_server_message' => $log_server_message,
					'log_data' => $log_data,
				]);
				print_r(json_decode($log_server_info, true));
				print_r(json_decode($log_data, true));
			}
			
			
			return;
		}
		echo "</pre>".PHP_EOL;
	}
	
	//--------------------------------------------------------------------
	
}