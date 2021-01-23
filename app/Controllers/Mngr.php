<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Mngr extends BaseController {
	var $username;

	public function index() {
		helper(['form', 'url']);
		echo view('template/header');
		if($this->check_mngr()) {
			$mngr_mod = new \App\Models\Mngr_model();
			$data =  $mngr_mod->get_gear(1, 5);
			$data['gear_type'] = 'gear';
			$data['pg'] = 1;
			echo view('mngr/mngr_view', $data);
		}
		else {
			$data['title'] = 'Error!';
			$data['msg'] = 'You have to be logged in to perform this function! To continue: ' . anchor('Home', 'click here');
			echo view('status/status_view', $data);
		}

		echo view('template/footer');
	}

	public function get_gear() {
		$uri = $this->request->uri;
		helper(['form', 'url']);
		echo view('template/header');
		$uri->setSilent();
		if ($uri->getSegment(2) != '')
			echo 'uri segment: ' . $uri->getSegment(2);
		else {
			echo 'nothing there';
		}
		echo view('template/footer');
	}

	public function get_boat_gear() {

	}

	public function get_other_gear() {

	}

	private function check_mngr() {
		$login_mod = new \App\Models\Login_model();
		$retval = FALSE;
		$user = $login_mod->get_cur_user();
    if($user != NULL) {
			if($user['role'] == 99) {
				$retval = TRUE;
    	}
		}
		return $retval;
	}

	public function download_gear() {

	return $this->response->download('files/gear/gear.csv', NULL);
	}

	public function get_gear_csv() {
		return $this->response->download('files/gear/gear.csv', NULL);
	}
}
