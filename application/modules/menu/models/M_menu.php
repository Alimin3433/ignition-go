<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_menu extends CI_Model {
	
	
	public function __construct()
	{
		parent::__construct();
		
		$this->table = 'igo_menu';
	}

	public function get()
	{
		return $this->db->get($this->table)->result();
	}
	
	public function get_by_id($id)
	{
		 $this->db->where('id', $id);
		 $data=$this->db->from($this->table);
		 $query = $data->get(); 
		 		 
		 return $query->result();
		
	}
	
	public function subitems($parent_id,$subitem)
	{
		 $this->db->where('parent_id', $parent_id);
		 $this->db->where('id', $subitem);
		 $data=$this->db->from($this->table);
		 $query = $data->get(); 
		 		 
		 return $query->result();
		
	}
	public function store($params)
	{
		 $this->db->insert($this->table, $params);
		 $insert_id = $this->db->insert_id();
		 return  $insert_id;
		
	}
	
	
}
/* End of file customer_model.php */
/* Location: ./application/modules/v1/models/customer_model.php */