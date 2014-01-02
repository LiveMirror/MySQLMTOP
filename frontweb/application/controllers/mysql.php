<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class MySQL extends Front_Controller {

    function __construct(){
		parent::__construct();
		$this->load->model("mysql_model","mysql");
        $this->load->model('application_model','app');
        $this->load->model('servers_model','server');
        
	}
    

	public function status()
	{
        !empty($_GET["application"]) && $this->db->where("application", $_GET["application"]);
        !empty($_GET["server_id"]) && $this->db->where("a.server_id", $_GET["server_id"]);
        !empty($_GET["connect"]) && $this->db->where("connect", $_GET["connect"]);
        !empty($_GET["connections"]) && $this->db->where("connections >", (int)$_GET["connections"]);
        !empty($_GET["active"]) && $this->db->where("active >", (int)$_GET["active"]);
        if(!empty($_GET["order"]) && !empty($_GET["order_type"])){
            $this->db->order_by($_GET["order"],$_GET["order_type"]);
        }
        else{
            $this->db->order_by('application asc');
        }
        $data["datalist"]=$this->mysql->get_total_record_status();

        $setval["application"]=isset($_GET["application"]) ? $_GET["application"] : "";
        $setval["server_id"]=isset($_GET["server_id"]) ? $_GET["server_id"] : "";
        $setval["connect"]=isset($_GET["connect"]) ? $_GET["connect"] : "";
        $setval["connections"]=isset($_GET["connections"]) ? $_GET["connections"] : "";
        $setval["active"]=isset($_GET["active"]) ? $_GET["active"] : "";
        $setval["order"]=isset($_GET["order"]) ? $_GET["order"] : "";
        $setval["order_type"]=isset($_GET["order_type"]) ? $_GET["order_type"] : "";
        $data["setval"]=$setval;
        
        $data["server"]=$this->server->get_total_record_usage();
        $data["application"]=$this->app->get_total_record_usage();
        $data["cur_nav"]="mysql_status";
        $this->layout->view("mysql/status",$data);
	}
    
   	
    public function replication()
	{
        !empty($_GET["application"]) && $this->db->where("application", $_GET["application"]);
        !empty($_GET["server_id"]) && $this->db->where("server_id", $_GET["server_id"]);
        if(!empty($_GET["role"]) ){
            $this->db->where($_GET["role"], 1);
        }
        !empty($_GET["delay"]) && $this->db->where("delay >", (int)$_GET["delay"]);
        if(!empty($_GET["order"]) && !empty($_GET["order_type"])){
            $this->db->order_by($_GET["order"],$_GET["order_type"]);
        }
        
        $datalist=$this->mysql->get_total_record('mysql_replication');
        if(empty($_GET["search"])){
            $datalist = get_replication_tree($datalist);
        }
        
        //print_r($result);exit;
        
        $setval["application"]=isset($_GET["application"]) ? $_GET["application"] : "";
        $setval["server_id"]=isset($_GET["server_id"]) ? $_GET["server_id"] : "";
        $setval["role"]=isset($_GET["role"]) ? $_GET["role"] : "";
        $setval["delay"]=isset($_GET["delay"]) ? $_GET["delay"] : "";
        $setval["order"]=isset($_GET["order"]) ? $_GET["order"] : "";
        $setval["order_type"]=isset($_GET["order_type"]) ? $_GET["order_type"] : "";
        $data["setval"]=$setval;
        
        $data["server"]=$this->server->get_total_record_usage();
        $data["application"]=$this->app->get_total_record_usage();
        
        
        $data['datalist']=$datalist;
        
        $data["cur_nav"]="mysql_replication";
        $this->layout->view("mysql/replication",$data);
	}
    
   	public function query()
	{
	   
        !empty($_GET["application"]) && $this->db->where("application", $_GET["application"]);
        !empty($_GET["server_id"]) && $this->db->where("server_id", $_GET["server_id"]);
        !empty($_GET["query_sql"]) && $this->db->like("query_sql", $_GET["query_sql"]);
        !empty($_GET["query_time"]) && $this->db->where("query_time >", (int)$_GET["query_time"]);
        $stime = !empty($_GET["stime"])? $_GET["stime"]: date('Y-m-d H:i',time()-3600);
        $etime = !empty($_GET["etime"])? $_GET["etime"]: date('Y-m-d H:i',time());
        $this->db->where("create_time >=", $stime);
        $this->db->where("create_time <=", $etime);
        $this->db->group_by("query_sql");
        
        if(!empty($_GET["stime"])){
            $current_url= 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        }
        else{
            $current_url= 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'?noparam=1';
        }
        
        //分页
		$this->load->library('pagination');
		$config['base_url'] = $current_url;
		$config['total_rows'] = $this->mysql->get_total_rows('mysql_slow_query');
		$config['per_page'] = 50;
		$config['num_links'] = 5;
		$config['page_query_string'] = TRUE;
		$config['use_page_numbers'] = TRUE;
		$this->pagination->initialize($config);
		$offset = !empty($_GET['per_page']) ? $_GET['per_page'] : 1;
        
        !empty($_GET["application"]) && $this->db->like("application", $_GET["application"]);
        !empty($_GET["query_sql"]) && $this->db->like("query_sql", $_GET["query_sql"]);
        !empty($_GET["server_id"]) && $this->db->like("server_id", $_GET["server_id"]);
        !empty($_GET["query_time"]) && $this->db->where("query_time >", (int)$_GET["query_time"]);
        $stime = !empty($_GET["stime"])? $_GET["stime"]: date('Y-m-d H:i',time()-3600);
        $etime = !empty($_GET["etime"])? $_GET["etime"]: date('Y-m-d H:i',time());
        $this->db->where("create_time >=", $stime);
        $this->db->where("create_time <=", $etime);
        $this->db->group_by("query_sql");
        $this->db->order_by("id", "desc");
        
		$data['datalist'] = $this->mysql->get_total_record_paging('mysql_slow_query',$config['per_page'],($offset-1)*$config['per_page']);
        
        $setval["application"]=isset($_GET["application"]) ? $_GET["application"] : "";
        $setval["query_sql"]=isset($_GET["query_sql"]) ? $_GET["query_sql"] : "";
        $setval["server_id"]=isset($_GET["server_id"]) ? $_GET["server_id"] : "";
        $setval["query_time"]=isset($_GET["query_time"]) ? $_GET["query_time"] : "";
        $setval["stime"]=$stime;
        $setval["etime"]=$etime;
        $data["setval"]=$setval;
        
        $data["server"]=$this->server->get_total_record_usage();
        $data["application"]=$this->app->get_total_record_usage();
        
        $data["cur_nav"]="mysql_query";
        $this->layout->view("mysql/query",$data);
	}
    
    public function performance()
	{
        !empty($_GET["application"]) && $this->db->where("application", $_GET["application"]);
        !empty($_GET["server_id"]) && $this->db->where("server_id", $_GET["server_id"]);
        if(!empty($_GET["order"]) && !empty($_GET["order_type"])){
            $this->db->order_by($_GET["order"],$_GET["order_type"]);
        }
        $data["datalist"]=$this->mysql->get_total_record('mysql_performance');
        
        $setval["application"]=isset($_GET["application"]) ? $_GET["application"] : "";
        $setval["server_id"]=isset($_GET["server_id"]) ? $_GET["server_id"] : "";
        $setval["order"]=isset($_GET["order"]) ? $_GET["order"] : "";
        $setval["order_type"]=isset($_GET["order_type"]) ? $_GET["order_type"] : "";
        $data["setval"]=$setval;
        
        $data["server"]=$this->server->get_total_record_usage();
        $data["application"]=$this->app->get_total_record_usage();
        
        $data["cur_nav"]="mysql_performance";
        $this->layout->view("mysql/performance",$data);
	}
    
   
    
    
}

/* End of file mysql.php */
/* Location: ./application/controllers/mysql.php */