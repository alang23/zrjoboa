<?php
//客户回访列表

class Listvisit extends Zrjoboa
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Customer_mdl','customer');
		$this->load->model('Account_mdl','account');
		$this->load->library('Categorylib','categorylib');
		$this->load->model('Contacts_mdl','contacts');
		$this->load->model('Visit_log_mdl','visit_log');

	}


	public function index()
	{

		$userinfo = $this->userinfo;
		$data['userinfo'] = $userinfo;
		//print_r($userinfo);

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
        	$where['where']['phone'] = $phone;
        }
        $where['order'] = array('key'=>'id','value'=>'DESC');
		$list = $this->customer->getList($where);	
		$data['list'] = $list;

		//客户代表
		$account = array();
		$c_where['where'] = array('isdel'=>'0');
		if( !empty($userinfo['company_id']) ){
			$c_where['where']['company_id'] = $userinfo['company_id'];
		}
		$account = $this->get_account($c_where);
		$data['account'] = $account;

		$this->tpl('crm/crm_listvisit_tpl',$data);
	}

	//回访详情
	public function detail()
	{	

		$userinfo = $this->userinfo;		
		$id = $this->input->get('id');

		//客户基本信息
		$c_where['where'] = array('id'=>$id);
		$customer = $this->customer->get_one_by_where($c_where);
		$data['customer'] = $customer;

		//联系人
		$contacts_where['where'] = array('company_id'=>$customer['id']);
		$_contacts = array();
		$_contacts = $this->contacts->getList($contacts_where);
		$data['contacts'] = $_contacts;

		$v_where['where'] = array('company_id'=>$customer['id']);
		$_log = array();
		$_log = $this->visit_log->getList($v_where);
		$data['v_log'] = $_log;

		$this->tpl('crm/crm_visit_detail_tpl',$data);


	}

	//添加回访记录
	public function add_visit()
	{

		$userinfo = $this->userinfo;

		$result = $this->input->post('result');
		$v_type = $this->input->post('v_type');
		$c_type = $this->input->post('c_type');
		$contacts = $this->input->post('contacts');
		$v_value = $this->input->post('v_value');
		$v_time = $this->input->post('v_time');
		$n_v_time = $this->input->post('n_v_time');
		$content = $this->input->post('content');
		$company_id = $this->input->post('company_id');

		$add['c_type'] = $c_type;
		$add['result'] = $result;
		$add['v_type'] = $v_type;
		$add['contacts'] = $contacts;
		$add['v_value'] = $v_value;
		$add['v_time'] = strtotime($v_time);
		$add['n_v_time'] = strtotime($n_v_time);
		$add['content'] = $content;
		$add['company_id'] = $company_id;
		$add['addtime'] = time();
		$add['uid'] = $userinfo['id'];
		$add['realname'] = $userinfo['realname'];

		if(!empty($result) && !empty($v_type) && !empty($contacts) && !empty($v_value) && !empty($n_v_time) && !empty($content) && !empty($company_id)){

			if($this->visit_log->add($add)){

				$msg = array(
				'code'=>'0',
				'msg'=>'添加成功'
				);
			
			}else{

				$msg = array(
				'code'=>'1',
				'msg'=>'添加失败'
				);
			
			}

		}else{

			$msg = array(
				'code'=>'2',
				'msg'=>'缺少参数'
				);
			
		}

		echo json_encode($msg);


	}

	//添加联系人-联系人只能添加四个
	public function add_contacts()
	{
		$company_id = $this->input->post('company_id');
		$add['realname'] = $this->input->post('realname');
		$add['sex'] = $this->input->post('sex');;
		$add['phone'] = $this->input->post('phone');
		$add['tel'] = $this->input->post('tel');
		$add['fax'] = $this->input->post('fax');
		$add['email'] = $this->input->post('email');
		$add['qq'] = $this->input->post('qq');
		$add['webchat'] = $this->input->post('webchat');
		$add['department'] = $this->input->post('department');
		$add['job'] = $this->input->post('job');
		$add['address'] = $this->input->post('address');
		$add['remarks'] = $this->input->post('remarks');
		$add['company_id'] = $company_id;
		$add['birthday'] = $this->input->post('birthday');

		$where = array('company_id'=>$company_id);
		$count = $this->contacts->get_count($where);
		if($count > 3){
			//exit('只能添加4个联系人');
			$msg = array(
				'code'=>'1',
				'msg'=>'只能添加4个联系人'
				);
			echo json_encode($msg);
			exit;
		}

		if($this->contacts->add($add)){
			$id = $this->contacts->insert_id();
			$msg = array(
				'code'=>'0',
				'msg'=>'添加成功',
				'data'=>$id
				);
			echo json_encode($msg);
			exit;
		}else{
			$msg = array(
				'code'=>'2',
				'msg'=>'添加失败'
				);
			echo json_encode($msg);
			exit;
		}


	}

	//编辑联系人
	public function update_contacts()
	{
		
		$act = $this->input->post('act');
		if($act == 'edit'){
			
			$id = $this->input->post('id');
			$where['where'] = array('id'=>$id);
			$info = array();
			$info = $this->contacts->get_one_by_where($where);
			$msg = array(
				'code'=>'0',
				'msg'=>'ok',
				'data'=>$info
				);
			echo json_encode($msg);
			exit;

		}elseif($act == 'update'){

			$add['realname'] = $this->input->post('realname');
			$add['sex'] = $this->input->post('sex');;
			$add['phone'] = $this->input->post('phone');
			$add['tel'] = $this->input->post('tel');
			$add['fax'] = $this->input->post('fax');
			$add['email'] = $this->input->post('email');
			$add['qq'] = $this->input->post('qq');
			$add['webchat'] = $this->input->post('webchat');
			$add['department'] = $this->input->post('department');
			$add['job'] = $this->input->post('job');
			$add['address'] = $this->input->post('address');
			$add['remarks'] = $this->input->post('remarks');
			$add['birthday'] = $this->input->post('birthday');
			$id = $this->input->post('id');
			
			$config = array('id'=>$id);
			if(!empty($add['realname']) && !empty($add['phone'])){
				if($this->contacts->update($config,$add)){
					$msg = array(
						'code'=>'0',
						'msg'=>'修改成功'
						);
				}else{
					$msg = array(
						'code'=>'1',
						'msg'=>'无任何修改'
						);
				}
			}else{
				$msg = array(
						'code'=>'2',
						'msg'=>'缺少必要参数'
						);
			}
			echo json_encode($msg);
			exit;
		}
	}

	//删除联系人
	public function del_contact()
	{
		$id = $this->input->post('id');
		$config = array('id'=>$id);
		if($this->contacts->del($config)){
			$msg = array(
				'code'=>'0',
				'msg'=>'删除成功'
				);

		}else{
			$msg = array(
				'code'=>'1',
				'msg'=>'添加失败'
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



}