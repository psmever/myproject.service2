<?php namespace App\Controllers\Command\Dev;

use App\Controllers\CommandController;
use CodeIgniter\Database\Query;

class Db extends CommandController
{
	private $db;
	
	public function __construct ()
	{
		$this->db = \Config\Database::connect();
	}
	
	public function index()
	{
		echo __FUNCTION__;
	}
	
	
	public function code_reset()
	{
		$this->db->query('SET FOREIGN_KEY_CHECKS = 0');
		$this->db->query('TRUNCATE TABLE tbl_code_master');
		$this->db->query('SET FOREIGN_KEY_CHECKS = 1');
		
		$codeGroupList = [
			['code_id' => 'U01', 'code_name' => '사용자 구분', 'code_comment' => '' ],
			['code_id' => 'U02', 'code_name' => '사용자 레벨', 'code_comment' => '' ],
			['code_id' => 'S01', 'code_name' => '성별', 'code_comment' => '' ],
			['code_id' => 'S02', 'code_name' => '업로드 구분', 'code_comment' => '' ],
			['code_id' => 'S03', 'code_name' => '파일 구분', 'code_comment' => '' ],
			['code_id' => 'C01', 'code_name' => '클라이언트 타입', 'code_comment' => ' API 요청시 해당 클라이언트 타입' ],
			['code_id' => 'C02', 'code_name' => '컨텐트 타입', 'code_comment' => ' 글 공개 비공개' ],
			['code_id' => 'C03', 'code_name' => 'POST 구분', 'code_comment' => ' 글 타입' ],
			['code_id' => 'L01', 'code_name' => '로그코드', 'code_comment' => ' 로그 구분하기 위해..' ],
			// ['code_id' => 'S02', 'code_name' => 'Group2', 'code_comment' => '테스트 코드 \n입니다.1'],
		];
		
		$codeListArray = [
			'U01' => [
				['code_id' => '010', 'code_name' => 'web', 'code_comment' => '웹 가입 사용자' ],
				['code_id' => '020', 'code_name' => 'iOS', 'code_comment' => 'iOS 가입 사용자'],
				['code_id' => '030', 'code_name' => 'android', 'code_comment' => 'android 가입 사용자'],
			],
			'U02' => [
				['code_id' => '001', 'code_name' => '대기 사용자', 'code_comment' => '최초 가입 상태' ],
				['code_id' => '010', 'code_name' => '일반 사용자', 'code_comment' => '인증 완료' ],
				['code_id' => '099', 'code_name' => '일반 관리자', 'code_comment' => '보통 관리자' ],
				['code_id' => '999', 'code_name' => '최고 관리자', 'code_comment' => '싸이트 관리자' ],
			],
			'S01' => [
				['code_id' => '010', 'code_name' => '남자', 'code_comment' => '성별' ],
				['code_id' => '020', 'code_name' => '여자', 'code_comment' => '성별'],
			],
			'S02' => [
				['code_id' => '010', 'code_name' => 'profile image', 'code_comment' => '프로필 사진 업로드' ],
				['code_id' => '020', 'code_name' => 'today image', 'code_comment' => 'today 사진 업로드' ],
			],
			'S03' => [
				['code_id' => '010', 'code_name' => 'time line image', 'code_comment' => '타입라인 에 보여지는 이미지들' ],
			],
			'C01' => [
				['code_id' => '010', 'code_name' => 'web', 'code_comment' => '웹 클라이언트' ],
				['code_id' => '020', 'code_name' => 'iOS', 'code_comment' => 'iOS 클라이언트'],
				['code_id' => '030', 'code_name' => 'android', 'code_comment' => 'android 클라이언트'],
			],
			'C02' => [
				['code_id' => '010', 'code_name' => '공개', 'code_comment' => '글 공개' ],
				['code_id' => '020', 'code_name' => '비공개', 'code_comment' => '글 비공개' ],
			],
			'C03' => [
				['code_id' => '010', 'code_name' => '기본', 'code_comment' => '사진 없는 글' ],
				['code_id' => '020', 'code_name' => '사진', 'code_comment' => '사진 있는글' ],
			],
			'L01' => [
				['code_id' => '010', 'code_name' => 'DB ERROR', 'code_comment' => '디비 에러' ],
				['code_id' => '020', 'code_name' => 'API ERROR', 'code_comment' => 'API 에러' ],
			],
		
		];
		
		
		
		foreach ($codeGroupList as $ckey => $value) {
			$code_id = trim($value['code_id']);
			$code_name = trim($value['code_name']);
			$code_comment = trim($value['code_comment']);
			
			$pQuery = $this->db->prepare(function($db)
			{
				$sql = "INSERT INTO tbl_code_master (code_id, group_id, code_name, code_comment, regist_date) VALUES (?, ?, ?, ?, now())";
				
				return (new Query($db))->setQuery($sql);
			});
			
			$results = $pQuery->execute($code_id, '', $code_name, $code_comment);
			
		}
		
		
		foreach ($codeListArray as $group_id => $arrayValue)
		{
			foreach ($arrayValue as $ckey => $value) {
				$code_id = trim($value['code_id']);
				$group_id = trim($group_id);
				$code_name = trim($value['code_name']);
				$code_comment = trim($value['code_comment']);
				
				$pQuery = $this->db->prepare(function($db)
				{
					$sql = "INSERT INTO tbl_code_master (code_id, group_id, code_name, code_comment, regist_date) VALUES (?, ?, ?, ?, now())";
					
					return (new Query($db))->setQuery($sql);
				});
				
				$results = $pQuery->execute($group_id.$code_id, $group_id, $code_name, $code_comment);
			}
			
		}
		
		$pQuery->close();
		echo ">>> end <<<".PHP_EOL;
	}
	
	
	//--------------------------------------------------------------------
	
}