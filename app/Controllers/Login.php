<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Login extends BaseController {
	var $username;

	public function index() {
		//$user = $this->request->getPost('user');
		//$pass = $this->request->getPost('pass');
		if($this->validate_credentials()) {
				header("Location: ". base_url() . "/index.php/manager");
	    }
	    else {
        echo view('template/header', array('logged' => FALSE));
        $data['title'] = 'Login Error';
        $data['msg'] = 'There was an error while checking your credentials. Click ' . anchor('Home/reset_password', 'here') .
        ' to reset your password or go to home page ' . anchor(base_url(), 'here'). '<br><br>';
        echo view('status/status_view', $data);
        echo view('template/footer');
	    }
	}

	public function load_user() {
	    echo view('template/header', array('logged' => TRUE));
			$login_mod = new \App\Models\Login_model();
	    $flag = $login_mod->check_table($login_mod->get_cur_user_id());

	    $data['user'] = $login_mod->get_cur_user($login_mod->get_cur_user_id());

	    echo view('admin/admin_view', $data);
	    echo view('template/footer');
	}

	public function validate_credentials() {
	    $this->username = strtolower($this->request->getPost('user'));
	    $password = $this->request->getPost('pass');
	    $data['user'] = $this->username;
	    $data['pass'] = $password;
			//$login_mod = new \App\Models\Login_model();
			return $this->login_mod->check_credentials($data);
	}

}
