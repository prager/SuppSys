<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Orders extends BaseController {
	var $username;

	public function index() {
		$flag = $this->check_mngr();
		echo view('template/header', array('logged' => $flag));
		if($flag) {
			//$data['orders'] = $this->orders_mod->get_orders(500, 1, TRUE);
			//$data['title'] = 'Orders';
			//$data['msg'] = 'Not done yet. To continue: ' . anchor('Home', 'click here');
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
	private function edit_orders() {
		$flag = $this->check_mngr();
		if($flag) {
			$desc = str_replace(',', ' ', $this->request->getPost['desc']);
			$param['description']= $this->mngr_mod->encr_decr($desc, TRUE, FALSE);
			$param['supplier'] = $this->request->getPost('supplier');
			$param['qty'] = $this->request->getPost('qty');
			$param['price'] = $this->request->getPost('price');
			$param['part_no'] = $this->request->getPost('part_no');
			$param['order_date'] = strtotime($this->request->getPost('order_date'));
			$param['date_received'] = $this->request->getPost('date_received');
			$param['doc_no'] = $this->request->getPost('doc_no');
			$param['invoice_no'] = $this->request->getPost('invoice_no');
			$param['remarks'] = $this->request->getPost('remarks');
			$this->uri->setSilent();
			$param['id_gear'] = $this->uri->getSegment(2);
			$this->mngr_mod->edit_gear($param);
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

}
