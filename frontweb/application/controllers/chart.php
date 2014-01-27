<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Chart extends Front_Controller {

    function __construct(){
		parent::__construct();
		$this->load->model("monitor_model","monitor");
        $this->load->model('application_model','app');
        $this->load->model('servers_model','server');
        
	}

    
    public function index(){

        $data["server"]=$this->server->get_total_record_usage();
        $data['cur_nav']='chart_index';
        $this->layout->view('chart/index',$data);
    }
    
    public function detail(){

        $server_id=$this->uri->segment(3);
        if(!$server_id){
            $server_id=$_GET['server_id'];
            $time=$_GET['time'];
        }
        
        
        
        //echo $server_id;exit;
        if(empty($server_id)){
            redirect(site_url('chart/index'));
        }
        if(empty($time)){
            $time=3600;
        }
        $data["server"]=$this->server->get_total_record_usage();
        $data["server_id"]=$server_id;
        $data["time"]=$time;
        $data['cur_nav']='chart_index';
        $this->layout->view('chart/detail',$data);
    }
    
}

/* End of file chart.php */
/* Location: ./application/controllers/chart.php */