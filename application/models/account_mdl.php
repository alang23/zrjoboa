<?php


class Account_mdl extends Zroa_Model
{
	
	var $table_name = 'zroa_admin';
	var $table_company = 'zroa_company';
	var $table_role = 'zroa_role';

	public function __construct()
	{
		parent::__construct();
		$this->set_table_name($this->table_name);
	}

		//关联简历
	public function get_list_join_company($config = array())
	{

		
		if(!empty($config['where'])){
            $this->db->where($config['where']);
        }

        if(!empty($config['page'])){
            $this->db->limit(intval($config['limit']));
            $this->db->offset(intval($config['offset']));
        }

        if(!empty($config['order'])){
            $this->db->order_by($config['order']['key'],$config['order']['value']);
        }

        if(!empty($config['like'])){
            $this->db->like($config['like']['key'],$config['like']['value']);
        }
     
        if(!empty($config['where_in'])){
            $this->db->where_in($config['where_in']['key'], $config['where_in']['value']);
           
        }

        if(!empty($config['or_like'])){
            $this->db->or_like($config['or_like']['key'], $config['or_like']['value']);
          
        }

		$list = array();
		$list = $this->db->select('
									c.name,a.*')
					->from($this->table_name.' as a')
					->join($this->table_company.' as c','c.id=a.company_id','left')
					->get()->result_array();
					//echo $this->db->last_query();
					


		return $list;
	}

	public function get_one_by_join($config=array())
	{
		if(!empty($config['where'])){
            $this->db->where($config['where']);
        }

        if(!empty($config['page'])){
            $this->db->limit(intval($config['limit']));
            $this->db->offset(intval($config['offset']));
        }

        if(!empty($config['order'])){
            $this->db->order_by($config['order']['key'],$config['order']['value']);
        }

        if(!empty($config['like'])){
            $this->db->like($config['like']['key'],$config['like']['value']);
        }
     
        if(!empty($config['where_in'])){
            $this->db->where_in($config['where_in']['key'], $config['where_in']['value']);
           
        }

        if(!empty($config['or_like'])){
            $this->db->or_like($config['or_like']['key'], $config['or_like']['value']);
          
        }

		$info = array();
		$info = $this->db->select('
									r.role_name,r.role_tag,r.id,a.*,c.name')
					->from($this->table_name.' as a')
					->join($this->table_role.' as r','r.id=a.role','left')
					->join($this->table_company.' as c','c.id=a.company_id','left')
					->get()->row_array();
					


		return $info;
	}

	//AR
	public function get_list_by_ar($where)
	{

		$sql = "SELECT c.name,a.*,r.role_name,r.role_tag  from ".
			$this->table_name.' AS a LEFT JOIN '.
			$this->table_company.' AS c ON(c.id=a.company_id)'.' LEFT JOIN '.
			$this->table_role.' AS r ON(r.id=a.role)'.' '.$where['sql'].' ORDER BY id DESC limit '. $where['offset'].' ,'.$where['limit'];
		$query = $this->db->query($sql);
		
		$tmp = array();
		foreach ($query->result_array() as $row)
		{
			$tmp[] = $row;
		}
		
		return $tmp;
	}

	//数量
	public function get_count_ar($where)
	{
		$sql = "SELECT c.name,a.* from ".
			$this->table_name.' AS a LEFT JOIN '.
			$this->table_company.' AS c ON(c.id=a.company_id)'.' '.$where['sql'];
		$query = $this->db->query($sql);

		return $query->num_rows();
	}

	
}