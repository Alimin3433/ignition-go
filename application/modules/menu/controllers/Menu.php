<?php defined('BASEPATH') || exit('No direct script access allowed');

/**
 * Sample controller
 *
 * Sample REST API controller.
 *
 */

class Menu extends API_Controller {
	
	 function __construct() {
        parent::__construct();
        if($_SERVER['PHP_AUTH_USER']=="alimin" and $_SERVER['PHP_AUTH_PW']=="1234" ){
			echo "you are loged in";
		}else{
			redirect('Auth/not_authenticated');
		}
    }
	
	// [GET] /menu
	protected function get_items()
	{
		  
		
		$this->load->model('menu/M_menu');
		$data=  json_decode(json_encode($this->M_menu->get()), True);
		$this->to_response($data);
		
		
	}
	
	//[GET] /menu/item_by_id/{id}
	public function item_by_id($id){
		$this->load->model('menu/M_menu');
		$data=$this->M_menu->get_by_id($id);
		$data=  json_decode(json_encode($data), True);
		$this->to_response($data);
		
	}
	
	//[GET] /menu/subitems/{id}
	public function subitems($parent_id,$subitem){
		$this->load->model('menu/M_menu');
		$data=$this->M_menu->subitems($parent_id,$subitem);
		$data=  json_decode(json_encode($data), True);
		$this->to_response($data);
		
	}
	
	// [GET] /sample/{parent_id}/{subitem}
	protected function get_subitems($parent_id, $subitem)
	{
		$data = array(
			array('id' => 1, 'name' => 'Parent '.$parent_id.' - '.$subitem.' 1'),
			array('id' => 2, 'name' => 'Parent '.$parent_id.' - '.$subitem.' 2'),
			array('id' => 3, 'name' => 'Parent '.$parent_id.' - '.$subitem.' 3'),
		);
		$this->to_response($data);
	}

	// [POST] /menu 
	protected function create_item()
	{
			
		$this->load->model('menu/M_menu');
		$save_data=$this->M_menu->store($this->mParams);
		
		if($save_data){
			$save_status=1;
			$message="save data success";
		}else{
			$save_status=0;
			$message="save data success";
		}
		$this->to_response(array("save_status"=>$save_status,"message"=>$message));
		
	}

	// [PUT] /sample/{id}
	protected function update_item($id)
	{
		$this->load->helper('array');

		$params = elements(array('filter', 'valid', 'fields', 'here'), $this->mParams);
		$this->to_accepted();
	}

	// [DELETE] /sample/{id}
	protected function remove_item($id)
	{
		$this->to_accepted();
	}
}
