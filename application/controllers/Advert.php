<?php


class Advert extends Zrjoboa
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('customer_mdl','customer');
		$this->load->model('charge_type_mdl','charge_type');
		$this->load->model('booth_mdl','booth');
		$this->load->model('bussiness_exhibition_mdl','bussiness_exhibition');
		$this->load->model('bussiness_ad_mdl','bussiness_ad');
		$this->load->model('customer_mdl','customer');
		$this->load->model('ad_type_mdl','ad_type');
		$this->load->model('ad_file_mdl','ad_file');
		$this->load->model('account_mdl','account');
	}


	public function index()
	{

	}

	public function ad()
	{

		$page = isset($_GET['page']) ? $_GET['page'] : 0;
        $page = ($page && is_numeric($page)) ? intval($page) : 1;
        $start_time = isset($_GET['start_time']) ? $_GET['start_time'] : '';
        $end_time = isset($_GET['end_time']) ? $_GET['end_time'] : '';
        $data['start_time'] = $start_time;
        $data['end_time'] = $end_time;

        $uid = isset($_GET['uid']) ? $_GET['uid'] : 0;
        $data['uid'] = $uid;

        $is_member = isset($_GET['is_member']) ? $_GET['is_member'] : '';
        $data['is_member'] = $is_member;

        $c_name = isset($_GET['c_name']) ? $_GET['c_name'] : '';
        $data['c_name'] = $c_name;

        $limit = 20;
        $offset = ($page - 1) * $limit;
        $pagination = '';
                
        $countwhere = array('isdel'=>'0');
        $count = $this->bussiness_ad->get_count($countwhere);
        $data['count'] = $count;

        $pageconfig['base_url'] = base_url('/advert/ad?');
        $pageconfig['count'] = $count;
        $pageconfig['limit'] = $limit;
        $data['page'] = home_page($pageconfig);

		$list = array();
		
		$where['page'] = true;
        $where['limit'] = $limit;
        $where['offset'] = $offset;
        $where['where']['isdel'] = '0';

        if(!empty($start_time)){
        	$s_time = strtotime($start_time);
        	$where['where']['show_time>='] = $s_time;
        	if(!empty($end_time)){
        		$e_time = strtotime($end_time);
        		$where['where']['show_time <='] = $e_time;
        	}
        }

        //客户代表

        if(!empty($uid)){
        	$where['where']['uid'] = $uid;
        }

        if(!empty($c_name)){
        	$where['like'] = array('key'=>'c_name','value'=>$c_name);
        }

		$list = $this->bussiness_ad->getList($where);
		$data['list'] = $list;

				//客户代表
		$account = array();
		$account = $this->get_account();
		$data['account'] = $account;

		$this->tpl('oa/advert_ad_tpl',$data);
	}

		//业务视图
	public function scene()
	{

		$page = isset($_GET['page']) ? $_GET['page'] : 0;
        $page = ($page && is_numeric($page)) ? intval($page) : 1;
        $start_time = isset($_GET['start_time']) ? $_GET['start_time'] : '';
        $end_time = isset($_GET['end_time']) ? $_GET['end_time'] : '';
        $data['start_time'] = $start_time;
        $data['end_time'] = $end_time;

        $uid = isset($_GET['uid']) ? $_GET['uid'] : 0;
        $data['uid'] = $uid;

        $is_member = isset($_GET['is_member']) ? $_GET['is_member'] : '';
        $data['is_member'] = $is_member;

        $c_name = isset($_GET['c_name']) ? $_GET['c_name'] : '';
        $data['c_name'] = $c_name;

        $limit = 20;
        $offset = ($page - 1) * $limit;
        $pagination = '';
                
        $countwhere = array('isdel'=>'0');
        $count = $this->bussiness_exhibition->get_count($countwhere);
        $data['count'] = $count;

        $pageconfig['base_url'] = base_url('/bussiness/scene?');
        $pageconfig['count'] = $count;
        $pageconfig['limit'] = $limit;
        $data['page'] = home_page($pageconfig);

		$list = array();
		
		$where['page'] = true;
        $where['limit'] = $limit;
        $where['offset'] = $offset;
        $where['where']['isdel'] = '0';
        $where['order'] = array('key'=>'id','value'=>'DESC');

        if(!empty($start_time)){
        	$s_time = strtotime($start_time);
        	$where['where']['show_time>='] = $s_time;
        	if(!empty($end_time)){
        		$e_time = strtotime($end_time);
        		$where['where']['show_time <='] = $e_time;
        	}
        }

        //客户代表
        if(!empty($uid)){
        	$where['where']['uid'] = $uid;
        }

        if(!empty($c_name)){
        	$where['like'] = array('key'=>'c_name','value'=>$c_name);
        }

		$list = $this->bussiness_exhibition->getList($where);
		$data['list'] = $list;

				//客户代表
		$account = array();
		$account = $this->get_account();
		$data['account'] = $account;

		$this->tpl('oa/advert_scene_tpl',$data);
		
	}


	private function get_account()
	{
			//客户代表
		$account = array();
		$where['where'] = array('isdel'=>'0');
		$account = $this->account->getList($where);

		return $account;
	}

	//企业
	private function get_customer()
	{
		$bussiness = array();
		$bussiness = $this->customer->getList();

		return $bussiness;
	}

}