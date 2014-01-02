<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class Widget extends Front_Controller {

    function __construct(){
		parent::__construct();
		
	}
    

    public function index(){
        $data["cur_nav"]="widget_index";
        $this->layout->view("widget/index",$data);
    }
    
    public function bigtable(){
        $sql="select a.*,b.host,b.port from mysql_widget_bigtable a,servers b where a.server_id=b.id order by a.table_size desc";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0)
		{
			$datalist=$query->result_array();
		}
        $data['datalist']=$datalist;
        $data["cur_nav"]="widget_bigtable";
        $this->layout->view("widget/bigtable",$data);
    }
    
   
    
}

/* End of file widget.php */
/* Location: ./application/controllers/widget.php */