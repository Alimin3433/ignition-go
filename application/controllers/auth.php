<?php defined('BASEPATH') || exit('No direct script access allowed');

/**
 * Home controller
 *
 * The base controller which displays the homepage.
 *
 */
class Auth extends CI_controller
{
	
	public function not_authenticated()
	{
		echo "You are not authenticated";
	}
}
/* end ./application/controllers/Home.php */
