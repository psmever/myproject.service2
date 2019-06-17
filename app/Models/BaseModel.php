<?php namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\Database\Query;

class BaseModelQuerySuccessException extends \Exception {}
class BaseModelQueryErrorSuccessException extends \Exception {}

class BaseModel extends Model
{
	public $db;
	private $LOG_SEQ;
	
	public function __construct()
	{
		parent::__construct();
		
		$this->LOG_SEQ = date('YmdHis');
	}
	
	public function __destruct ()
	{
		// TODO: Implement __destruct() method.
		
	}
	
	/**
	 * @param $exceptionError
	 *
	 * 모델에서 에러 났을떄
	 *
	 * 1차 -> 디비에저장
	 * 1차 실패시 로그 디렉토리에 파일로 저장.
	 */
	public function modelExceptionControl($exceptionError)
	{
		try
		{
			$pQuery = $this->db->prepare(function($db)
			{
				$sql = "
					INSERT INTO tbl_exception_log_master
					(log_seq, division, server_data, getmessage, getcode, getfile, getline, getprevious, gettrace, gettraceasstring, exception_data, log_date, regist_date)
					VALUES('".$this->LOG_SEQ."', '".SITE_DB_EXCEPTION_CODE."', ?, ?, ?, ?, ?, ?, ?, ?, ?, now(), now());
				";
				
				return (new Query($db))->setQuery($sql);
			});
			
			$pQuery->execute(
				json_encode ($_SERVER, JSON_FORCE_OBJECT),
				$exceptionError->getMessage(),
				$exceptionError->getCode(),
				$exceptionError->getFile(),
				$exceptionError->getLine(),
				$exceptionError->getPrevious(),
				json_encode((array) $exceptionError->getTrace(), JSON_FORCE_OBJECT),
				$exceptionError->getTraceAsString(),
				json_encode((array) $exceptionError, JSON_FORCE_OBJECT)
			);
			
			$pQuery->close();
		}
		catch (\Exception $e)
		{
			log_message('critical', SITE_ERROR_NAME.'[***]'.SITE_DB_EXCEPTION_CODE.'[***]{logid}[***]{logtime}[***]{SERVER}[***]{getMessage}[***]{exception}', [
					'logid' => $this->LOG_SEQ,
					'logtime' => date('Y-m-d H:i:s'),
					'getMessage' => json_encode($e->getMessage(), true),
					'exception' => json_encode((array)$e, true),
					'SERVER' => json_encode($_SERVER, true),
				]
			);
		}
	}
	
	/**
	 * @return array
	 * 모델에서 Exception 에러 났을떄 반환.
	 */
	public function setExceptionResult()
	{
		return [
			'status' => false,
			'message' => '데이터 베이스 에러가 발생 했습니다.',
		];
	}
	
	/**
	 * @return array
	 *
	 * 그냥 성공시 성공 반환
	 */
	public function setSuccessResult()
	{
		return [
			'status' => true,
			'message' => '성공 했습니다.',
		];
	}
	
	public function setResultControl($resultData = array())
	{
		$returnData = [];
		
		try {
			
			$resultCount = count($resultData);
			if($resultCount == 0)
			{
				throw new BaseModelQueryErrorSuccessException('success');
			}
			else
			{
				throw new BaseModelQuerySuccessException('success');
			}
		}
		catch ( BaseModelQuerySuccessException $e )
		{
			$returnData = [
				'status' => true,
				'message' => '성공 했습니다.',
				'count' => $resultCount,
				'data' => $resultData
			];
		}
		catch ( BaseModelQueryErrorSuccessException $e )
		{
			$returnData = [
				'status' => false,
				'message' => '데이터가 존재 하지 않습니다.',
				'count' => 0,
				'data' => []
			];
		}
		catch ( \Exception $e )
		{
			$returnData = [
				'status' => false,
				'message' => '에러가 발생 했습니다.',
				'count' => 0,
				'data' => []
			];
		}
		finally
		{
			return $returnData;
		}
	}
	
	

	
}