<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Slowquery extends Front_Controller {
    function __construct(){
		parent::__construct();
	    $this->load->model('application_model','app');
        $this->load->model('servers_model','server');
        $this->load->model("option_model","option");
        $this->load->model("slowquery_model","slowquery");
	}
    
    public function index(){
        
        $data["datalist"]=$this->slowquery->get_total_record_slowquery();
        $data["server"]=$this->server->get_total_record_usage();
        $data["application"]=$this->app->get_total_record_usage();
        $data["cur_nav"]="slowquery_index";
        $this->layout->view("slowquery/index",$data);
    }
    
    public function detail(){
        $checksum=$this->uri->segment(3);
        $record = $this->slowquery->get_record_by_checksum($checksum);
		if(!$checksum || !$record){
			show_404();
		}
        else{
            $data['record']= $record;
        }
        //print_r($data['record']);
        $data["cur_nav"]="slowquery_index";
        $this->layout->view("slowquery/detail",$data);
    }
    
}

/* End of file slowquery.php */
/* Location: ./application/controllers/slowquery.php */