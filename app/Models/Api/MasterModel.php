<?php namespace App\Models\Api;

use App\Models\BaseModel;
use SebastianBergmann\CodeCoverage\Report\PHP;

class MasterModel extends BaseModel
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function foreign_key_checks_false()
	{
		if ($this->db->simple_query('SET FOREIGN_KEY_CHECKS = 0'))
		{
			return true;
		}
		else
		{
			return $this->returnModelDBError($this->db->error());
		}
		
	}
	
	public function foreign_key_checks_true()
	{
		if ($this->db->simple_query('SET FOREIGN_KEY_CHECKS = 1'))
		{
			return true;
		}
		else
		{
			return $this->returnModelDBError($this->db->error());
		}
		
	}
	
	public function emptyAllTable()
	{
		$this->db->simple_query('SET FOREIGN_KEY_CHECKS = 0');
		
		$this->db->truncate('tbl_code_master');
		$this->db->truncate('tbl_user_login_log_master');
//		$this->db->truncate('tbl_user_master');
//		$this->db->truncate('tbl_user_profile_master');
//	    $this->db->truncate('tbl_user_email_auth_master');
		$this->db->truncate('tbl_user_post_file_master');
		$this->db->truncate('tbl_user_post_master');
		$this->db->truncate('tbl_user_regist_ip_log_master');
		$this->db->truncate('tbl_user_token_master');
		$this->db->truncate('tbl_user_upload_log_master');
		$this->db->truncate('tbl_user_post_comment_master');
		$this->db->truncate('tbl_user_post_like_list_master');
		
		
		$this->db->simple_query('SET FOREIGN_KEY_CHECKS = 1');
	}
	
	// Model function Example
	public function getExample()
	{
//		$builder = $this->db->table('tbl_user_profile_master');
//
//		$builder->select('*');
//		$query = $builder->get();  // Produces: SELECT title, content, date FROM mytable
//
//		print_r($query->getResultArray());
		
//		$sql = $builder->select(array('field1','field2'))
//			->where('field3',5)
//			->getCompiledSelect(false);
		

//		print_r($this->db->protectIdentifiers('tbl_user_master'));
		
//				$builder = $this->db->table('tbl_user_master');
//		$builder->resetQuery();
//		$builder->select('*');
//		$builder->where('user_uid', '9edb34ed6fdb4edbeec5');

//			$builder->select('*')->from('tbl_user_master')->get();
//
//
//		$queryResult = $this->db->get_where('tbl_user_master', array('user_uid' => '9edb34ed6fdb4edbeec5'));
		
//		$builder = $this->db;
//			$builder->select('*')->from('tbl_user_master')
//				->groupStart()
//				->where('a', 'a')
//				->orGroupStart()
//				->where('b', 'b')
//				->where('c', 'c')
//				->groupEnd()
//				->groupEnd()
//				->where('d', 'd')
//				->get();
		
//		$builder = $this->db->table('tbl_user_master')->select('*')->get()->getResultArray();
//		print_r($builder);
		
//		$builder = $this->db->table('tbl_user_master');
		
//		try
//		{
			
//			$builder = $this->db->table('tbl_user_master');
//			$builder->where('user_uid', '9edb34ed6fdb4edbeec5');
//
//			$builder->select('*');
			
//			$builder->get();
			
//			echo "1: ".$builder->countAll();  // Produces an integer, like 25
//			echo PHP_EOL;
//			$builder->like('user_uid', '9edb34ed6fdb4edbeec5');
//			echo PHP_EOL;
//			echo "2: ".$builder->countAllResults(); // Produces an integer, like 17
			
//
//			$builder->select('*')->from('tbl_user_master')
//				->groupStart()
//				->where('a', 'a')
//				->orGroupStart()
//				->where('b', 'b')
//				->where('c', 'c')
//				->groupEnd()
//				->groupEnd()
//				->where('d', 'd')
//				->get();
			
//			$builder->select('*')->from('tbl_user_master')
//				->where('user_uid', '9edb34ed6fdb4edbeec5')
//				->get();
			
			
//			$builder->select('*')->from('my_table')
//				->groupStart()
//				->where('a', 'a')
//				->orGroupStart()
//				->where('b', 'b')
//				->where('c', 'c')
//				->groupEnd()
//				->groupEnd()
//				->where('d', 'd')
//				->get();
			
//			$builder->get();
			
//			echo $builder->countAll();
			
//			return BaseModel::getResultControl($builder);
			
//		}
//		catch (\Exception $e)
//		{
//			print_r($e->getMessage());
//			BaseModel::modelExceptionControl($e);
//		}
		
	}
	
	// test function
	public function getTestData()
	{
		try {
			
			$builder = $this->db->table('tbl_user_profile_master');
			$builder->select('*');
			$builder->where('user_uid', '6a5de6d144bd6f7f2575');
			$query   = $builder->get();
			
			
//			print_r($builder->countAll(false));
//			print_r($builder->countAllResults(false));
			
			print_r($builder->num_rows);
			
//			$query = $builder->getWhere(
//								['user_uid' => '6a5de6d144bd6f7f2575'
//								], 1, 0);
//			print_r($query->getResultArray());
//			print_r($query->countAllResults());
//			print_r($query->countAllResults());
//			print_r($query->countAll());
//			print_r($builder->countAllResults());
//			print_r($builder->countAll());
			
//			throw new \Exception($query->getResultArray());
			
		} catch(\Exception $e) {
			
//			echo 'catch : '.$e->getMessage().PHP_EOL;
			
//			throw $e;
			
		} finally {
			
//			echo "finally".PHP_EOL;
			
//			echo $e->getMessage()." finally \n";
			
//			throw new \Exception("Bye");
		}

	}
	
	// 회원 가입시 ip 로그
	public function insertRegisterIpLog($params = array())
	{
		if( isset($params['regist_date']) && $params['regist_date'] )
		{
			$this->db->set('regist_date', $params['regist_date']);
		}
		else
		{
			$this->db->set('regist_date', 'NOW()', FALSE);
		}
		
		if ($this->db->insert('tbl_user_regist_ip_log_master', $params))
		{
			return $this->returnModelData(array(
					[
						'user_id' => $this->db->insert_id()
					]
				)
			);
		}
		else
		{
			return $this->returnModelDBError($this->db->error());
		}
	}
	
	// 로그인 로그
	public function insertUserLoginLog($params = array())
	{
		if( isset($params['regist_date']) && $params['regist_date'] )
		{
			$this->db->set('regist_date', $params['regist_date']);
		}
		else
		{
			$this->db->set('regist_date', 'NOW()', FALSE);
		}
		
		if ($this->db->insert('tbl_user_login_log_master', $params))
		{
			return $this->returnModelData(array(
					[
						'user_id' => $this->db->insert_id()
					]
				)
			);
		}
		else
		{
			return $this->returnModelDBError($this->db->error());
		}
	}
	
	// 사용자 업로드 로그
	public function insertUserUploadLog($params = array())
	{
		if( isset($params['regist_date']) && $params['regist_date'] )
		{
			$this->db->set('regist_date', $params['regist_date']);
		}
		else
		{
			$this->db->set('regist_date', 'NOW()', FALSE);
		}
		
		if ($this->db->insert('tbl_user_upload_log_master', $params))
		{
			return $this->returnModelData(array(
					[
						'insert_idx' => $this->db->insert_id()
					]
				)
			);
		}
		else
		{
			return $this->returnModelDBError($this->db->error());
		}
	}
	
	/*
	 * upload info select
	 * */
	public function getUserUploadLogInfo($params = array())
	{
		$idx = (isset($params['idx'])) ? $params['idx'] : '';
		
		$this->db->select('*');
		$this->db->from('tbl_user_upload_log_master');
		$this->db->where('idx', $idx);
		$getResult = $this->db->get();
		$db_error = $this->db->error();
		
		if($db_error['code'])
		{
			return $this->returnModelDBError($this->db->error());
		}
		else
		{
			return $this->returnModelData($getResult->result_array());
		}
		
	}
	
	// 사용자 기본 정보
	public function getUserBasicInfo($params = array())
	{
		$user_uid = (isset($params['user_uid'])) ? $params['user_uid'] : '';
		
		$this->db->select('tbl_user_master.user_uid');
		$this->db->select('tbl_user_master.user_name');
		$this->db->select('tbl_user_profile_master.user_gender');
		$this->db->select('tbl_user_profile_master.user_web_site');
		$this->db->select('tbl_user_profile_master.user_intro');
		$this->db->select('tbl_user_profile_master.user_birthday');
		$this->db->from('tbl_user_master');
		$this->db->join('tbl_user_profile_master', 'tbl_user_master.user_uid = tbl_user_profile_master.user_uid');
		$this->db->where('tbl_user_master.user_uid', $user_uid);
		$getResult = $this->db->get();
		$db_error = $this->db->error();
		
		if($db_error['code'])
		{
			return $this->returnModelDBError($this->db->error());
		}
		else
		{
			return $this->returnModelData($getResult->result_array());
		}
	}
	
	// 사용자 프로필 정보
	public function getUserProfileInfo($params = array())
	{
		$user_uid = (isset($params['user_uid'])) ? $params['user_uid'] : '';
		
		$this->db->select('tbl_user_master.user_uid');
		$this->db->select('tbl_user_master.user_name');
		$this->db->select('tbl_user_master.user_image_name');
		$this->db->select('tbl_user_profile_master.user_birthday');
		$this->db->select('tbl_user_profile_master.user_gender');
		$this->db->select('FUNCTION_CODENAME(tbl_user_profile_master.user_gender) as user_gender_name');
		$this->db->select('tbl_user_profile_master.user_birthday');
		$this->db->select('tbl_user_profile_master.user_web_site');
		$this->db->select('tbl_user_profile_master.regist_date');
		$this->db->select('tbl_user_master.user_email');
		$this->db->select('tbl_user_profile_master.user_phone_number');
		$this->db->select('tbl_user_profile_master.user_address');
		$this->db->select('tbl_user_profile_master.user_intro');
		$this->db->select('tbl_user_profile_master.user_intro');
		$this->db->from('tbl_user_master');
		$this->db->join('tbl_user_profile_master', 'tbl_user_master.user_uid = tbl_user_profile_master.user_uid');
		$this->db->where('tbl_user_master.user_uid', $user_uid);
		$getResult = $this->db->get();
		$db_error = $this->db->error();
		
		if($db_error['code'])
		{
			return $this->returnModelDBError($this->db->error());
		}
		else
		{
			return $this->returnModelData($getResult->result_array());
		}
	}
	
	public function getUserLastLoginDate($params = array())
	{
		$user_uid = (isset($params['user_uid'])) ? trim($params['user_uid']) : '';
		$client_type = (isset($params['client_type'])) ? trim($params['client_type']) : '';
		
		// $this->db->select('DATE_FORMAT(regist_date, \'%Y. %m.%d\') as regist_date');
		$this->db->select('regist_date');
		$this->db->order_by('regist_date', 'DESC');
		$this->db->limit(1);
		$getResult = $this->db->get_where('tbl_user_login_log_master', array(
			'user_uid' => $user_uid,
			'client_type' => $client_type,
		));
		$db_error = $this->db->error();
		
		if($db_error['code'])
		{
			return $this->returnModelDBError($this->db->error());
		}
		else
		{
			return $this->returnModelData($getResult->result_array());
		}
		
	}
	
	
	// 사용자 파일 업로드
	public function insertUserPostFileMaster($params = array())
	{
		if( isset($params['regist_date']) && $params['regist_date'] )
		{
			$this->db->set('regist_date', $params['regist_date']);
		}
		else
		{
			$this->db->set('regist_date', 'NOW()', FALSE);
		}
		
		if ($this->db->insert('tbl_user_post_file_master', $params))
		{
			return $this->returnModelData(array(
					[
						'insert_idx' => $this->db->insert_id()
					]
				)
			);
		}
		else
		{
			return $this->returnModelDBError($this->db->error());
		}
	}
	
	/**
	 * @return mixed
	 *
	 * 전체 포스트 리스트
	 */
	public function getTotalContentsList()
	{
		$this->db->select('tbl_user_post_master.idx');
		$this->db->select('tbl_user_master.user_name');
		$this->db->select('tbl_user_master.user_image_name');
		$this->db->select('tbl_user_post_master.post_uuid');
		$this->db->select('tbl_user_post_master.user_uid');
		$this->db->select('tbl_user_post_master.client_type');
		$this->db->select('tbl_user_post_master.private_type');
		$this->db->select('tbl_user_post_master.timeline_content');
		$this->db->select('tbl_user_post_master.like_count');
		$this->db->select('FUNCTION_GET_POST_LIKECOUNT(tbl_user_post_master.post_uuid) as post_like_count');
		$this->db->select('FUNCTION_GET_POST_COMMENTCOUNT(tbl_user_post_master.post_uuid) as post_comment_count');
		$this->db->select('tbl_user_post_master.share_count');
		$this->db->select('tbl_user_post_master.regist_date');
		$this->db->select('tbl_user_post_master.update_date');
		$this->db->select('UNIX_TIMESTAMP(tbl_user_post_master.regist_date) as regist_date_timestamp');
		$this->db->select('UNIX_TIMESTAMP(tbl_user_post_master.update_date) as update_date_timestamp');
		$this->db->select('post_file.file_path as upload_file_path');
		$this->db->select('post_file.post_image_filename as upload_post_filename');
		$this->db->from('tbl_user_master');
		$this->db->join('tbl_user_post_master', 'tbl_user_master.user_uid = tbl_user_post_master.user_uid', 'right outer');
		$this->db->join('(select * from tbl_user_post_file_master where file_code = \''.SITE_TIMELINE_UPLOAD_IMAGE_CODE.'\' ) as post_file', 'tbl_user_post_master.idx = post_file.division_idx', 'left outer');
		$this->db->limit(10);
		$this->db->order_by('tbl_user_post_master.idx', 'DESC');
		$getResult = $this->db->get();
		$db_error = $this->db->error();
		
		$this->db->last_query();
		
		if($db_error['code'])
		{
			
			return $this->returnModelDBError($this->db->error());
		}
		else
		{
			return $this->returnModelData2($getResult->result_array());
		}
	}
	
	
	/**
	 * @param array $params
	 * @return array
	 *
	 * 사용자 프로필 타임라인 리스트
	 */
	public function getUserProfileTimelineList($params = array())
	{
		$user_uid = (isset($params['user_uid'])) ? $params['user_uid'] : '';
		
		$this->db->select('tbl_user_post_master.idx');
		$this->db->select('tbl_user_master.user_name');
		$this->db->select('tbl_user_master.user_image_name');
		$this->db->select('tbl_user_post_master.post_uuid');
		$this->db->select('tbl_user_post_master.user_uid');
		$this->db->select('tbl_user_post_master.client_type');
		$this->db->select('tbl_user_post_master.private_type');
		$this->db->select('tbl_user_post_master.timeline_content');
		$this->db->select('tbl_user_post_master.like_count');
		$this->db->select('FUNCTION_GET_POST_LIKECOUNT(tbl_user_post_master.post_uuid) as post_like_count');
		$this->db->select('FUNCTION_GET_POST_COMMENTCOUNT(tbl_user_post_master.post_uuid) as post_comment_count');
		$this->db->select('tbl_user_post_master.share_count');
		$this->db->select('tbl_user_post_master.regist_date');
		$this->db->select('tbl_user_post_master.update_date');
		$this->db->select('UNIX_TIMESTAMP(tbl_user_post_master.regist_date) as regist_date_timestamp');
		$this->db->select('UNIX_TIMESTAMP(tbl_user_post_master.update_date) as update_date_timestamp');
		$this->db->select('post_file.file_path as upload_file_path');
		$this->db->select('post_file.post_image_filename as upload_post_filename');
		$this->db->from('tbl_user_master');
		$this->db->join('tbl_user_post_master', 'tbl_user_master.user_uid = tbl_user_post_master.user_uid', 'right outer');
		$this->db->join('(select * from tbl_user_post_file_master where file_code = \''.SITE_TIMELINE_UPLOAD_IMAGE_CODE.'\' ) as post_file', 'tbl_user_post_master.idx = post_file.division_idx', 'left outer');
		$this->db->where('tbl_user_master.user_uid', $user_uid);
		$this->db->order_by('tbl_user_post_master.idx', 'DESC');
		$getResult = $this->db->get();
		$db_error = $this->db->error();
		
		$this->db->last_query();
		
		if($db_error['code'])
		{
			
			return $this->returnModelDBError($this->db->error());
		}
		else
		{
			return $this->returnModelData2($getResult->result_array());
		}
	}
	
	
	/**
	 * @param array $params
	 * @return array
	 *
	 * 사용자 프로필 포토 리스트
	 */
	public function getUserProfilePhotosList($params = array())
	{
		$user_uid = (isset($params['user_uid'])) ? $params['user_uid'] : '';
		
		$this->db->select('tbl_user_post_master.idx');
		$this->db->select('tbl_user_master.user_name');
		$this->db->select('tbl_user_master.user_image_name');
		$this->db->select('tbl_user_post_master.post_uuid');
		$this->db->select('tbl_user_post_master.user_uid');
		$this->db->select('tbl_user_post_master.client_type');
		$this->db->select('tbl_user_post_master.private_type');
		$this->db->select('tbl_user_post_master.timeline_content');
		$this->db->select('tbl_user_post_master.like_count');
		$this->db->select('FUNCTION_GET_POST_LIKECOUNT(tbl_user_post_master.post_uuid) as post_like_count');
		$this->db->select('FUNCTION_GET_POST_COMMENTCOUNT(tbl_user_post_master.post_uuid) as post_comment_count');
		$this->db->select('tbl_user_post_master.share_count');
		$this->db->select('tbl_user_post_master.regist_date');
		$this->db->select('tbl_user_post_master.update_date');
		$this->db->select('UNIX_TIMESTAMP(tbl_user_post_master.regist_date) as regist_date_timestamp');
		$this->db->select('UNIX_TIMESTAMP(tbl_user_post_master.update_date) as update_date_timestamp');
		$this->db->select('post_file.file_path as upload_file_path');
		$this->db->select('post_file.post_image_filename as upload_post_filename');
		$this->db->select('post_file.thumb_image_filename as upload_post_thumb_filename');
		$this->db->from('tbl_user_master');
		$this->db->join('tbl_user_post_master', 'tbl_user_master.user_uid = tbl_user_post_master.user_uid', 'right outer');
		$this->db->join('(select * from tbl_user_post_file_master where file_code = \''.SITE_TIMELINE_UPLOAD_IMAGE_CODE.'\' ) as post_file', 'tbl_user_post_master.idx = post_file.division_idx', 'left outer');
		$this->db->where('tbl_user_post_master.post_division', SITE_TIMELINE_CONTENTS_TYPE_PHOTO);
		$this->db->where('tbl_user_master.user_uid', $user_uid);
		$this->db->order_by('tbl_user_post_master.idx', 'DESC');
		$getResult = $this->db->get();
		$db_error = $this->db->error();

//        $this->db->last_query();
		
		if($db_error['code'])
		{
			
			return $this->returnModelDBError($this->db->error());
		}
		else
		{
			return $this->returnModelData2($getResult->result_array());
		}
	}
	
	/**
	 * @param array $params
	 * @return mixed
	 *
	 * 포토 정보..
	 */
	public function getPhotoViewInfo($params = array())
	{
		$post_uuid = (isset($params['post_uuid'])) ? $params['post_uuid'] : '';
		
		if($post_uuid)
		{
			$this->db->select('tbl_user_post_master.idx');
			$this->db->select('tbl_user_master.user_name');
			$this->db->select('tbl_user_master.user_image_name');
			$this->db->select('tbl_user_post_master.post_uuid');
			$this->db->select('tbl_user_post_master.user_uid');
			$this->db->select('tbl_user_post_master.client_type');
			$this->db->select('tbl_user_post_master.private_type');
			$this->db->select('tbl_user_post_master.timeline_content');
			$this->db->select('tbl_user_post_master.like_count');
			$this->db->select('FUNCTION_GET_POST_LIKECOUNT(tbl_user_post_master.post_uuid) as post_like_count');
			$this->db->select('FUNCTION_GET_POST_COMMENTCOUNT(tbl_user_post_master.post_uuid) as post_comment_count');
			$this->db->select('tbl_user_post_master.share_count');
			$this->db->select('tbl_user_post_master.regist_date');
			$this->db->select('tbl_user_post_master.update_date');
			$this->db->select('UNIX_TIMESTAMP(tbl_user_post_master.regist_date) as regist_date_timestamp');
			$this->db->select('UNIX_TIMESTAMP(tbl_user_post_master.update_date) as update_date_timestamp');
			$this->db->select('post_file.file_path as upload_file_path');
			$this->db->select('post_file.post_image_filename as upload_post_filename');
			$this->db->select('post_file.thumb_image_filename as upload_post_thumb_filename');
			$this->db->from('tbl_user_post_master');
			$this->db->join('tbl_user_master', 'tbl_user_post_master.user_uid = tbl_user_master.user_uid', 'right outer');
			$this->db->join('(select * from tbl_user_post_file_master where file_code = \''.SITE_TIMELINE_UPLOAD_IMAGE_CODE.'\' ) as post_file', 'tbl_user_post_master.idx = post_file.division_idx', 'left outer');
			$this->db->where('tbl_user_post_master.post_uuid', $post_uuid);
			$this->db->order_by('tbl_user_post_master.idx', 'DESC');
			$getResult = $this->db->get();
			$db_error = $this->db->error();
			
			if($db_error['code'])
			{
				
				return $this->returnModelDBError($this->db->error());
			}
			else
			{
				return $this->returnModelData($getResult->result_array());
			}
		}
	}
	
	
	/**
	 * @param array $params
	 * @return mixed
	 *
	 * 타임 라인 라이크 버튼 클릭 리스트
	 */
	public function insertPostLikeButtonUserList($params = array())
	{
		if( isset($params['regist_date']) && $params['regist_date'] )
		{
			$this->db->set('regist_date', $params['regist_date']);
		}
		else
		{
			$this->db->set('regist_date', 'NOW()', FALSE);
		}
		
		if ($this->db->insert('tbl_user_post_like_list_master', $params))
		{
			return $this->returnModelData(array(
					[
						'insert_idx' => $this->db->insert_id()
					]
				)
			);
		}
		else
		{
			return $this->returnModelDBError($this->db->error());
		}
	}
	
	
	public function deletePostLikeButtonUserList($params = array())
	{
		$user_uid = (isset($params['user_uid'])) ? $params['user_uid'] : '';
		$post_uuid = (isset($params['post_uuid'])) ? $params['post_uuid'] : '';
		
		if($user_uid && $post_uuid)
		{
			$getResult = $this->db->delete('tbl_user_post_like_list_master', array('user_uid' => $user_uid, 'post_uuid' => $post_uuid));;
			$db_error = $this->db->error();
			
			if($db_error['code'])
			{
				return $this->returnModelDBError($this->db->error());
			}
			else
			{
				return $this->returnModelDBSuccess();
			}
		}
	}
	
	
	/**
	 * @param array $params
	 * @return mixed
	 *
	 * 타임 라인 글 리스트 라이크 버튼 눌렀는지 아닌지 체크
	 */
	public function likeListExistsUserList($params = array())
	{
		$user_uid = (isset($params['user_uid'])) ? $params['user_uid'] : '';
		$post_uuid = (isset($params['post_uuid'])) ? $params['post_uuid'] : '';
		
		if($user_uid && $post_uuid)
		{
			$getResult = $this->db->get_where('tbl_user_post_like_list_master', array('user_uid' => $user_uid, 'post_uuid' => $post_uuid));
			$db_error = $this->db->error();
			
			if($db_error['code'])
			{
				return $this->returnModelDBError($this->db->error());
			}
			else
			{
				return $this->returnModeDataNumRowType($getResult->num_rows());
			}
		}
	}
	
	public function getProfileTopInfo($params = array())
	{
		$user_uid = (isset($params['user_uid'])) ? $params['user_uid'] : '';
		
		if($user_uid)
		{
			$this->db->select('tbl_user_master.user_uid');
			$this->db->select('tbl_user_master.user_name');
			$this->db->select('tbl_user_master.user_image_name');
			$this->db->from('tbl_user_master');
			$this->db->where('user_uid', $user_uid);
			$getResult = $this->db->get();
			$db_error = $this->db->error();
			
			if($db_error['code'])
			{
				return $this->returnModelDBError($this->db->error());
			}
			else
			{
				return $this->returnModelData($getResult->result_array());
			}
		}
	}
	
	public function getUserUidList()
	{
		$this->db->select('user_uid');
		$this->db->from('tbl_user_master');
//		$this->db->where('user_uid', $user_uid);
		$getResult = $this->db->get();
		$db_error = $this->db->error();
		
		if($db_error['code'])
		{
			return $this->returnModelDBError($this->db->error());
		}
		else
		{
			return $this->returnModelData2($getResult->result_array());
		}
	}
	
	public function getPhotoFriendPostData()
	{
		$this->db->select('*');
		$this->db->from('tbl_photofriend_data');
//		$this->db->where('user_uid', $user_uid);
//		$this->db->limit(1);
//		$this->db->order_by('idx', 'DESC');
		$getResult = $this->db->get();
		$db_error = $this->db->error();
		
		if($db_error['code'])
		{
			return $this->returnModelDBError($this->db->error());
		}
		else
		{
			return $this->returnModelData2($getResult->result_array());
		}
		
	}

}