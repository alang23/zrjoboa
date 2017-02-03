<?php


class Company extends Zrjoboa
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('company_mdl','company');
	}


	public function index()
	{

		$page = isset($_GET['page']) ? $_GET['page'] : 0;
        $page = ($page && is_numeric($page)) ? intval($page) : 1;

        $name = isset($_GET['name']) ? $_GET['name'] : '';
        $phone = isset($_GET['phone']) ? $_GET['phone'] : '';
        $contacts = isset($_GET['contacts']) ? $_GET['contacts'] : '';
        $data['name'] = $name;
        $data['phone'] = $phone;
        $data['contacts'] = $contacts;

        $limit = 20;
        $offset = ($page - 1) * $limit;
        $pagination = '';
                
        $countwhere = array('isdel'=>'0');
        $count = $this->company->get_count($countwhere);
        $data['count'] = $count;

        $pageconfig['base_url'] = base_url('/company/index?');
        $pageconfig['count'] = $count;
        $pageconfig['limit'] = $limit;
        $data['page'] = home_page($pageconfig);

		$list = array();
		$where['page'] = true;
        $where['limit'] = $limit;
        $where['offset'] = $offset;
        $where['where']['isdel'] = '0';
        if(!empty($name)){
        	$where['like'] = array('key'=>'name','value'=>$name);
        }
        if(!empty($contacts)){
        	$where['where']['contacts'] = $contacts;
        }
        if(!empty($phone)){
        	$where['where']['phone'] = $phone;
        }
        $where['order'] = array('key'=>'id','value'=>'DESC');
		$list = $this->company->getList($where);
		
		$data['list'] = $list;
		$this->tpl('company_tpl',$data);

	}

	public function add()
	{
		if(!empty($_POST)){

			$name = $this->input->post('name');
			$address = $this->input->post('address');
			$contacts = $this->input->post('contacts');
			$phone = $this->input->post('phone');
			$email = $this->input->post('email');
			$remark = $this->input->post('remark');

			if(!empty($name) && !empty($address) && !empty($contacts) && !empty($phone)){

				$add['name'] = $name;
				$add['address'] = $address;
				$add['contacts'] = $contacts;
				$add['phone'] = $phone;
				$add['email'] = $email;
				$add['remark'] = $remark;
				$add['addtime'] = time();
				
				if($this->company->add($add)){

					$msg['title'] = '添加成功';
					$msg['msg'] = '<a href="'.base_url().'company/index">返回列表</a>';
					redirect('msgtips/success');

				}else{
					exit('error');
				}
			}else{
				exit('canshu');
			}

		}else{
			$this->tpl('company_add_tpl');
		}
		
	}

	public function edit()
	{
		if(!empty($_POST)){

			$name = $this->input->post('name');
			$address = $this->input->post('address');
			$contacts = $this->input->post('contacts');
			$phone = $this->input->post('phone');
			$email = $this->input->post('email');
			$remark = $this->input->post('remark');
			$id = $this->input->post('id');

			if(!empty($name) && !empty($address) && !empty($contacts) && !empty($phone) && !empty($id)){

				$update_data['name'] = $name;
				$update_data['address'] = $address;
				$update_data['contacts'] = $contacts;
				$update_data['phone'] = $phone;
				$update_data['email'] = $email;
				$update_data['remark'] = $remark;

				$update_config = array('id'=>$id);
				if($this->company->update($update_config,$update_data)){
					exit('ok');
				}else{
					exit('error');
				}
			}else{
				exit('canshu');
			}

		}else{

			$id = $this->input->get('id');

			$where['where'] = array('id'=>$id);
			$info = $this->company->get_one_by_where($where);
			$data['info'] = $info;

			$this->tpl('oa/company_edit_tpl',$data);
		}
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


}




