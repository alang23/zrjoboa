<?php


class Setting extends Zrjoboa
{
	

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Setting_mdl','setting');
		$this->load->model('Company_mdl','company');
	}

	//邮箱设置
	public function email()
	{
		$userinfo = $this->userinfo;
		$data['userinfo'] = $userinfo;

		$this->tpl('oa/setting_email_tpl',$data);
	}

	//打印机设置
	public function prints()
	{
		$userinfo = $this->userinfo;
		
		if(!empty($_POST)){

			$canpiao = $this->input->post('canpiao');
			$pingju = $this->input->post('pingju');
			$works = $this->input->post('works');

			if($userinfo['company_id'] == '0'){
				$company_id = $this->input->post('company_id');
			}else{
				$company_id = $userinfo['company_id'];
			}

			//检查是否已经存在
			$c_config_p['where'] = array('tags'=>'pingju','company_id'=>$company_id);
			$check_info_p = $this->setting->get_one_by_where($c_config_p);
			if(empty($check_info_p)){

				$add_data['tags'] = 'pingju';
				$add_data['tag_v'] = $pingju;
				$add_data['company_id'] = $company_id;
				$add_data['addtime'] = time();
				$this->setting->add($add_data);
				
			}else{

				$config_p = array('tags'=>'pingju','company_id'=>$company_id);
				$updata_p = array('tag_v'=>$pingju);
				$this->setting->update($config_p,$updata_p);
				
			}
			
			$c_config_c['where'] = array('tags'=>'canpiao','company_id'=>$company_id);
			$check_info_c = $this->setting->get_one_by_where($c_config_c);
			if(empty($check_info_c)){

				$add_data['tags'] = 'canpiao';
				$add_data['tag_v'] = $canpiao;
				$add_data['company_id'] = $company_id;
				$add_data['addtime'] = time();
				$this->setting->add($add_data);

			}else{

				$config_c = array('tags'=>'canpiao','company_id'=>$company_id);
				$updata_c = array('tag_v'=>$canpiao);
				$this->setting->update($config_c,$updata_c);

			}

			$c_config_w['where'] = array('tags'=>'works','company_id'=>$company_id);
			$check_info_w = $this->setting->get_one_by_where($c_config_w);

			if(empty($check_info_w)){

				$add_data['tags'] = 'works';
				$add_data['tag_v'] = $works;
				$add_data['company_id'] = $company_id;
				$add_data['addtime'] = time();
				$this->setting->add($add_data);

			}else{

				$config_w = array('tags'=>'works','company_id'=>$company_id);
				$updata_w = array('tag_v'=>$works);
				$this->setting->update($config_w,$updata_w);

			}

			redirect('setting/prints');

		}else{

			$where['where_in'] = array('key'=>'tags','value'=>array('canpiao','pingju','works'));
			$where['where'] = array('company_id'=>$userinfo['company_id']);
			$list = array();
			$list = $this->setting->getList($where);
			$_tmp = array();

			if(count($list) > 0){
				foreach($list as $k => $v){
					$_tmp[$v['tags']] = $v;
				}
			}
			$data['info'] = $_tmp;
			
			$this->tpl('oa/setting_prints_tpl',$data);
		}

	}
}