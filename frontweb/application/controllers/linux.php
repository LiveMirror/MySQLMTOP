<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Linux extends Front_Controller {

    function __construct(){
		parent::__construct();
		$this->load->model("linux_model","linux");
        
	}
    
    
    public function index()
	{

        $data["datalist"]=$this->linux->get_total_record('linux_resource');
        $data["cur_nav"]="linux_index";
        $this->layout->view("linux/index",$data);
	}
    
}

/* End of file linux.php */
/* Location: ./application/controllers/linux.php */