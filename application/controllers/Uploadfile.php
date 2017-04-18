<?php


class Uploadfile extends Zrjoboa
{
	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('ad_type_mdl','ad_type');
		$this->load->model('ad_file_mdl','ad_file');
		$this->load->model('ad_file_result_mdl','ad_file_result');

		$this->load->model('bussiness_exhibition_mdl','bussiness_exhibition');
		$this->load->model('bussiness_ad_mdl','bussiness_ad');



	}

	public function index()
	{
		$id = $this->input->get('id');
		$bussiness_id = $this->input->get('bussiness_id');
		$type_id = $this->input->get('type_id');
		$role = $this->input->get('role');
		$data['id'] = $id;
		$data['bussiness_id'] = $bussiness_id;
		$data['type_id'] = $type_id;
		$data['role'] = $role;


		$where['where'] = array('bid'=>$id);
		$list = $this->ad_file->getList($where);
		$data['list'] = $list;

		$where2['where'] = array('bid'=>$id);
		$list2 = $this->ad_file_result->getList($where2);
		$data['list2'] = $list2;

		$this->tpl('oa/uploadfile_tpl',$data);
	}


		//上传文件
	public function do_upload()
	{
		$bussiness_id = $this->input->post('bussiness_id');
		$bid = $this->input->post('bid');
		$type_id = $this->input->post('type_id');
		$role = $this->input->post('role');


		if(!empty($_FILES['userfile']['name'])){
						if($type_id == '1'){

		                	$config['upload_path'] = FCPATH.'/uploads/ex/';
						}elseif($type_id == '2'){
							$config['upload_path'] = FCPATH.'/uploads/ad/';

						}else{
							exit('操作有误');
						}
		                
		                $config['allowed_types'] = '*';
		                $config['file_name']  =date("YmdHis");

		                $this->load->library('upload', $config);

		                if ( ! $this->upload->do_upload('userfile')){

		                    $error = array('error' => $this->upload->display_errors());
		                    echo json_encode($error);

		                }else{

		                    $data = array('upload_data' => $this->upload->data());
		                    $picname = $data['upload_data']['orig_name'];
		                    $dataarr['title'] = $picname;
		                	$dataarr['file'] = $picname;
		                    $dataarr['addtime'] = time();
		                    $dataarr['bussiness_id'] = $bussiness_id;
		                    $dataarr['bid'] = $bid;
		                    $dataarr['type_id'] = $type_id;	          

		                   if( $this->ad_file->add($dataarr) )
		                   {
		                   		
		                   		$upload_config = array('id'=>$bid);
		                   		$upload_data['is_upload'] = 1;
		                   		if($type_id == '1'){
		                   			$this->bussiness_exhibition->update($upload_config,$upload_data);

		                   		}elseif($type_id == '2'){
		                   			$this->bussiness_ad->update($upload_config,$upload_data);

		                   		}
		                   }
		    	}

		    	redirect('/uploadfile/index?id='.$bid.'&bussiness_id='.$bussiness_id.'&type_id='.$type_id);
		    	exit;

		}
	}

			//上传文件
	public function do_upload_result()
	{
		$bussiness_id = $this->input->post('bussiness_id');
		$bid = $this->input->post('bid');
		$type_id = $this->input->post('type_id');
		$role = $this->input->post('role');

		if(!empty($_FILES['userfile']['name'])){

						if($type_id == '1'){

							$config['upload_path'] = FCPATH.'/uploads/ex/';

						}elseif($type_id == '2'){

							$config['upload_path'] = FCPATH.'/uploads/ad/';

						}
		                
		                $config['allowed_types'] = '*';
		                $config['file_name']  =date("YmdHis");

		                $this->load->library('upload', $config);

		                if ( ! $this->upload->do_upload('userfile')){

		                    $error = array('error' => $this->upload->display_errors());
		                    echo json_encode($error);

		                }else{

		                    $data = array('upload_data' => $this->upload->data());
		                    $picname = $data['upload_data']['orig_name'];
		                    $dataarr['title'] = $picname;
		                	$dataarr['file'] = $picname;
		                    $dataarr['addtime'] = time();
		                    $dataarr['bussiness_id'] = $bussiness_id;
		                    $dataarr['bid'] = $bid;
		                    $dataarr['type_id'] = $type_id;	          

		                   if( $this->ad_file_result->add($dataarr) )
		                   {
		                   		
		                   		$upload_config = array('id'=>$bid);
		                   		$upload_data['is_finish'] = 1;
		                   		if($type_id == '1'){

		                   			$this->bussiness_exhibition->update($upload_config,$upload_data);


		                   		}elseif($type_id == '2'){

		                   			$this->bussiness_ad->update($upload_config,$upload_data);

		                   		}
		                   }
		    	}

		    	redirect('/uploadfile/index?id='.$bid.'&bussiness_id='.$bussiness_id);
		    	exit;

		}
	}

	


	public function del()
	{
		$id = $this->input->post('id');
		$config = array('id'=>$id);
		if($this->ad_file->del($config)){
			$msg = array(
				'code'=>'0',
				'msg'=>'ok'
				);
		}else{
			$msg = array(
				'code'=>'1',
				'msg'=>'删除成功',

				);
		}
		echo json_encode($msg);
		exit;
	}

	public function del_result()
	{
		$id = $this->input->post('id');
		$config = array('id'=>$id);
		if($this->ad_file_result->del($config)){
			$msg = array(
				'code'=>'0',
				'msg'=>'ok'
				);
		}else{
			$msg = array(
				'code'=>'1',
				'msg'=>'删除成功',

				);
		}
		echo json_encode($msg);
		exit;
	}


} 