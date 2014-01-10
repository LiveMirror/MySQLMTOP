<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class User extends CI_Controller  {
    function __construct(){
	    parent::__construct();
        $this->load->model("user_model","user");
        $this->load->library('form_validation');
        
	}
    
    /*
	 * 用户登录
	 */
	public function login(){
		//检查是否已经登录，如果已登录直接跳转首页
		if( ($this->session->userdata('logged_in') == 1) ){
			redirect(base_url());
		}
		
		/*
		 * 提交登录后处理
		*/
		$data['error_code']=0;
		//判断是否是登录提交
		if(isset($_POST['login']) && $_POST['login']=='doing'){
			$this->form_validation->set_rules('username',  'lang:username', 'trim|required');
			$this->form_validation->set_rules('password',  'lang:password', 'trim|required|min_length[5]|max_length[18]');
			$this->form_validation->set_rules('captcha',  'lang:captcha', 'trim|required|numeric');
			if ($this->form_validation->run() == FALSE)
			{
				$data['error_code']='validation_error';
			}
			else
			{
				//检查验证码
				
				if(strcasecmp($this->input->post('captcha'),$this->session->userdata('login_captcha'))!=0)
				{
					$data['error_code']='captcha_error';
				}
				else{
					$user_data=$this->user->check_user();
					if(!$user_data){
						$data['error_code']='user_check_fail';
					}
					else{
						$data['error_code']=0;
						//更新登录信息
						$uid=$user_data['id'];
						$this->user->update_login($uid);
						//记录session
						$newdata = array(
								'uid'=>$user_data['id'],
								'login_count'     => $user_data['login_count'],
								'last_login_ip'     => $user_data['last_login_ip'],
								'last_login_time'     => $user_data['last_login_time'],
								'logged_in' => TRUE
						);
						$this->session->set_userdata($newdata);
						//登录成功,跳转至登录前页面
						redirect($this->input->post('return_url'));
					}	
				}
			}
		}
		
		/*
		 * 页面展示和输出部分
		*/
		//生成验证码
		$this->load->helper('captcha');
		$vals = array(
				'word' => rand(100000,1000000),
				'img_path' => './attachments/captcha/',
				'img_url' =>base_url()."attachments/captcha/",
				'img_width' => '100',
				'img_height' => '30',
				'expiration' => 7200
		);
		
		$cap = create_captcha($vals);
		$this->session->set_userdata('login_captcha',$cap['word']);//造验证码的时候要把word放到session里面。
		$data['captcha']=$cap['image'];
		$data['cur_nav']='user';
		$data['site_title']='用户登录';
	 	$data['return_url'] = isset($_GET['return_url']) ? $_GET['return_url'] : base_url();	 //登录后返回url
		$this->layout->view('user/login',$data);
		
	}
	
	public function logout(){
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('username');
		$this->session->sess_destroy();
		redirect(base_url());
	}
    
    /*
	 * 用户密码信息修改
	*/
	public function password(){
	
		$uid  = $this->session->userdata('uid');
		$data = $this->user->get_user_by_id($uid);
		if(!$uid || !$data){
			redirect(site_url());
		}
	
		/*
		 * 提交修改后处理
		*/
		$data['error_code']=0;
		$data['success_code']=0;
		if(isset($_POST['pwd']) && $_POST['pwd']=='doing'){
			$this->form_validation->set_rules('old_password',  'lang:old_password', 'trim|required');
			$this->form_validation->set_rules('new_password',  'lang:new_password', 'trim|required|min_length[5]|max_length[18]');
			$this->form_validation->set_rules('new_password_conf',  'lang:new_password_conf', 'trim|required|matches[new_password]');
			if ($this->form_validation->run() == FALSE)
			{
				$data['error_code']='validation_error';
			}
			else{
				//echo md5($this->input->post('old_password'));
				$check_pwd = $this->user->check_old_password($uid,$this->input->post('old_password'));
				if(!$check_pwd){
					$data['error_code']='old_password_fail';
				}
				else{
					$data['error_code']=0;
					//更新信息
					$data_new = array(
							'password'=>md5($this->input->post('new_password')),
					);
					$this->user->update($data_new,$uid);
					$data['success_code']='1';
					
				}
				
			}
		}
				
		$data['cur_nav']='user_password';
		$data['site_title']='修改密码';;
		$this->layout->view('user/password',$data);
	
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */