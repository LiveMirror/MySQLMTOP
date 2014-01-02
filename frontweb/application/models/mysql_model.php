<?php 
class Mysql_model extends CI_Model{

    function get_healthlist(){
        
		$this->db->order_by("id", "asc");
		$query = $this->db->get('mysql_health');
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
	}
    
    function get_replicationlist(){
        
		$this->db->order_by("id", "asc");
		$query = $this->db->get('mysql_replication');
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
	}
    
    
    function get_linuxlist(){
        
		$this->db->order_by("id", "asc");
		$query = $this->db->get('linux_health');
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
	}
	
    

	function get_total_rows($table){
		$this->db->from($table);
		return $this->db->count_all_results();
	}
    
    function get_total_record($table){
        $query = $this->db->get($table);
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
	}
    
    function get_total_record_paging($table,$limit,$offset){
        $query = $this->db->get($table,$limit,$offset);
		if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
	}
    
    function get_total_record_sql($sql){
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0)
		{
			$result['datalist']=$query->result_array();
            $result['datacount']=$query->num_rows();
            return $result;
		}
    }
	
    function get_total_record_status(){
        $this->db->select('a.* , b.QPS , b.TPS, b.Bytes_received, b.Bytes_sent');
        $this->db->from('mysql_status a');
        $this->db->join('mysql_status_ext b', 'a.server_id = b.server_id');
        $query = $this->db->get();
        if ($query->num_rows() > 0)
		{
			return $query->result_array();
		}
    }
    
    function get_total_host(){
        $query=$this->db->query("select host  from mysql_status order by host;");
        if ($query->num_rows() > 0)
        {
           return $query->result_array(); 
        }
    }
    
    function get_total_application(){
        $query=$this->db->query("select application from mysql_status group by application order by application;");
        if ($query->num_rows() > 0)
        {
           return $query->result_array(); 
        }
    }

	function get_data_by_id($id){
		$query = $this->db->get_where($this->table, array('id' =>$id));
		if ($query->num_rows() > 0)
		{
			return $query->row_array();
		}
	}
	
	function update_view_count($id){
		$this->db->set('view_count', 'view_count+1',FALSE);
		$this->db->where('id', $id);
		$this->db->update($this->table);
	}

}

/* End of file mysql_model.php */
/* Location: ./application/models/mysql_model.php */