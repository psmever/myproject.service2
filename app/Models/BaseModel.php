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
	
	public function modelExceptionControl($e)
	{
		
		try
		{

			$pQuery = $this->db->prepare(function($db)
			{
				$sql = "
					INSERT INTO tbl_log_master
					(division, server_data, log_message, log_code, log_data, log_date, regist_date)
					VALUES(".SITE_DB_EXCEPTION_CODE.", ?, ?, ?, ?, now(), now());
				";
				
				return (new Query($db))->setQuery($sql);
			});
			
			$pQuery->execute(json_encode ($_SERVER, JSON_FORCE_OBJECT), $e->getMessage(), $e->getCode(), json_encode ((array) $e, JSON_FORCE_OBJECT));
			
			$pQuery->close();
		}
		catch (\Exception $e)
		{
			$logInitId = date('YmdHis');
			
			log_message('critical', SITE_ERROR_NAME.'[***]'.SITE_DB_EXCEPTION_CODE.'[***]{logid}[***]{logtime}[***]{SERVER}[***]{getMessage}[***]{exception}', [
					'logid' => $logInitId,
					'logtime' => date('Y-m-d H:i:s'),
					'getMessage' => json_encode($e->getMessage(), true),
					'exception' => json_encode((array)$e, true),
					'SERVER' => json_encode($_SERVER, true),
				]
			);
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