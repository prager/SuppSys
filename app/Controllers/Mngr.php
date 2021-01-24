<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Mngr extends BaseController {
	var $username;

	public function index() {
		helper(['form', 'url']);
		if($this->check_mngr()) {
			echo view('template/header', array('logged' => TRUE));
			//$data =  $this->mngr_mod->get_gear(1, 5);
			$data['gear_type'] = 'gear';
			$data['pg'] = 1;
			echo view('mngr/mngr_view', $data);
		}
		else {
		echo view('template/header', array('logged' => FALSE));
			$data['title'] = 'Error!';
			$data['msg'] = 'You have to be logged in to perform this function! To continue: ' . anchor('Home', 'click here');
			echo view('status/status_view', $data);
		}

		echo view('template/footer');
	}

	public function get_gear() {
		echo view('template/header', array('logged' => TRUE));
		$this->uri->setSilent();
		if ($this->uri->getSegment(2) != '')
			echo 'uri segment: ' . $this->uri->getSegment(2);
		else {
			echo 'nothing there';
		}
		echo view('template/footer');
	}

	public function pers_gear() {
		echo view('template/header', array('logged' => TRUE));
		$data['gear'] = $this->mngr_mod->get_gear(10, 1);
		$data['page'] = 'Gear';
		echo view('mngr/gear_view', $data);
		echo view('template/footer');
	}

	public function boat_gear() {

	}

	public function other_gear() {

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
