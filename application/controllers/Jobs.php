<?php
/**
*@职位管理
*
**/


class Jobs extends Zrjoboa
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Jobs_mdl','jobs');
		$this->load->library('Categorylib','categorylib');
		$this->load->model('District_mdl','district');
	}


	public function index()
	{
				$this->tpl('oa/jobs_add_tpl');

	}

	public function add()
	{
		if(!empty($_POST)){

			//学历

		}else{
			//学历
			$education = array();
			$education_key = 'WRZC_education';
			$education = $this->categorylib->get_category($education_key);
			$data['education'] = $education;

			//工作经验
			$age = array();
			$age_key = 'WRZC_hunter_age';
			$age = $this->categorylib->get_category($age_key);
			$data['age'] = $age;

			//		
			$experience = array();
			$experience_key = 'WRZC_experience';
			$experience = $this->categorylib->get_category($experience_key);
			$data['experience'] = $experience;

			//薪资
			$wage = array();
			$wage_key = 'WRZC_wage';
			$wage = $this->categorylib->get_category($wage_key);
			$data['wage'] = $wage;

			$province = $this->get_province();
			$data['province'] = $province;
			
			$this->tpl('oa/jobs_add_tpl',$data);

		}
		
	}


	public function check_name()
	{

		$jobs_name = $this->input->post('jobs_name');
		$company_id = $this->input->post('company_id');

		$config['where'] = array('jobs_name'=>$jobs_name,'company_id'=>$company_id);

		$info = $this->jobs->get_one_by_where($config);
		if(!empty($info)){
			$msg = array('code'=>'1','msg'=>'职位名称已经存在');
		}else{
			$msg = array('code'=>'0','msg'=>'职位名称不存在');
		}
	}

			//省份
	public function get_province()
	{
		$list = array();
		$where['where'] = array('parentid'=>'0');
		$list = $this->district->getList($where);

		return $list;
	}

}