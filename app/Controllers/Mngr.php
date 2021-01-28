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

	public function edit_gear() {
		$flag = $this->check_mngr();
		if($flag) {
			$param['description'] = $this->request->getPost('desc');
			$param['type'] = (int)$this->request->getPost('type') + 1;
			$param['location'] = $this->request->getPost('location');
			$param['sn'] = $this->request->getPost('sn');
			$param['size'] = $this->request->getPost('size');
			$param['qty'] = $this->request->getPost('qty');
			$this->uri->setSilent();
			$param['id_gear'] = $this->uri->getSegment(2);
			$this->mngr_mod->edit_gear($param);
			$this->gear();
		}
		else {
			echo view('template/header', array('logged' => $flag));
			$data['title'] = 'Authorization Error';
			$data['msg'] = 'You may not be authorized to view this page. Go back and try again ' . anchor(base_url(), 'here'). '<br><br>';
			echo view('status/status_view', $data);
			echo view('template/footer');
		}
	}

	public function boat_gear() {

	}

	public function other_gear() {

	}

	private function check_mngr() {
		//$login_mod = new \App\Models\Login_model();
		$retval = FALSE;
		$user = $this->login_mod->get_cur_user();
    if($user != NULL) {
			if($user['role'] == 99) {
				$retval = TRUE;
    	}
		}
		return $retval;
	}

	public function download_gear() {
		if($this->check_mngr()) {
			return $this->response->download('files/gear/gear.csv', NULL);
		}
		else {
			$data['title'] = 'Authorization Error';
			$data['msg'] = 'You may not be authorized to view this page. Go back and try again ' . anchor(base_url(), 'here'). '<br><br>';
			echo view('template/header', array('logged' => FALSE));
			$data['title'] = 'Authorization Error';
			$data['msg'] = 'You may not be authorized to view this page. Go back and try again ' . anchor(base_url(), 'here'). '<br><br>';
			echo view('status/status_view', $data);
			echo view('template/footer');
		}
	}

	public function download_gear_item() {
		if($this->check_mngr()) {
			$this->uri->setSilent();
			return $this->response->download('files/gear/item-'. $this->uri->getSegment(2) . '.csv', NULL);
		}
		else {
			$data['title'] = 'Authorization Error';
			$data['msg'] = 'You may not be authorized to view this page. Go back and try again ' . anchor(base_url(), 'here'). '<br><br>';
			echo view('template/header', array('logged' => FALSE));
			$data['title'] = 'Authorization Error';
			$data['msg'] = 'You may not be authorized to view this page. Go back and try again ' . anchor(base_url(), 'here'). '<br><br>';
			echo view('status/status_view', $data);
			echo view('template/footer');
		}
	}

	public function gear() {
		$flag = $this->check_mngr();
		echo view('template/header', array('logged' => $flag));
		$data = $this->mngr_mod->get_gear(500, 1);
		echo view('mngr/show_view', $data);
		echo view('template/footer');

	}

	public function orders() {
		$flag = $this->check_mngr();
		echo view('template/header', array('logged' => $flag));
		if($flag) {
			$data['title'] = 'Orders';
			$data['msg'] = 'Not done yet. To continue: ' . anchor('Home', 'click here');
		}
		else {
			$data['title'] = 'Authorization Error';
			$data['msg'] = 'You may not be authorized to view this page. Go back and try again ' . anchor(base_url(), 'here'). '<br><br>';
		}
		echo view('status/status_view', $data);
		echo view('template/footer');
	}

	public function pending_orders() {
		$flag = $this->check_mngr();
		echo view('template/header', array('logged' => $flag));
		if($flag) {
			$data['title'] = 'Pending Orders';
			$data['msg'] = 'Not done yet. To continue: ' . anchor('Home', 'click here');
		}
		else {
			$data['title'] = 'Authorization Error';
			$data['msg'] = 'You may not be authorized to view this page. Go back and try again ' . anchor(base_url(), 'here'). '<br><br>';
		}
		echo view('status/status_view', $data);
		echo view('template/footer');
	}

	public function delivered_orders() {
		$flag = $this->check_mngr();
		echo view('template/header', array('logged' => $flag));
		if($flag) {
			$data['title'] = 'Delivered Orders';
			$data['msg'] = 'Not done yet. To continue: ' . anchor('Home', 'click here');
		}
		else {
			$data['title'] = 'Authorization Error';
			$data['msg'] = 'You may not be authorized to view this page. Go back and try again ' . anchor(base_url(), 'here'). '<br><br>';
		}
		echo view('status/status_view', $data);
		echo view('template/footer');
	}

	public function cancelled_orders() {
		$flag = $this->check_mngr();
		echo view('template/header', array('logged' => $flag));
		if($flag) {
			$data['title'] = 'Cancelled Orders';
			$data['msg'] = 'Not done yet. To continue: ' . anchor('Home', 'click here');
		}
		else {
			$data['title'] = 'Authorization Error';
			$data['msg'] = 'You may not be authorized to view this page. Go back and try again ' . anchor(base_url(), 'here'). '<br><br>';
		}
		echo view('status/status_view', $data);
		echo view('template/footer');
	}

	public function add_gear() {
		$flag = $this->check_mngr();
		if($flag) {
			echo view('template/header', array('logged' => TRUE));
			$data['types'] = $this->mngr_mod->get_gear_types();
			$data['type'] = 'Gear';
			echo view('mngr/add_gear_view', $data);
		}
		else {
			echo view('template/header', array('logged' => FALSE));
			$data['title'] = 'Authorization Error';
			$data['msg'] = 'You may not be authorized to view this page. Go back and try again ' . anchor(base_url(), 'here'). '<br><br>';
			echo view('status/status_view', $data);
		}
		echo view('template/footer');
	}

	public function load_gear() {
		$flag = $this->check_mngr();
		if($flag) {
			$param['description'] = $this->request->getPost('desc');
			$param['type'] = (int)$this->request->getPost('type') + 1;
			$param['location'] = $this->request->getPost('location');
			$param['sn'] = $this->request->getPost('sn');
			$param['size'] = $this->request->getPost('size');
			$param['qty'] = $this->request->getPost('qty');
			$param['id_gear'] = 0;
			$this->mngr_mod->edit_gear($param);
			echo view('template/header', array('logged' => TRUE));
			$data['types'] = $this->mngr_mod->get_gear_types();
			echo view('mngr/add_gear_view', $data);
		}
		else {
			echo view('template/header', array('logged' => FALSE));
			$data['title'] = 'Authorization Error';
			$data['msg'] = 'You may not be authorized to view this page. Go back and try again ' . anchor(base_url(), 'here'). '<br><br>';
			echo view('status/status_view', $data);
		}
		echo view('template/footer');
	}

	public function delete_gear() {
		$flag = $this->check_mngr();
		if($flag) {
			$this->uri->setSilent();
			$this->mngr_mod->delete_gear($this->uri->getSegment(2));
			echo view('template/header', array('logged' => TRUE));
			$data['title'] = 'Item Deleted';
			$data['msg'] = 'Go back to the main page ' . anchor(base_url(), 'here'). '<br><br>';
			echo view('status/status_view', $data);
		}
		else {
			$data['title'] = 'Authorization Error';
			$data['msg'] = 'You may not be authorized to view this page. Go back and try again ' . anchor(base_url(), 'here'). '<br><br>';
			echo view('status/status_view', $data);
		}
		echo view('template/footer');
	}
	public function test() {
		echo view('template/header', array('logged' => TRUE));
		echo view('public/test_view', array('types' => $this->mngr_mod->get_gear_types()));
		echo view('template/footer');
	}

	public function load_test() {
		echo view('template/header', array('logged' => TRUE));
		$data['title'] = 'Load Test';
		$data['msg'] = 'Go back to the main page ' . anchor(base_url(), 'here'). '<br>';
		$data['msg'] .= 'fname: ' . $this->request->getPost('firstname') . '<br>';
		$data['msg'] .= 'lname: ' . $this->request->getPost('lastname') . '<br>';
		echo view('status/status_view', $data);
		echo view('template/footer');
	}
}
