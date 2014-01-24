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
    
   

	function get_record_by_checksum($checksum){
	    $this->db->select('s.*,sh.*');
        $this->db->from('mysql_slow_query_review s');
        $this->db->join('mysql_slow_query_review_history sh', 's.checksum=sh.checksum');
		$this->db->where('s.checksum',$checksum);
        $query = $this->db->get();
		if ($query->num_rows() > 0)
		{
			return $query->row_array();
		}
	}
	


}

/* End of file slowquery_model.php */
/* Location: ./application/models/slowquery_model.php */