<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Orders extends BaseController {
	var $username;

	public function index() {
		$flag = $this->check_mngr();
		echo view('template/header', array('logged' => $flag));
		if($flag) {
			echo view('orders/show_view', $this->orders_mod->get_orders(500, 1, TRUE));
		}
		else {
			$data['title'] = 'Authorization Error';
			$data['msg'] = 'You may not be authorized to view this page. Go back and try again ' . anchor(base_url(), 'here'). '<br><br>';
			echo view('status/status_view', $data);
		}
		echo view('template/footer');
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
	public function edit_orders() {
		$flag = $this->check_mngr();
		if($flag) {
			$desc = str_replace(',', ' ', $this->request->getPost('desc'));
			$param['description'] = $desc;
			$param['qty'] = $this->request->getPost('qty');
			$param['price'] = $this->request->getPost('price');
			$param['part_no'] = $this->request->getPost('part_no');
			$param['order_date'] = strtotime($this->request->getPost('order_date'));
			$param['date_received'] = strtotime($this->request->getPost('date_received'));
			$param['doc_no'] = $this->request->getPost('doc_no');
			$param['invoice_no'] = $this->request->getPost('part_no');
			$param['remarks'] = $this->request->getPost('remarks');
			$param['description'] = $this->mngr_mod->encr_decr($desc, TRUE, FALSE);
	    $param['supplier'] = $this->mngr_mod->encr_decr($this->request->getPost('supplier'), TRUE, FALSE);
			$this->uri->setSilent();
			$param['id_orders'] = $this->uri->getSegment(2);
			$this->orders_mod->edit_order($param);
			$this->index();
		}
		else {
			echo view('template/header', array('logged' => $flag));
			$data['title'] = 'Authorization Error';
			$data['msg'] = 'You may not be authorized to view this page. Go back and try again ' . anchor(base_url(), 'here'). '<br><br>';
			echo view('status/status_view', $data);
			echo view('template/footer');
		}
	}
	public function add_order() {
		$flag = $this->check_mngr();
		echo view('template/header', array('logged' => $flag));
		if($flag) {
			echo view('orders/add_order_view');
		}
		else {
			$data['title'] = 'Authorization Error';
			$data['msg'] = 'You may not be authorized to view this page. Go back and try again ' . anchor(base_url(), 'here'). '<br><br>';
			echo view('status/status_view', $data);
		}
		echo view('template/footer');
	}
	public function test_post() {
		echo view('template/header', array('logged' => TRUE));
		$data['title'] = 'Load Test';
		$data['msg'] = 'Go back to the main page ' . anchor(base_url(), 'here'). '<br>';
		$data['msg'] .= 'desc: ' . $this->request->getPost('desc') . '<br>';
		$data['msg'] .= 'test: ' . $this->request->getPost('test') . '<br>';
		$data['msg'] .= 'test2: ' . $this->request->getPost('test2') . '<br>';
		echo view('status/status_view', $data);
		echo view('template/footer');

	}
	public function load_order() {
		$flag = $this->check_mngr();
		if($flag) {
			echo view('template/header', array('logged' => TRUE));
		}
		else {
			echo view('template/header', array('logged' => FALSE));
		}
		$data['title'] = 'Load Test';
		$data['msg'] = 'Go back to the main page ' . anchor(base_url(), 'here'). '<br>';
		$data['msg'] .= 'desc: ' . $this->request->getPost('desc') . '<br>';
		$data['msg'] .= 'test: ' . $this->request->getPost('test') . '<br>';
		$data['msg'] .= 'test2: ' . $this->request->getPost('test2') . '<br>';
		echo view('status/status_view', $data);
		echo view('template/footer');
	}

	public function delete_order() {
		$flag = $this->check_mngr();
		if($flag) {
			$this->uri->setSilent();
			$this->orders_mod->delete_order($this->uri->getSegment(2));
			$this->index();
		}
		else {
			echo view('template/header', array('logged' => $flag));
			$data['title'] = 'Authorization Error';
			$data['msg'] = 'You may not be authorized to view this page. Go back and try again ' . anchor(base_url(), 'here'). '<br><br>';
			echo view('status/status_view', $data);
			echo view('template/footer');
		}
	}

	public function download_orders() {
		if($this->check_mngr()) {
			$this->orders_mod->get_orders(500, 1, TRUE);
			return $this->response->download('files/orders.csv', NULL);
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

}
