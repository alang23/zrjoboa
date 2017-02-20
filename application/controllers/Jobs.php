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
		$this->load->model('company_mdl','company');
	}


	public function index()
	{
				$this->tpl('oa/jobs_add_tpl');

	}

	public function add()
	{
		$userinfo = $this->userinfo;

		if(!empty($_POST)){

			//学历
			$data['jobs_name'] = $this->input->post('jobs_name');
			$data['sex'] = $this->input->post('sex');

			$education = $this->input->post('education');
			$_education = array();
			$_education = explode(':', $education);
			$data['education'] = $_education[0];
			$data['education_cn'] = $_education[1];

			$age = $this->input->post('age');
			$_age = array();
			$_age = explode(':', $age);
			$data['age'] = $_age[0];
			$data['age_cn'] = $_age[1];

			$experience = $this->input->post('experience');
			$_experience = array();
			$_experience = explode(':', $experience);
			$data['experience'] = $_experience[0];
			$data['experience_cn'] = $_experience[1];

			$wage = $this->input->post('wage');
			$_wage = array();
			$_wage = explode(':', $wage);
			$data['wage'] = $_wage[0];
			$data['wage_cn'] = $_wage[1];

			$province = $this->input->post('province');
			$_province = array();
			$_province = explode('-', $province);
			$data['province'] = $_province[0];
			$data['province_cn'] = $_province[1];

			//
			$city = $this->input->post('city');
			$_city = array();
			$_city = explode('-', $city);
			$data['city'] = $_city[0];
			$data['city_cn'] = $_city[1];

			$data['contacts'] = $this->input->post('contacts');
			$data['tel'] = $this->input->post('tel');
			$data['email'] = $this->input->post('email');
			$data['content'] = $this->input->post('content');
			$data['addtime'] = time();

			if($userinfo['company_id'] == '0'){
				$company_id = $this->input->post('company_id');
				$_company = array();
				$_company = explode(':', $company_id);
				$data['company_id'] = $_company[0];
				$data['company_name'] = $_company[1];
			}else{
				$company = array();
				$where['where'] = array('id'=>$userinfo['company_id']);
				$company = $this->company->get_one_by_where($where);
				$data['company_id'] = $userinfo['company_id'];
				$data['company_name'] = $company['name'];
			}


			if(!empty($data['jobs_name']) && !empty($data['company_id']) && !empty($data['company_name'])){

				if($this->jobs->add($data)){
					exit('ok');
				}else{
					exit('err1');
				}

			}else{
				exit('err2');
			}




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

			$data['company_id'] = $userinfo['company_id'];
			
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

		echo json_encode($msg);
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