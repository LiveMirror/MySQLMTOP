<?php 
class Slowquery_model extends CI_Model{

    


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
	
    function get_total_record_slowquery(){
        
        $this->db->select('s.*,sh.*');
        $this->db->from('mysql_slow_query_review s');
        $this->db->join('mysql_slow_query_review_history sh', 's.checksum=sh.checksum');

        $query = $this->db->get();
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

/* End of file slowquery_model.php */
/* Location: ./application/models/slowquery_model.php */