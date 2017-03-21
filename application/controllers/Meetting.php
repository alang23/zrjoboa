<?php


class Meetting extends Zrjoboa
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Meetting_mdl','meetting');
	}


	public function index()
	{

		//$check_role = $this->userlib->check_role('company_list');
		
		$page = isset($_GET['page']) ? $_GET['page'] : 0;
        $page = ($page && is_numeric($page)) ? intval($page) : 1;

        $limit = 20;
        $offset = ($page - 1) * $limit;
        $pagination = '';
                
        $countwhere = array('isdel'=>'0');
        $count = $this->meetting->get_count($countwhere);
        $data['count'] = $count;

        $pageconfig['base_url'] = base_url('/meetting/index?');
        $pageconfig['count'] = $count;
        $pageconfig['limit'] = $limit;
        $data['page'] = home_page($pageconfig);

		$list = array();
		$where['page'] = true;
        $where['limit'] = $limit;
        $where['offset'] = $offset;
        $where['where']['isdel'] = '0';
 
        $where['order'] = array('key'=>'id','value'=>'DESC');
		$list = $this->meetting->getList($where);
		
		$data['list'] = $list;
		$this->tpl('oa/meetting_tpl',$data);

	}

	public function add()
	{
		$userinfo = $this->userinfo;

		if(!empty($_POST)){

			$title = $this->input->post('title');
			$presenter = $this->input->post('presenter');
			$members = $this->input->post('members');
			$day = $this->input->post('day');
			$address = $this->input->post('address');
			$content = $this->input->post('content');
			$m_type = $this->input->post('m_type');

			if(!empty($title) && !empty($presenter) && !empty($day) && !empty($content)){

				$add['title'] = $title;
				$add['presenter'] = $presenter;
				$add['company_id'] = $userinfo['company_id'];
				$add['members'] = $members;
				$add['day'] = strtotime($day);
				$add['address'] = $address;
				$add['content'] = $content;
				$add['uid'] = $userinfo['id'];
				$add['addtime'] = time();
				$add['m_type'] = $m_type;
				
				if($this->meetting->add($add)){

					$msg['title'] = '添加成功';
					$msg['msg'] = '<a href="'.base_url().'meetting/index">返回列表</a> | <a href="'.base_url().'meetting/add">继续添加</a>';
					$this->tpl('msg/msg_success',$msg);

				}else{
					exit('error');
				}
			}else{
				exit('canshu');
			}

		}else{
			$this->tpl('oa/meetting_add_tpl');
		}
		
	}

	public function edit()
	{
		$userinfo = $this->userinfo;

		if(!empty($_POST)){

			$title = $this->input->post('title');
			$presenter = $this->input->post('presenter');
			$members = $this->input->post('members');
			$day = $this->input->post('day');
			$address = $this->input->post('address');
			$content = $this->input->post('content');
			$m_type = $this->input->post('m_type');
			$id = $this->input->post('id');

			if(!empty($title) && !empty($presenter) && !empty($day) && !empty($content)){

				$add['title'] = $title;
				$add['presenter'] = $presenter;
				$add['company_id'] = $userinfo['company_id'];
				$add['members'] = $members;
				$add['day'] = strtotime($day);
				$add['address'] = $address;
				$add['content'] = $content;
				$add['m_type'] = $m_type;

				$update_config = array('id'=>$id);

				if($this->meetting->update($update_config,$add)){

					$msg['title'] = '修改成功';
					$msg['msg'] = '<a href="'.base_url().'meetting/index">返回列表</a> | <a href="'.base_url().'meetting/add">继续添加</a>';
					$this->tpl('msg/msg_success',$msg);

				}else{
					exit('error');
				}
			}else{
				exit('canshu');
			}

		}else{

			$id = $this->input->get('id');
			$where['where'] = array('id'=>$id);
			$info = $this->meetting->get_one_by_where($where);
			$data['info'] = $info;

			$this->tpl('oa/meetting_edit_tpl',$data);
		}
	}

	public function del()
	{
		$id = $this->input->get('id');
		$del_config = array('id'=>$id);
		$del_data['isdel'] = 1;
		if($this->meetting->update($del_config,$del_data)){
			echo 'ok';
		}else{
			echo 'err';
		}
	}

	public function detail()
	{
		$id = $this->input->get('id');
		$where['where'] = array('id'=>$id);

		$info = $this->meetting->get_one_by_where($where);
		$data['info'] = $info;

		$this->tpl('oa/meetting_detail_tpl',$data);
	}


}




