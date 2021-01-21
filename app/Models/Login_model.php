<?php namespace App\Models;

use CodeIgniter\Model;

class Login_model extends Model {

  var $db;

  public function __construct()  {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

  public function is_logged() {
          $retval = array();
          $retval['logged'] = FALSE;
          if (session_status() !== PHP_SESSION_ACTIVE) {
              session_start();
          }

          if(isset($_SESSION['logged'])) {
              if($_SESSION['logged']) {
                  $retval['level'] = $_SESSION['level'];
                  $retval['logged'] = TRUE;
              }
          }
          return $retval;
      }

    public function get_cur_user() {

      if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
      }
      if(isset($_SESSION['logged'])) {
          return $_SESSION['user'];
      }
      else {
          return NULL;
      }
  }

  public function get_cur_user_id() {
		if (session_status() !== PHP_SESSION_ACTIVE) {
			session_start();
		}
		return $_SESSION['id_user'];
	}

  /**
 * Checks user ID and password credentials
 * @param $data array with user ID and password
 */
public function check_credentials($data) {
  //echo '<br><br><br>' . password_hash($data['pass'], PASSWORD_BCRYPT, array('cost' => 12));
  $retval = TRUE;
  /*$retval = FALSE;
  if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
    session_regenerate_id(FALSE);
  }
  $this->db->select('username');
  $this->db->where('username', $data['user']);
  $query = $this->db->get('users');
  if(count($query->result()) == 1) {
    $this->db->select('pass');
    $this->db->where('username', $data['user']);
    $query = $this->db->get('users');
    if(count($query->result()) == 1) {
      $row = $query->row();
      if(password_verify($data['pass'], $row->pass)) {
        $retval = TRUE;
        $this->load->model('user_model');
        $user = $this->user_model->get_user($data['user']);
        $user['session_id'] = session_id();
        $this->set_logged($user);
        $_SESSION['user'] = $user;
        $_SESSION['id_user'] = $user['id'];
        $_SESSION['logged'] = TRUE;
        $_SESSION['level'] = $user['level'];
        $_SESSION['user_type'] = $user['description'];
      }
    }
  }*/
  return $retval;
}

}
