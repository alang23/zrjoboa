<?php


class Member extends Zrjoboa
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('District_mdl','district');
		$this->load->model('Member_mdl','member');
		$this->load->library('Categorylib','categorylib');
		$this->load->model('Category_jobs_mdl','category_jobs');
		$this->load->model('Account_mdl','account');


	}


	public function index()
	{

		$userinfo = $this->userinfo;
		$page = isset($_GET['page']) ? $_GET['page'] : 0;
        $page = ($page && is_numeric($page)) ? intval($page) : 1;
        $realname = isset($_GET['realname']) ? $_GET['realname'] : '';
        $jobs_name = isset($_GET['jobs_name']) ? $_GET['jobs_name'] : '';
        $phone = isset($_GET['phone']) ? $_GET['phone'] : '';
        $intention = isset($_GET['intention']) ? $_GET['intention'] : '';
        $uid = isset($_GET['uid']) ? $_GET['uid'] : '-';
        $person_type = isset($_GET['person_type']) ? $_GET['person_type'] : '-';

        $data['realname'] = $realname;
        $data['phone'] = $phone;
        $data['jobs_name'] = $jobs_name;
        $data['intention'] = $intention;
		$data['uid'] = $uid;
		$data['person_type'] = $person_type;

        $limit = 20;
        $offset = ($page - 1) * $limit;
        $pagination = '';
                
        $countwhere['isdel'] = '0';
        $countlike = array();
        if(!empty($realname)){
        	$countlike = array('key'=>'realname','value'=>$realname);
        }

        if(!empty($intention)){
        	$countlike = array('key'=>'intention','value'=>$intention);
        }

        if(!empty($phone)){
        	$countlike = array('key'=>'phone','value'=>$phone);        	
        }

        if($uid != '-'){
        	$countwhere['uid'] = $uid;
        }

        if($person_type != '-'){
        	$countwhere['person_type'] = $person_type;
        }

        $count = $this->member->get_count($countwhere,$countlike);
        $data['count'] = $count;

        $pageconfig['base_url'] = base_url('/member/index?realname='.$realname.'&jobs_name='.$jobs_name.'&person_type='.$person_type.'&intention='.$intention.'&phone='.$phone.'&uid='.$uid);
        
        $pageconfig['count'] = $count;
        $pageconfig['limit'] = $limit;
        $data['page'] = home_page($pageconfig);

		$list = array();
		$where['page'] = true;
        $where['limit'] = $limit;
        $where['offset'] = $offset;
        $where['where']['isdel'] = '0';
        if($userinfo['company_id'] != '0'){
        	$where['where']['company_id'] = $userinfo['company_id'];
        }
        if(!empty($realname)){
        	$where['like'] = array('key'=>'realname','value'=>$realname);
        }

        if(!empty($intention)){
        	$where['like'] = array('key'=>'intention','value'=>$intention);
        }

        if(!empty($phone)){
        	$where['like'] = array('key'=>'phone','value'=>$phone);        	
        }


        if($person_type != '-'){
        	$where['where']['person_type'] = $person_type;
        }

        if($uid != '-'){
        	$where['where']['uid'] = $uid;
        }
       // print_r($where);
        
        $where['order'] = array('key'=>'id','value'=>'DESC');
		$list = $this->member->getList($where);	
		$data['list'] = $list;

		//客户代表
				//客户代表
		$account = array();
		$c_where['where']['isdel'] = '0';
		if( !empty($userinfo['company_id']) ){
			$c_where['where']['company_id'] = $userinfo['company_id'];
		}

		$account = $this->get_account($c_where);
		$data['account'] = $account;

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

/**
        用户基本信息
        $data['utype'] = 2;
        $data['mobile_audit'] = 1;
        $data['username'] = '13800138000';
        $data['mobile'] = '13800138000';
        $data['password'] = '123456';

        //简历基本信息
        $post['display_name'] = '1';
        $post['sex'] = 1;
        $post['birthdate'] = '1983';
        $post['education'] = '66';
        $post['major'] = '0';
        $post['experience'] = '78';
        $post['email_notify'] = '';
        $post['height'] = '180';
        $post['marriage'] = '1';
        $post['nature'] = '63';
        $post['current'] = '242';
        $post['wage'] = '61';
        $post['fullname'] = '蓝先生';
        $post['householdaddress'] = '广东';
        $post['intention_jobs'] = '';
        $post['intention_jobs_id'] = '';
        $post['telephone'] = '';
        $post['district'] = '';
        $post['title'] = '我的简历';
        $post['residence'] = '深圳';
        $post['email'] = 'test@163.com';
        $post['trade'] = '2';

***/
	//手动录入
	public function add_info()
	{

		$userinfo = $this->userinfo;
		if(!empty($_POST)){

			$realname = $this->input->post('realname');
			$sex = $this->input->post('sex');
			
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
			$height = $this->input->post('height');
			$experience = $this->input->post('experience');
			$wage = $this->input->post('wage');
			$person_type = $this->input->post('person_type');
			$birthday = $this->input->post('birthday');


			//省
			if(!empty($province)){
				$_province = array();
				$_province = explode(':', $province);
			}

			//市
			if(!empty($education)){
				$_education = array();
				$_education = explode(':', $education);
			}

						//市
			if(!empty($city)){
				$_city = array();
				$_city = explode(':', $city);
			}

									//市
			if(!empty($experience)){
				$_experience = array();
				$_experience = explode(':', $experience);
			}
									//市
			if(!empty($wage)){
				$_wage= array();
				$_wage = explode(':', $wage);
			}

			if(!empty($intention)){
				$where['like'] = array('key'=>'categoryname','value'=>$intention);
				$info = $this->category_jobs->get_one_by_where($where);
				if(!empty($info)){
					$resume['intention_jobs'] = $info['categoryname'];
					$resume['intention_jobs_id'] = $info['id'];
				}
				
			}
			
			if(!empty($realname) && !empty($phone) && !empty($intention)){

				$add['realname'] = $realname;
				$add['sex'] = $sex;
				$add['education'] = $_education[0];
				$add['education_cn'] = $_education[1];
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
				$add['experience'] = $_experience[0];
				$add['experience_cn'] = $_experience[1];
				$add['wage'] = $_wage[0];
				$add['wage_cn'] = $_wage[1];
				$add['person_type'] = $person_type;
				$add['uid'] = $userinfo['id'];
				$add['u_name'] = $userinfo['realname'];
				$add['birthday'] = $birthday;

				if(!empty($intention)){
					$where['like'] = array('key'=>'categoryname','value'=>$intention);
					$info = $this->category_jobs->get_one_by_where($where);
					if(!empty($info)){
						$resume['intention_jobs'] = $info['categoryname'];
						if(!empty($info['parentid'])){
							$p_where['where'] = array('id'=>$info['parentid']);
							$p_info = $this->category_jobs->get_one_by_where($p_where);
							$int_id = $p_info['parentid'].','.$p_info['id'].','.$info['id'];
						}
						$resume['intention_jobs_id'] = $int_id;
					}
				
				}

				$add['addtime'] = time();
				if($this->member->add($add)){

						//同步网站
						$post['username'] = $add['phone'];
						$post['mobile'] = $add['phone'];
						$post['password'] = '123456';
						$post_data = json_encode($post);
						$post_parant = 'data='.$post_data;
						$respost = request_post('http://www.jjrzzr.com/index.php?m=Apis&c=index&a=register',$post_parant);

						$res_arr = json_decode($respost,true);
						$user_arr = $res_arr['data'];

						if($user_arr){
							//添加简历
							$resume['uid'] = $user_arr['uid'];
							$resume['mobile'] = $add['phone'];
							$resume['fullname'] = $realname;
							$resume['sex'] = $sex;
							$resume['householdaddress'] = $household;
							$resume['residence'] = $_province[1];
							$resume['education'] = $_education[0];
							$resume['height'] = $height;
							$resume['wage'] = $_wage[0];
							$resume['wage'] = $_wage[0];
							$resume['birthday'] = $birthday;
							$resume['experience'] = $_experience[0];

							$post_data = json_encode($resume);
							$post_parant = 'data='.$post_data;
							$resume_respost = request_post('http://www.jjrzzr.com/index.php?m=Apis&c=index&a=add_resume',$post_parant);
							if(!empty($resume_respost)){
								$resume_arr = json_decode($resume_respost,true);
								if($resume_arr['data']['state'] == '0'){
									
									$resume_err = $resume_arr['data']['error'];

								}else{
									//exit('创建简历成功');
									$resume_err = '创建简历成功';
								}
							}
						}else{
							//exit("同步网站失败");
							$resume_err  = '同步网站失败，账号已经存在';
						}
						
						$msg['title'] = '添加成功'.'--'.$resume_err;
						$msg['msg'] = '<a href="'.base_url().'member/index">返回列表</a> | <a href="'.base_url().'member/add_ex">继续添加</a>';
						$this->tpl('msg/msg_success',$msg);				
				}else{
					$msg['title'] = '添加失败';
					$msg['msg'] = '<a href="'.base_url().'member/index">返回列表</a>';
					$this->tpl('msg/msg_errors',$msg);

				}

			}else{
					$msg['title'] = '添加失败,缺少必要蚕食';
					$msg['msg'] = '<a href="'.base_url().'member/index">返回列表</a>';
					$this->tpl('msg/msg_errors',$msg);

			}
		}else{

			$province = $this->get_province();
			$data['province'] = $province;

			//学历
			$education = array();
			$key = 'QS_education';
			$education = $this->categorylib->get_category($key);
			$data['education'] = $education;

			//工作经验
			$experience = array();
			$key = 'QS_experience';
			$experience = $this->categorylib->get_category($key);
			$data['experience'] = $experience;

						//工作经验
			$wage = array();
			$key = 'QS_wage';
			$wage = $this->categorylib->get_category($key);
			$data['wage'] = $wage;

			$this->tpl('oa/member_add_info_tpl',$data);
		}


	}


	public function add_idcard()
	{
		$userinfo = $this->userinfo;
		//print_r($userinfo);
		if(!empty($_POST)){

			$realname = $this->input->post('txtw_name');
			$sex = $this->input->post('txtw_sex');
			
			$person_type = $this->input->post('person_type');
			$province = $this->input->post('province');
			$city = $this->input->post('city');
			$phone = $this->input->post('phone');
			$webchat = $this->input->post('webchat');
			$email = $this->input->post('email');
			$id_card = $this->input->post('txtw_card_number');
			$intention = $this->input->post('intention');
			$email = $this->input->post('email');
			$household = $this->input->post('txtw_native_place');
			$height = $this->input->post('height');
			$experience = $this->input->post('experience');
			$wage = $this->input->post('wage');
			$birthday = $this->input->post('txtw_birthday');
			$education = $this->input->post('education');
			$province = $this->input->post('province');
			$city = $this->input->post('city');

			//省
			if(!empty($province)){
				$_province = array();
				$_province = explode(':', $province);
			}

			//市
			if(!empty($education)){
				$_education = array();
				$_education = explode(':', $education);
			}

						//市
			if(!empty($city)){
				$_city = array();
				$_city = explode(':', $city);
			}

									//市
			if(!empty($experience)){
				$_experience = array();
				$_experience = explode(':', $experience);
			}
									//市
			if(!empty($wage)){
				$_wage= array();
				$_wage = explode(':', $wage);
			}

			if(!empty($intention)){
				$where['like'] = array('key'=>'categoryname','value'=>$intention);
				$info = $this->category_jobs->get_one_by_where($where);
				if(!empty($info)){
					$resume['intention_jobs'] = $info['categoryname'];
					if(!empty($info['parentid'])){
						$p_where['where'] = array('id'=>$info['parentid']);
						$p_info = $this->category_jobs->get_one_by_where($p_where);
						$int_id = $p_info['parentid'].','.$p_info['id'].','.$info['id'];
					}
					$resume['intention_jobs_id'] = $int_id;
				}
				
			}
			
			if(!empty($realname) && !empty($phone) && !empty($intention)){

				$add['realname'] = $realname;
				$add['sex'] = $sex;
				$add['education'] = $_education[0];
				$add['education_cn'] = $_education[1];
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
				$add['experience'] = $_experience[0];
				$add['experience_cn'] = $_experience[1];
				$add['wage'] = $_wage[0];
				$add['wage_cn'] = $_wage[1];
				$add['person_type'] = $person_type;
				$add['uid'] = $userinfo['id'];
				$add['u_name'] = $userinfo['realname'];
				$add['birthday'] = $birthday;

				$add['addtime'] = time();
				if($this->member->add($add)){

						//同步网站
						$post['username'] = $add['phone'];
						$post['mobile'] = $add['phone'];
						$post['password'] = '123456';
						$post_data = json_encode($post);
						$post_parant = 'data='.$post_data;
						$respost = request_post('http://www.jjrzzr.com/index.php?m=Apis&c=index&a=register',$post_parant);

						$res_arr = json_decode($respost,true);
						$user_arr = $res_arr['data'];

						if($user_arr){
							//添加简历
							$resume['uid'] = $user_arr['uid'];
							$resume['mobile'] = $add['phone'];
							$resume['fullname'] = $realname;
							$resume['sex'] = $sex;
							$resume['householdaddress'] = $household;
							$resume['residence'] = $_province[1];
							$resume['education'] = $_education[0];
							$resume['height'] = $height;
							$resume['wage'] = $_wage[0];
							$resume['birthday'] = $birthday;
							$resume['experience'] = $_experience[0];

							$post_data = json_encode($resume);
							$post_parant = 'data='.$post_data;
							$resume_respost = request_post('http://www.jjrzzr.com/index.php?m=Apis&c=index&a=add_resume',$post_parant);
							if(!empty($resume_respost)){
								$resume_arr = json_decode($resume_respost,true);
								if($resume_arr['data']['state'] == '0'){
									//exit($resume_arr['data']['error']);
									$resume_err = $resume_arr['data']['error'];

								}else{
									//exit('创建简历成功');
									$resume_err = '创建简历成功';
								}
							}
						}else{
							//exit("同步网站失败");
							$resume_err  = '同步网站失败，账号已经存在';
						}
						
						$msg['title'] = '添加成功'.'--'.$resume_err;
						$msg['msg'] = '<a href="'.base_url().'member/index">返回列表</a> | <a href="'.base_url().'member/add_ex">继续添加</a>';
						$this->tpl('msg/msg_success',$msg);				
				}else{
					
					$msg['title'] = '添加失败';
					$msg['msg'] = '<a href="'.base_url().'member/index">返回列表</a>';
					$this->tpl('msg/msg_errors',$msg);

				}

			}else{
					
					$msg['title'] = '添加失败,缺少必要蚕食';
					$msg['msg'] = '<a href="'.base_url().'member/index">返回列表</a>';
					$this->tpl('msg/msg_errors',$msg);

			}		



		}else{

			$province = $this->get_province();
			$data['province'] = $province;

			//学历
			$education = array();
			$key = 'QS_education';
			$education = $this->categorylib->get_category($key);
			$data['education'] = $education;

			//工作经验
			$experience = array();
			$key = 'QS_experience';
			$experience = $this->categorylib->get_category($key);
			$data['experience'] = $experience;

						//工作经验
			$wage = array();
			$key = 'QS_wage';
			$wage = $this->categorylib->get_category($key);
			$data['wage'] = $wage;

			$this->tpl('oa/member_add_idcard_tpl',$data);
		}

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

	public function edit()
	{

		$userinfo = $this->userinfo;
		if(!empty($_POST)){

			$realname = $this->input->post('realname');
			$sex = $this->input->post('sex');
			//$age = $this->input->post('age');
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
			$id = $this->input->post('id');
			$person_type = $this->input->post('person_type');

			//省
			if(!empty($province)){
				$_province = array();
				$_province = explode(':', $province);
			}

			//市
			if(!empty($education)){
				$_education = array();
				$_education = explode(':', $education);
			}

						//市
			if(!empty($city)){
				$_city = array();
				$_city = explode(':', $city);
			}


			if(!empty($realname) && !empty($phone) && !empty($intention)){

				$add['realname'] = $realname;
				$add['sex'] = $sex;
				//$add['age'] = $age;
				$add['education'] = $_education[0];
				$add['education_cn'] = $_education[1];
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
				$add['person_type'] = $person_type;

				$update_config = array('id'=>$id);

				if($this->member->update($update_config,$add)){
						$msg['title'] = '修改成功';
						$msg['msg'] = '<a href="'.base_url().'member/index">返回列表</a> ';
						$this->tpl('msg/msg_success',$msg);				
				}else{
					$msg['title'] = '添加失败';
					$msg['msg'] = '<a href="'.base_url().'member/index">返回列表</a>';
					$this->tpl('msg/msg_errors',$msg);

				}

			}else{
					$msg['title'] = '添加失败,缺少必要参数';
					$msg['msg'] = '<a href="'.base_url().'member/index">返回列表</a>';
					$this->tpl('msg/msg_errors',$msg);

			}
		}else{

			$id = $this->input->get('id');
			$where['where'] = array('id'=>$id);
			$info = $this->member->get_one_by_where($where);
			$data['info'] = $info;

			$province = $this->get_province();
			$data['province'] = $province;

			//学历
			$education = array();
			$key = 'QS_education';
			$education = $this->categorylib->get_category($key);
			$data['education'] = $education;

			//工作经验
			$experience = array();
			$key = 'QS_experience';
			$experience = $this->categorylib->get_category($key);
			$data['experience'] = $experience;

						//工作经验
			$wage = array();
			$key = 'QS_wage';
			$wage = $this->categorylib->get_category($key);
			$data['wage'] = $wage;

			$this->tpl('oa/member_edit_info_tpl',$data);
		}
	}

	public function check_phone()
	{
		$phone = $this->input->post('phone');
		//$phone = '13800138000';
		$where['where'] = array('phone'=>$phone);
		$info = $this->member->get_one_by_where($where);
		$msg = array(
				'code'=>'0',
				'msg'=>'ok'
				);

		if(!empty($info)){
			$msg = array(
				'code'=>'1',
				'msg'=>'该电话号码已经存在'
				);
		}

		echo json_encode($msg);
		exit;

	}

	//删除
	public function del()
	{
		$id = $this->input->get('id');
		$update_config = array('id'=>$id);
		$update_data['isdel'] = 1;

		if($this->member->update($update_config,$update_data)){
			redirect('member/index');
		}



	}

		private function get_account($where = array())
	{
			//客户代表
		$account = array();
		$account = $this->account->getList($where);

		return $account;
	}
}