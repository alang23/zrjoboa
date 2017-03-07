<?php
/**
*@dec 广告位管理
*@author alang
**/

class Exhibition extends Zrjoboa
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Exhibition_mdl','exhibition');
		$this->load->model('Company_mdl','company');
	}


	public function index()
	{

		$userinfo = $this->userinfo;

		$page = isset($_GET['page']) ? $_GET['page'] : 0;
        $page = ($page && is_numeric($page)) ? intval($page) : 1;

        $limit = 20;
        $offset = ($page - 1) * $limit;
        $pagination = '';
                
        $countwhere = array('isdel'=>'0');
        $count = $this->exhibition->get_count($countwhere);
        $data['count'] = $count;

        $pageconfig['base_url'] = base_url('/exhibition/index?');
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

        $where['order'] = array('key'=>'id','value'=>'DESC');
		$list = $this->exhibition->getList($where);	
		$data['list'] = $list;


		$this->tpl('oa/exhibition_tpl',$data);

	}

	//添加广告位
	public function add()
	{
		$userinfo = $this->userinfo;
		$data['userinfo'] = $userinfo;
		if(!empty($_POST)){

			$ex_name = $this->input->post('ex_name');
			$remarks = $this->input->post('remarks');
			$company_id = $this->input->post('company_id');

			if($userinfo['company_id'] == '0'){
				$_company = explode('-', $company_id);
				$company_name = $_company[1];
				$company_id = $_company[0];
			}else{
				$config['where'] = array('id'=>$userinfo['company_id']);
				$_company = $this->company->get_one_by_where($config);
				$company_name = $_company['name'];
				$company_id = $userinfo['company_id'];
			}
			if(!empty($ex_name)){

				$add['company_id'] = $company_id;
				$add['company_name'] = $company_name;
				$add['remarks'] = $remarks;
				$add['ex_name'] = $ex_name;

				if($this->exhibition->add($add)){
					$msg['title'] = '添加成功';
					$msg['msg'] = '<a href="'.base_url().'exhibition/index">返回列表</a> | <a href="'.base_url().'exhibition/add">继续添加</a>';
					$this->tpl('msg/msg_success',$msg);
				}else{
					$msg['title'] = '修改失败';
					$msg['msg'] = '<a href="'.base_url().'exhibition/index">返回列表</a>';
					$this->tpl('msg/msg_errors',$msg);
				}
			}
		}else{

			if($userinfo['company_id'] == '0'){
				$company = $this->company->getList();
				$data['company'] = $company;

			}
			$this->load->view('oa/exhibition_add_tpl',$data);
		}

	}

	//更新
	public function edit()
	{
		$userinfo = $this->userinfo;
		$data['userinfo'] = $userinfo;

		if(!empty($_POST)){
			$ex_name = $this->input->post('ex_name');
			$id = $this->input->post('id');
			$remarks = $this->input->post('remarks');

			if(!empty($ex_name) && !empty($id)){
				$update_config = array('id'=>$id);
				$update_data['ex_name'] = $ad_name;
				$update_data['remarks'] = $remarks;
				if($this->exhibition->update($update_config,$update_data)){
					redirect('exhibition/index');
				}
			}
		}else{

			$id = $this->input->get('id');
			$where['where'] = array('id'=>$id);
			$info = array();
			$info = $this->exhibition->get_one_by_where($where);
			$data['info'] = $info;
			
			if($userinfo['company_id'] == '0'){
				$company = $this->company->getList();
				$data['company'] = $company;

			}
			$this->tpl('oa/exhibition_edit_tpl',$data);

		}
	}

	//删除
	public function del()
	{
		$id = $this->input->get('id');
		$config = array('id'=>$id);
		if($this->exhibition->del($config)){
			redirect('exhibition/index');
		}else{
			exit('0');
		}
	}
}

