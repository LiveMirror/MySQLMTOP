<?php 
class Chart_model extends CI_Model{

    


    
    function get_status($server_id,$time){
        $query=$this->db->query("select active,connections from mysql_status_history where server_id=$server_id and DATE_FORMAT(create_time,'%Y-%m-%d %H:%i')='$time' limit 1; ");
        if ($query->num_rows() > 0)
        {
           return $query->row_array(); 
        }
    }
    
    function get_status_ext($server_id,$time){
        $query=$this->db->query("select QPS,TPS,Bytes_received,Bytes_sent from mysql_status_ext_history where server_id=$server_id and DATE_FORMAT(create_time,'%Y-%m-%d %H:%i')='$time' limit 1; ");
        if ($query->num_rows() > 0)
        {
           return $query->row_array(); 
        }
    }
    

}

/* End of file mysql_model.php */
/* Location: ./application/models/mysql_model.php */