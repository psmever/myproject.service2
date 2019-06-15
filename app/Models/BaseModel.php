<?php namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\Query;

class BaseModel extends Model
{
	public $db;
	
	public function __construct()
	{
		parent::__construct();
		
//		print_r($this->db);
	}
	
	public function __destruct ()
	{
		// TODO: Implement __destruct() method.
		
//		echo __FUNCTION__;
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
	
	public function getResultControl($builder)
	{
		print_r( $builder->get()->getResultArray());
		
//		$result = $builder->getResultArray();
//		$builderCount = $builder->countAll();
//
//		print_r($builderCount);
//		print_r($result);
		
//		if($builderCount == 1)
//		{
//			echo "1";
//			return [
//				'state' => true,
//				'data' => $result
//			];
//		}
//		else if($builderCount > 1)
//		{
//			echo ">1";
//
//		}
//		else if($builderCount == 0)
//		{
//			echo "0";
//
//		}
//		$getResult = $params->getResultArray();
		
//		print_r($params->countAllResults());
	
	}
	
	

	
}