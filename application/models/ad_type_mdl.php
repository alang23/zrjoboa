<?php


class Ad_type_mdl extends Zroa_Model
{
	
	var $table_name = 'zroa_ad_type';
	var $table_company = 'zroa_company';


	public function __construct()
	{
		parent::__construct();
		$this->set_table_name($this->table_name);
	}

		    //联表查询
    public function get_list_by_join($config = array())
    {

		if(!empty($config['where'])){
            $this->db->where($config['where']);
        }


		$info = array();
		$info = $this->db->select('c.name,ad.*')
					->from($this->table_name.' as ad')
					->join($this->table_company.' as c','c.id=ad.company_id','left')
					->get()->result_array();

		return $info;

    }

	
}