<?php namespace App\Models;

use CodeIgniter\Model;

class MasterModel extends Model
{
	public $db;
	
	public function __construct()
	{
		parent::__construct();
	
//		$this->load->database('myproject');
	}
	
	public function getMember()
	{
//		$query = $this->db->query('select * from tbl_user_master');
//
//		print_r($query);
		
//		$query = $this->db->select(' * ')
//			->where($where)
//			->limit(10, 0)
//			->order_by('idx', 'DESC')
//		$query = $this->db->get('tbl_user_master');
		
		
//		$this->db->select(' user_name ')->get('tbl_user_master');
//			->where_in('username', $this->config->item('mybb_news_usernames'))
//			->where($where)
//			->limit($limit, 0)
//			->order_by('dateline', $order)
//			->get('tbl_user_master');
		
//		$this->db->select('*')
//			->from('tbl_user_master');
//			->join('course_details','assign_tble.ccode=course_details.ccode','LEFT')
//			->where('assign_tble.scode',$userID);
		
//		$query = $this->db->get();
		
		$builder = $this->db->table('tbl_user_master');
		$query   = $builder->get();
		return $query->getResult();
		
		
		
	}

}