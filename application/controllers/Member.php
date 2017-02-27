<?php


class Member extends Zrjoboa
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('District_mdl','district');
		$this->load->model('Member_mdl','member');
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
        $count = $this->member->get_count($countwhere);
        $data['count'] = $count;

        $pageconfig['base_url'] = base_url('/member/index?');
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
		$list = $this->member->getList($where);	
		$data['list'] = $list;

		$this->tpl('oa/member_list_tpl',$data);
	}

	public function website()
	{

		$userinfo = $this->userinfo;
		$page = isset($_GET['page']) ? $_GET['page'] : 0;
        $page = ($page && is_numeric($page)) ? intval($page) : 1;

        $limit = 20;
        $offset = ($page - 1) * $limit;
        $pagination = '';
                
        $countwhere = array('isdel'=>'0');
        $count = $this->member->get_count($countwhere);
        $data['count'] = $count;

        $pageconfig['base_url'] = base_url('/member/index?');
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
		$list = $this->member->getList($where);	
		$data['list'] = $list;

		$this->tpl('oa/member_list_tpl',$data);
	}

	//手动录入
	public function add_info()
	{

		$userinfo = $this->userinfo;
		if(!empty($_POST)){

			$realname = $this->input->post('realname');
			$sex = $this->input->post('sex');
			$age = $this->input->post('age');
			$education = $this->input->post('education');
			$province = $this->input->post('province');
			$city = $this->input->post('city');
			$phone = $this->input->post('phone');
			$webchat = $this->input->post('webchat');
			$email = $this->input->post('email');
			$id_card = $this->input->post('id_card');
			$intention = $this->input->post('intention');
			$email = $this->input->post('email');
			$household = $this->input->post('household');

			//省
			if(!empty($province)){
				$_province = array();
				$_province = explode('-', $province);
			}

			//市
			if(!empty($city)){
				$_city = array();
				$_city = explode('-', $city);
			}

			if(!empty($realname) && !empty($phone) && !empty($intention)){

				$add['realname'] = $realname;
				$add['sex'] = $sex;
				$add['age'] = $age;
				$add['education'] = $education;
				$add['province'] = $_province[0];
				$add['province_name'] = $_province[1];
				$add['city'] = $_city[0];
				$add['city_name'] = $_city[1];
				$add['webchat'] = $webchat;
				$add['email'] = $email;
				$add['phone'] = $phone;
				$add['id_card'] = $id_card;
				$add['intention'] = $intention;
				$add['company_id'] = $userinfo['company_id'];
				$add['household'] = $household;

				$add['addtime'] = time();
				if($this->member->add($add)){
					echo 'ok';
				}else{
					echo 'error';
				}

			}else{
				echo '缺少参数';
			}
		}else{

			$province = $this->get_province();
			$data['province'] = $province;

			$this->tpl('oa/member_add_info_tpl',$data);
		}


	}


	public function add_idcard()
	{
		$province = $this->get_province();
		$data['province'] = $province;
		$this->tpl('oa/member_add_idcard_tpl',$data);
	}

	//省份
	public function get_province()
	{
		$list = array();
		$where['where'] = array('parentid'=>'0');
		$list = $this->district->getList($where);

		return $list;
	}

	//城市
	public function get_city($id)
	{

		$list = array();

		if(!empty($id)){
			$where['where'] = array('parentid'=>$id);
			$list = $this->district->getList($where);
		}

		return $list;

	}

	public function get_city_select()
	{

		$id = $this->input->post('id');
		$now = isset($_POST['now']) ? $_POST['now'] : '';
		$city = array();
		$city = $this->get_city($id);
		$str = '';
		if(count($city) > 0){
			foreach($city as $k => $v){
				if($v['id'] == $now){
					$str .= '<option value=\''.$v['id'].':'.$v['categoryname'].'\'  selected>'.$v['categoryname'].'</option>';
				}else{
					$str .= '<option value=\''.$v['id'].':'.$v['categoryname'].'\'>'.$v['categoryname'].'</option>';

				}
			}
		}else{
			$str .= '<option value="0:无">=市=</option>';
		}

		$msg = array(
			'code'=>'0',
			'msg'=>'ok',
			'data'=>$str
			);
		echo json_encode($msg);

	}
}