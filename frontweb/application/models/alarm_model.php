<?php 
class Alarm_model extends CI_Model{

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
	
    
}

/* End of file alarm_model.php */
/* Location: ./application/models/alarm_model.php */