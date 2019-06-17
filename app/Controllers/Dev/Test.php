<?php namespace App\Controllers\Dev;

use App\Controllers\ServiceController;
use App\Models\Api\MasterModel;

class Test extends ServiceController
{
	
	public function index()
	{
	
	}
	
	public function user()
	{
		$master = new MasterModel();
		$result = $master->getTestData();
		
		print_r($result);
		
		// REST API 세팅 해야함.
	}
	
	public function master_model_test()
	{
		$MasterModel = new MasterModel();
		
		$result = $MasterModel->emptyAllTable();
		
		print_r($result);
		
		
		
		
	}
	
	/**
	 *
	 * 당일 로그...
	 */
	public function gettodaylog()
	{
		echo "<pre>".PHP_EOL;
		try
		{
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
		}
		catch (\Exception $e)
		{
			print_r($e->getMessage());
		
		}
		finally
		{
			echo "</pre>".PHP_EOL;
		}
		
		
		
	}
	
	//--------------------------------------------------------------------
	
}