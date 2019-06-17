<?php namespace App\Models\Api;

use App\Models\BaseModel;


class MasterModel extends BaseModel
{
	public function __construct()
	{
		parent::__construct();
	}
	
	/**
	 * @return array
	 *
	 * test function...
	 */
	public function getTestData()
	{
		try {
			$builder = $this->db->table('tbl_photofriend_data');
			$builder->select('*');
			$builder->where('idx', '20');
			$query = $builder->get();
			$queryResult = $this::setResultControl($query->getResultArray());
		} catch(\Exception $e) {
			BaseModel::modelExceptionControl($e);
			$queryResult = $this::setExceptionResult();
		} finally {
			return $queryResult;
		}
	}
	
	/**
	 * @return array
	 *
	 * 외래키 사용안함 설정.
	 */
	public function foreign_key_checks_false()
	{
		try {
			if($this->db->simpleQuery('SET FOREIGN_KEY_CHECKS = 0'))
			{
				$queryResult = $this::setSuccessResult();
			}
		} catch(\Exception $e) {
			BaseModel::modelExceptionControl($e);
			$queryResult = $this::setExceptionResult();
		} finally {
			return $queryResult;
		}
	}
	
	/**
	 * @return array
	 *
	 * 외래키 사용 설정.
	 */
	public function foreign_key_checks_true()
	{
		try {
			if($this->db->simpleQuery('SET FOREIGN_KEY_CHECKS = 1'))
			{
				$queryResult = $this::setSuccessResult();
			}
		} catch(\Exception $e) {
			BaseModel::modelExceptionControl($e);
			$queryResult = $this::setExceptionResult();
		} finally {
			return $queryResult;
		}
	}
	
	/**
	 * 테이블 초기화.
	 */
	public function emptyAllTable()
	{
		try
		{
			$this->db->simpleQuery('SET FOREIGN_KEY_CHECKS = 0');
		
//			$this->db->table('tbl_code_master')->truncate();
//			$this->db->table('tbl_user_login_log_master')->truncate();
//			$this->db->table('tbl_user_master')->truncate();
//			$this->db->table('tbl_user_profile_master')->truncate();
//			$this->db->table('tbl_user_email_auth_master')->truncate();
//			$this->db->table('tbl_user_post_file_master')->truncate();
//			$this->db->table('tbl_user_post_master')->truncate();
//			$this->db->table('tbl_user_regist_ip_log_master')->truncate();
//			$this->db->table('tbl_user_token_master')->truncate();
//			$this->db->table('tbl_user_upload_log_master')->truncate();
//			$this->db->table('tbl_user_post_comment_master')->truncate();
//			$this->db->table('tbl_user_post_like_list_master')->truncate();
//			$this->db->table('tbl_exception_log_master')->truncate();
			
			$this->db->simpleQuery('SET FOREIGN_KEY_CHECKS = 1');
			
			$queryResult = $this::setSuccessResult();
		}
		catch(\Exception $e)
		{
//			print_r($e);
			BaseModel::modelExceptionControl($e);
			$queryResult = $this::setExceptionResult();
		}
		finally
		{
			return $queryResult;
		}
	}
	
	// 회원 가입시 ip 로그
	public function insertRegisterIpLog($params = array())
	{
	
	}
	
	
	
	
}