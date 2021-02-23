<?php namespace App\Models;

use CodeIgniter\Model;

class Login_model extends Model {

  public function is_logged() {
          $retval = FALSE;
          if (session_status() !== PHP_SESSION_ACTIVE) {
              session_start();
          }

          if(isset($_SESSION['logged'])) {
              if($_SESSION['logged']) {
                  $retval = TRUE;
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
  //echo '<br><br><br>' . password_hash($data['pass'], PASSWORD_BCRYPT, array('cost' => 12)) . '<br><br>';
  $retval = FALSE;

  if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
    session_regenerate_id(FALSE);
  }
  $db = \Config\Database::connect();
  $builder = $db->table('users');
  $builder->where('username', $data['user']);
  $user = $builder->get()->getRow();
  $db->close();
  if(isset($user)) {
    if((password_verify($data['pass'], $user->pass)) && ($data['user'] == $user->username)) {
      $user_mod = new \App\Models\User_model();
      $usr_arr = $user_mod->get_user_arr($user);
      $usr_arr['session_id'] = session_id();
      $this->set_logged($usr_arr);
      $_SESSION['user'] = $usr_arr;
      $_SESSION['id_user'] = $usr_arr['id_user'];
      $_SESSION['logged'] = TRUE;
      $_SESSION['role'] = $usr_arr['role'];

      $myfile = fopen("files/key.txt", "r") or die("Unable to open file!");
      $key = fread($myfile,filesize("files/key.txt"));
      fclose($myfile);

      $init_arr = array(
          'cipher' => 'aes-256',
          'mode' => 'ctr',
          'key' => $key
      );
      //$this->encryption->initialize($init_arr);
      $_SESSION['key'] = $key;

      $retval = TRUE;
    }
  }
  return $retval;
}

private function set_logged($user) {
  $db = \Config\Database::connect();
  $builder = $db->table('ci_sessions');

//check for logged=1 in previous sessions for current user and set logged to 0
  $builder->where('logged', 1);
  $builder->where('id_user', $user['id_user']);
  $row = $builder->get()->getRow();
  if (isset($row)) {
    $builder->update(array('logged' => 0));
  }
  $builder->resetQuery();
  $builder = $db->table('ci_sessions');
  $session_data = array(
      'id_user' => $user['id_user'],
      'session_id' => $user['session_id'],
      'ip_address' => $_SERVER['REMOTE_ADDR'],
      'date_logged_in' => time(),
      'logged' => 1);
  $builder->insert($session_data);
  $db->close();
}

public function logout() {
  if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
  }

  if(isset($_SESSION['logged'])) {
    $db = \Config\Database::connect();
    $builder = $db->table('ci_sessions');
    $builder->where('logged', 1);
    $builder->where('id_user',  $_SESSION['id_user']);
    $builder->update(array('logged' => 0, 'date_logged_out' => time()));
    $db->close();
  }
  unset($_SESSION['logged']);
  unset($_SESSION['role']);
  unset($_SESSION['id_user']);
  unset($_SESSION['user']);
  unset($_SESSION['user_type']);
  setcookie(session_name(), session_id(), 1); // to expire the session
  $_SESSION = [];

}


}
