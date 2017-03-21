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
		$this->load->model('Customer_mdl','customer');
	}

	//职位列表
	public function index()
	{


		$userinfo = $this->userinfo;

		$page = isset($_GET['page']) ? $_GET['page'] : 0;
        $page = ($page && is_numeric($page)) ? intval($page) : 1;
        $company_id = isset($_GET['company_id']) ? $_GET['company_id'] : 0;
        $data['company_id'] = $company_id;

        $jobs_name = isset($_GET['jobs_name']) ? $_GET['jobs_name'] : '';
        $company_name = isset($_GET['company_name']) ? $_GET['company_name'] : '';
        $province_cn = isset($_GET['province_cn']) ? $_GET['province_cn'] : '';
        $city_cn = isset($_GET['city_cn']) ? $_GET['city_cn'] : '';
        $data['jobs_name'] = $jobs_name;
        $data['company_name'] = $company_name;
        $data['province_cn'] = $province_cn;
        $data['city_cn'] = $city_cn;

        $limit = 20;
        $offset = ($page - 1) * $limit;
        $pagination = '';
                
        $countwhere['isdel'] = '0';
        if(!empty($company_id)){
        	$countwhere['company_id'] = $company_id;
        	
        }

        if(!empty($jobs_name)){
        	$countlike['like'] = array('key'=>'jobs_name','value'=>$jobs_name);
        }

        if(!empty($company_name)){
        	$countlike['like'] = array('key'=>'company_name','value'=>$company_name);
        }

        if(!empty($jobs_name)){
        	$countlike['like'] = array('key'=>'jobs_name','value'=>$jobs_name);
        }

        if(!empty($province_cn)){
        	$countlike['like'] = array('key'=>'province_cn','value'=>$province_cn);
        }

        if(!empty($city_cn)){
        	$countlike['like'] = array('key'=>'city_cn','value'=>$city_cn);
        }


        $count = $this->jobs->get_count($countwhere);
        $data['count'] = $count;

        $pageconfig['base_url'] = base_url('/jobs/index?');
        $pageconfig['count'] = $count;
        $pageconfig['limit'] = $limit;
        $data['page'] = home_page($pageconfig);

		$list = array();
		$where['page'] = true;
        $where['limit'] = $limit;
        $where['offset'] = $offset;
        $where['where']['isdel'] = '0';
        if(!empty($company_id)){
        	$where['where']['company_id'] = $company_id;
        }

        if(!empty($jobs_name)){
        	$where['like'] = array('key'=>'jobs_name','value'=>$jobs_name);
        }

        if(!empty($company_name)){
        	$where['like'] = array('key'=>'company_name','value'=>$company_name);
        }

        if(!empty($jobs_name)){
        	$where['like'] = array('key'=>'jobs_name','value'=>$jobs_name);
        }

        if(!empty($province_cn)){
        	$where['like'] = array('key'=>'province_cn','value'=>$province_cn);
        }

        if(!empty($city_cn)){
        	$where['like'] = array('key'=>'city_cn','value'=>$city_cn);
        }
   
        $where['order'] = array('key'=>'id','value'=>'DESC');
		$list = $this->jobs->getList($where);	
		$data['list'] = $list;

		$this->tpl('oa/jobs_list_tpl',$data);

	}

	public function add()
	{
		$userinfo = $this->userinfo;

		if(!empty($_POST)){

			//学历
			$data['jobs_name'] = $this->input->post('jobs_name');
			$sex = $this->input->post('sex');

			$_sex = array();
			$_sex = explode(':', $sex);
			$data['sex'] = $_sex[0];
			$data['sex_cn'] = $_sex[1];

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
			$_province = explode(':', $province);
			$data['province'] = $_province[0];
			$data['province_cn'] = $_province[1];

			//
			$city = $this->input->post('city');
			$_city = array();
			$_city = explode(':', $city);
			$data['city'] = $_city[0];
			$data['city_cn'] = $_city[1];

			$data['contacts'] = $this->input->post('contacts');
			$data['tel'] = $this->input->post('tel');
			$data['email'] = $this->input->post('email');
			$data['content'] = $this->input->post('content');
			$data['addtime'] = time();

			/*
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
			*/
			$company_id = $this->input->post('company_id');
			$_company = array();
			$_company = explode(':', $company_id);
			$data['company_id'] = $_company[0];
			$data['company_name'] = $_company[1];


			if(!empty($data['jobs_name']) && !empty($data['company_id']) && !empty($data['company_name'])){

				if($this->jobs->add($data)){
					$msg['title'] = '添加成功';
					$msg['msg'] = '<a href="'.base_url().'jobs/index?company_id='.$data['company_id'].'">返回列表</a> | <a href="'.base_url().'jobs/add?company_id='.$data['company_id'].'">继续添加</a>';
					$this->tpl('msg/msg_success',$msg);
				}else{
					exit('err1');
				}

			}else{
				exit('err2');
			}




		}else{

			$company_id = isset($_GET['company_id']) ? $_GET['company_id'] : 0;
			$data['company_id'] = $company_id;

			$company = array();
			$customer_where['where'] = array('company_id'=>$userinfo['company_id']);
			$company = $this->customer->getList($customer_where);
			$data['company'] = $company;

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

	public function edit(){

		$userinfo = $this->userinfo;

		if(!empty($_POST)){

			//学历
			$data['jobs_name'] = $this->input->post('jobs_name');
			$sex = $this->input->post('sex');

			$_sex = array();
			$_sex = explode(':', $sex);
			$data['sex'] = $_sex[0];
			$data['sex_cn'] = $_sex[1];

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
			$_province = explode(':', $province);
			$data['province'] = $_province[0];
			$data['province_cn'] = $_province[1];

			//
			$city = $this->input->post('city');
			$_city = array();
			$_city = explode(':', $city);
			$data['city'] = $_city[0];
			$data['city_cn'] = $_city[1];

			$data['contacts'] = $this->input->post('contacts');
			$data['tel'] = $this->input->post('tel');
			$data['email'] = $this->input->post('email');
			$data['content'] = $this->input->post('content');

			// $company_id = $this->input->post('company_id');
			// $_company = array();
			// $_company = explode(':', $company_id);
			// $data['company_id'] = $_company[0];
			// $data['company_name'] = $_company[1];


			$id = $this->input->post('id');
			if(!empty($data['jobs_name']) && !empty($id)){
				$config = array('id'=>$id);
				if($this->jobs->update($config,$data)){
					exit('ok');
				}else{
					exit('err1');
				}

			}else{
				exit('err2');
			}

		}else{

			$id = $this->input->get('id');
			$info = array();
			$info_where['where'] = array('id'=>$id);
			$info = $this->jobs->get_one_by_where($info_where);
			$data['info'] = $info;

			$company = array();
			$customer_where['where'] = array('company_id'=>$userinfo['company_id']);
			$company = $this->customer->getList($customer_where);
			$data['company'] = $company;

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
			
			$this->tpl('oa/jobs_edit_tpl',$data);
		}
	}

	//职位详情
	public function detail()
	{
		$id = $this->input->get('id');
		$where['where'] = array('id'=>$id);
		$info = array();
		$info = $this->jobs->get_one_by_where($where);

		$data['info'] = $info;
		$this->tpl('oa/jobs_detail_tpl',$data);
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