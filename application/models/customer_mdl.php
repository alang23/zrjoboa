<?php


class Customer_mdl extends Zroa_Model
{
	
	var $table_name = 'zroa_customer';
	var $table_admin = 'zroa_admin';

	public function __construct()
	{
		parent::__construct();
		$this->set_table_name($this->table_name);
	}


	    //联表查询
    public function get_one_by_join($config = array())
    {

		if(!empty($config['where'])){
            $this->db->where($config['where']);
        }


		$info = array();
		$info = $this->db->select('c.*,a.realname')
					->from($this->table_name.' as c')
					->join($this->table_admin.' as a','a.id=c.uid','left')
					->get()->row_array();

		return $info;

    }

   	public function get_list_by_join($config=array())
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
									a.realname,c.*')
					->from($this->table_name.' as c')
					->join($this->table_admin.' as a','a.id=c.uid','left')
					->get()->result_array();
					


		return $list;
	}

	
}