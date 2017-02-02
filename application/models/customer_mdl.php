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

	
}