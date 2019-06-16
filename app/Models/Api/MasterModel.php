<?php namespace App\Models\Api;

use App\Models\BaseModel;
use SebastianBergmann\CodeCoverage\Report\PHP;

class MasterModel extends BaseModel
{
	public function __construct()
	{
		parent::__construct();
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
			
			$builder = $this->db->table('tbl_photofriend_data');
			
			$builder->select('*');
			$builder->where('idx', '20');
			$query   = $builder->get();
			
//			print_r($query->getResultArray());
			$this::getResultControl($query->getResultArray());
//			throw new \Exception($query->getResultArray());
			
		} catch(\Exception $e) {
			
			echo 'catch : '.$e->getMessage().PHP_EOL;
			
//			throw $e;
			
		} finally {
			
//			echo "finally".PHP_EOL;
			
			echo $e->getMessage()." finally \n";
			
//			throw new \Exception("Bye");
		}

	}
}