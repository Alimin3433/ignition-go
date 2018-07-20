<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Model {
	
	
	public function __construct()
	{
		parent::__construct();
		
		$this->table = 'igo_menu';
	}

	public function get()
	{	
		return $this->db->get($this->table);
	}
	public function get_by_id($id)
	{
		
		//echo $id; die();
		 $this->db->where('id', $id);
		 $data=$this->db->from($this->table);
		 $query = $data->get(); 
		 		 
		 return $query->result();
	}
	
	public function sub_item($parent_id,$sub_item)
	{
		
		//echo $id; die();
		 $this->db->where('id', $id);
		 $data=$this->db->from($this->table);
		 $query = $data->get(); 
		 		 
		 return $query->result();
	}
}
/* End of file customer_model.php */
/* Location: ./application/modules/v1/models/customer_model.php */