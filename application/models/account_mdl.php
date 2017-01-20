<?php


class Account_mdl extends Zroa_Model
{
	
	var $table_name = 'zroa_admin';
	var $table_company = 'zroa_company';

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


		$list = array();
		$list = $this->db->select('
									c.name,a.*')
					->from($this->table_name.' as a')
					->join($this->table_company.' as c','c.id=a.company_id','left')
					->get()->result_array();

		return $list;
	}

	
}