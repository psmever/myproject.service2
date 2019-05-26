<?php namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\Query;

class BaseModel extends Model
{
	public $db;
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function modelErrorProcess($e)
	{
		
		try {
			$pQuery = $this->db->prepare(function($db)
			{
				$sql = "INSERT INTO1 tbl_error_log_master (log_message, log_code, log_data, server_data, regist_date) VALUES (?, ?, ?, ?, now())";
				
				return (new Query($db))->setQuery($sql);
			});
			
			$results = $pQuery->execute($e->getMessage(), $e->getCode(), json_encode ((array) $e, JSON_FORCE_OBJECT), json_encode ($_SERVER, JSON_FORCE_OBJECT));
		}
		catch (\Exception $e)
		{
			echo json_encode([
				$e->getMessage(),
				(array)$e,
				$_SERVER
			]);
//			log_message('ERROR', json_encode ($logMessage, JSON_FORCE_OBJECT));
//			$jbstr = implode( '/', $logMessage );
			
			log_message('critical', '[Site_error] {exception}', ['exception' => json_encode([
				$e->getMessage(),
				(array)$e,
				$_SERVER
			], true)]);
			
			
		}
		
		
		

	}
	
	
	
	public function returnModelDBError($params = array())
	{
		return [
			'status' => false,
			'dberror' => $params['message']
		];
	}
	
	public function returnModelDBSuccess($params = array())
	{
		return [
			'status' =>true,
		];
	}
	
	public function returnModelData($params = array())
	{
		$resultCount = count($params);
		
		if($resultCount === 0)
		{
			return [
				'status' => true,
				'result' => false,
				'count' => 0,
				'data' => []
			];
		}
		else if ($resultCount === 1)
		{
			$returnData = array();
			foreach ($params[0] as $itemKey => $item)
			{
				$returnData[$itemKey] = $item;
			}
			return [
				'status' => true,
				'result' => true,
				'count' => 1,
				'data' => $returnData
			];
		}
		else if ($resultCount > 1 )
		{
			return [
				'status' => true,
				'result' => true,
				'count' => $resultCount,
				'data' => $params
			];
		}
		else
		{
			log_message('error', 'setModelReturnData : '.json_encode($params));
			
		}
	}
	
	
	public function returnModelData2($params = array())
	{
		$resultCount = count($params);
		
		if($resultCount === 0)
		{
			return [
				'status' => true,
				'result' => false,
				'count' => 0,
				'data' => []
			];
		}
		else if($resultCount > 0)
		{
			return [
				'status' => true,
				'result' => true,
				'count' => $resultCount,
				'data' => $params
			];
		}
		else
		{
			log_message('error', 'setModelReturnData : '.json_encode($params));
			
		}
	}
	
	public function returnModeDataNumRowType($params = 0)
	{
		if($params === 0)
		{
			return [
				'status' => false,
				'count' => 0,
			];
		}
		else if ($params > 0)
		{
			return [
				'status' => true,
				'count' => $params,
			];
		}
		else
		{
			log_message('error', 'setModelReturnData : '.json_encode($params));
			
		}
	}
	
}