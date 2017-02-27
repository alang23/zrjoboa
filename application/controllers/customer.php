<?php


class Customer extends Zrjoboa
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Customer_mdl','customer');
		$this->load->model('Account_mdl','account');
		$this->load->library('Categorylib','categorylib');
		$this->load->model('District_mdl','district');

	}


	public function index()
	{

		$userinfo = $this->userinfo;

		$data['userinfo'] = $userinfo;

		$page = isset($_GET['page']) ? $_GET['page'] : 0;
        $page = ($page && is_numeric($page)) ? intval($page) : 1;

        $c_name = isset($_GET['c_name']) ? $_GET['c_name'] : '';
        $uid = isset($_GET['uid']) ? $_GET['uid'] : '';
        $contacts = isset($_GET['contacts']) ? $_GET['contacts'] : '';
        $phone = isset($_GET['phone']) ? $_GET['phone'] : '';
        $data['c_name'] = $c_name;
        $data['uid'] = $uid;
        $data['contacts'] = $contacts;
        $data['phone'] = $phone;

        $limit = 20;
        $offset = ($page - 1) * $limit;
        $pagination = '';
                
        $countwhere = array('isdel'=>'0');
        $count = $this->customer->get_count($countwhere);
        $data['count'] = $count;

        $pageconfig['base_url'] = base_url('/customer/index?');
        $pageconfig['count'] = $count;
        $pageconfig['limit'] = $limit;
        $data['page'] = home_page($pageconfig);

		$list = array();
		$where['page'] = true;
        $where['limit'] = $limit;
        $where['offset'] = $offset;
        $where['where'] = array('isdel'=>'0');
        if($userinfo['company_id'] != '0'){
        	$where['where']['company_id'] = $userinfo['company_id'];
        }

        if(!empty($c_name)){
        	$where['like'] = array('key'=>'c_name','value'=>$c_name);
        }
        if(!empty($uid)){
        	$where['where']['uid'] = $uid;
        }
        if(!empty($contacts)){
        	$where['where']['contacts'] = $contacts;
        }

        if(!empty($phone)){
        	$where['where']['tel'] = $phone;
        }
        $where['order'] = array('key'=>'id','value'=>'DESC');
		$list = $this->customer->getList($where);	
		$data['list'] = $list;

		//客户代表
		$account = array();
		$c_where['where']['isdel'] = '0';
		if( !empty($userinfo['company_id']) ){
			$c_where['where']['company_id'] = $userinfo['company_id'];
		}
		$account = $this->get_account($c_where);
		$data['account'] = $account;


		$this->tpl('oa/customer_tpl',$data);

	}

	public function add()
	{

		$userinfo = $this->userinfo;

		if(!empty($_POST)){

			$uid = $this->input->post('uid');
			$c_name = $this->input->post('c_name');
			$contacts = $this->input->post('contacts');
			$tel = $this->input->post('tel');
			$address = $this->input->post('address');
			$remarks = $this->input->post('remarks');
			$industry = $this->input->post('industry');
			$nature = $this->input->post('nature');
			$scale = $this->input->post('scale');
			$province = $this->input->post('province');
			$city = $this->input->post('city');

			//检查企业名称
			$check_name = $this->check_company_name($c_name);
			if(!empty($check_name)){
				$msg['title'] = '添加失败,企业已经存在';
				$msg['msg'] = '<a href="'.base_url().'customer/index">返回列表</a> | <a href="'.base_url().'customer/add">继续添加</a>';
				$this->tpl('msg/msg_errors',$msg);
				exit;
			}

			$_nature = array();
			$_nature = explode(':', $nature);

			$_industry = array();
			$_industry = explode(':', $industry);

			$_scale = array();
			$_scale = explode(':', $scale);

						//省
			if(!empty($province)){
				$_province = array();
				$_province = explode(':', $province);
			}

			//市
			if(!empty($city)){
				$_city = array();
				$_city = explode(':', $city);
			}
			
			if(!empty($uid) && !empty($c_name)){

				$_info = explode(':', $uid);
				$add['uid'] = $_info[0];
				$add['realname'] = $_info[1];
				$add['c_name'] = $c_name;
				$add['contacts'] = $contacts;
				$add['tel'] = $tel;
				$add['address'] = $address;
				$add['remarks'] = $remarks;
				$add['addtime'] = time();
				$add['company_id'] = $userinfo['company_id'];

				$add['industry'] = $_industry[0];
				$add['industry_cn'] = $_industry[1];

				$add['nature'] = $_nature[0];
				$add['nature_cn'] = $_nature[1];

				$add['scale'] = $_scale[0];
				$add['scale_cn'] = $_scale[1];

				$add['province'] = $_province[0];
				$add['province_cn'] = $_province[1];
				$add['city'] = $_city[0];
				$add['city_cn'] = $_city[1];
 
				
				if($this->customer->add($add)){
					$msg['title'] = '添加成功';
					$msg['msg'] = '<a href="'.base_url().'customer/index">返回列表</a> | <a href="'.base_url().'customer/add">继续添加</a>';
					$this->tpl('msg/msg_success',$msg);
				}else{
					$msg['title'] = '添加失败';
					$msg['msg'] = '<a href="'.base_url().'customer/index">返回列表</a> | <a href="'.base_url().'customer/add">继续添加</a>';
					$this->tpl('msg/msg_errors',$msg);
				}
			}else{
					$msg['title'] = '添加失败,缺少参数';
					$msg['msg'] = '<a href="'.base_url().'customer/index">返回列表</a> | <a href="'.base_url().'customer/add">继续添加</a>';
					$this->tpl('msg/msg_errors',$msg);
			}

		}else{

			//客户代表
			$account = array();
			$where['where']['isdel'] = '0';
			if(!empty($userinfo['company_id'])){
				$where['where']['company_id'] = $userinfo['company_id'];
			}
			$account = $this->get_account($where);
			$data['account'] = $account;

			//企业性质
			$nature = array();
			$key = 'WRZC_company_type';
			$nature = $this->categorylib->get_category($key);
			$data['nature'] = $nature;

			//行业
			$industry = array();
			$indu_key = 'WRZC_trade';
			$industry = $this->categorylib->get_category($indu_key);
			$data['industry'] = $industry;

			//公司规模
			$scale = array();
			$scale_key = 'WRZC_scale';
			$scale = $this->categorylib->get_category($scale_key);
			$data['scale'] = $scale;

			$province = $this->get_province();
			$data['province'] = $province;

			$this->tpl('oa/customer_add_tpl',$data);
		}
		
	}

	public function edit()
	{
		$userinfo = $this->userinfo;

		if(!empty($_POST)){

			
			$c_name = $this->input->post('c_name');
			$contacts = $this->input->post('contacts');
			$tel = $this->input->post('tel');
			$address = $this->input->post('address');
			$remarks = $this->input->post('remarks');
			$industry = $this->input->post('industry');
			$nature = $this->input->post('nature');
			$scale = $this->input->post('scale');
			$province = $this->input->post('province');
			$city = $this->input->post('city');
			$id = $this->input->post('id');
		
			$_nature = array();
			$_nature = explode(':', $nature);

			$_industry = array();
			$_industry = explode(':', $industry);

			$_scale = array();
			$_scale = explode(':', $scale);

						//省
			if(!empty($province)){
				$_province = array();
				$_province = explode(':', $province);
			}

			//市
			if(!empty($city)){
				$_city = array();
				$_city = explode(':', $city);
			}
			
			if(!empty($id) && !empty($c_name)){

				$add['c_name'] = $c_name;
				$add['contacts'] = $contacts;
				$add['tel'] = $tel;
				$add['address'] = $address;
				$add['remarks'] = $remarks;
				$add['addtime'] = time();
				$add['company_id'] = $userinfo['company_id'];

				$add['industry'] = $_industry[0];
				$add['industry_cn'] = $_industry[1];

				$add['nature'] = $_nature[0];
				$add['nature_cn'] = $_nature[1];

				$add['scale'] = $_scale[0];
				$add['scale_cn'] = $_scale[1];

				$add['province'] = $_province[0];
				$add['province_cn'] = $_province[1];
				$add['city'] = $_city[0];
				$add['city_cn'] = $_city[1];
 
				$config = array('id'=>$id);
				if($this->customer->update($config,$add)){
					$msg['title'] = '修改成功';
					$msg['msg'] = '<a href="'.base_url().'customer/index">返回列表</a>';
					$this->tpl('msg/msg_success',$msg);
				}else{
					$msg['title'] = '修改失败';
					$msg['msg'] = '<a href="'.base_url().'customer/index">返回列表</a>';
					$this->tpl('msg/msg_errors',$msg);
				}
			}else{
					$msg['title'] = '添加失败,缺少参数';
					$msg['msg'] = '<a href="'.base_url().'customer/index">返回列表</a> ';
					$this->tpl('msg/msg_errors',$msg);
			}

		}else{

			$id = $this->input->get('id');

			$where['where'] = array('id'=>$id);
			$info = $this->customer->get_one_by_where($where);
			$data['info'] = $info;

			//客户代表
			$account = array();
			$where_customer['where']['isdel'] = '0';
			if(!empty($userinfo['company_id'])){
				$where_customer['where']['company_id'] = $userinfo['company_id'];
			}
			$account = $this->get_account($where_customer);
			$data['account'] = $account;

			//企业性质
			$nature = array();
			$key = 'WRZC_company_type';
			$nature = $this->categorylib->get_category($key);
			$data['nature'] = $nature;

			//行业
			$industry = array();
			$indu_key = 'WRZC_trade';
			$industry = $this->categorylib->get_category($indu_key);
			$data['industry'] = $industry;

			//公司规模
			$scale = array();
			$scale_key = 'WRZC_scale';
			$scale = $this->categorylib->get_category($scale_key);
			$data['scale'] = $scale;

			$province = $this->get_province();
			$data['province'] = $province;

			$this->tpl('oa/customer_edit_tpl',$data);
		}
	}

	public function detail()
	{
		$id = $this->input->get('id');

		$info = array();
		$where['where'] = array('c.id'=>$id);
		$info = $this->customer->get_one_by_join($where);
		$data['info'] = $info;
		
		$this->tpl('oa/customer_detail_tpl',$data);
	}

	public function del()
	{
		$id = $this->input->get('id');
		$del_config = array('id'=>$id);
		$del_data['isdel'] = 1;
		if($this->company->update($del_config,$del_data)){
			echo 'ok';
		}else{
			echo 'err';
		}
	}

	//ajax检验企业名称
	public function check_company_ajax()
	{
		$c_name = $this->input->post('c_name');
		$info = array();
		if(!empty($c_name)){
			$info = $this->check_company_name($c_name);
		}

		if(!empty($info)){
			$msg = array(
				'code'=>'1',
				'msg'=>'该企业已经存在'
				);
		}else{
			$msg = array(
				'code'=>'0',
				'msg'=>'企业不存在'
				);
		}

		echo json_encode($msg);
		exit;
	}

	//检查企业名称
	public function check_company_name($name)
	{
		$where['where'] = array('c_name'=>$name);
		$info = $this->customer->get_one_by_where($where);

		return $info;
	}

	private function get_account($where = array())
	{
			//客户代表
		$account = array();
		$account = $this->account->getList($where);

		return $account;
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




