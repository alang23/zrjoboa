<?php


class Login_log extends Zrjoboa
{
	


	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_log_mdl','login_log');
	}


	public function index()
	{

		$check_role = $this->userlib->check_role('log_login');

		$page = isset($_GET['page']) ? $_GET['page'] : 0;
        $page = ($page && is_numeric($page)) ? intval($page) : 1;

        $limit = 20;
        $offset = ($page - 1) * $limit;
        $pagination = '';
                     
        $count = $this->login_log->get_count();
        $data['count'] = $count;

        $pageconfig['base_url'] = base_url('/login_log/index?');
        $pageconfig['count'] = $count;
        $pageconfig['limit'] = $limit;
        $data['page'] = home_page($pageconfig);

		$list = array();
		$where['page'] = true;
        $where['limit'] = $limit;
        $where['offset'] = $offset;

        $where['order'] = array('key'=>'id','value'=>'DESC');
		$list = $this->login_log->getList($where);
		
		$data['list'] = $list;
		$this->tpl('oa/login_log',$data);
	}

}