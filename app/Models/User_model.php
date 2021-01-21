<?php namespace App\Models;

use CodeIgniter\Model;

class User_model extends Model {

  var $db;

  public function __construct()  {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

  public function register($param) {
    $retval = True;
    $bldr = $this->db->table('users');
    $bldr->where('email', $param['email']);
    //$q = $bldr->get();
    if($bldr->countAllResults() == 0) {

      $rand_str = bin2hex(openssl_random_pseudo_bytes(12));
      $param['verifystr'] = base_url() . '/index.php/Main_con/confirm_reg/' . $rand_str;
	    $param['email_key'] = $rand_str;

/* Uncomment for data insert into db */
      //$bldr->insert($param);

      $recipient = 'jank@jlkconsulting.info';
      $subject = 'Admin User Registration - MDARC';
      $message = $param['fname'] . ' ' . $param['lname'] . "\n\n".
 	        $param['street'] . "\n\n" .$param['city'] . ' ' . $param['state_cd'] . $param['zip_cd'] . "\n\n".
 	        ' Phone: ' . $param['phone'] . ' | Email: ' . $param['email'] . "\n\n" .
          $param['verifystr'];

 	    mail($recipient, $subject, $message);

      $recipient = $param['email'];
      $subject = 'MDARC User Registration - Admin Page by KM6NFC';

      $message = 'To finish your registration for MDARC Admin Page click on the following link or copy paste in the browser: ' . $param['verifystr'] . "\n\n";
      $message .= 'You must do so within 72 hours otherwise you login information may be deactivated.
                  Thank you for your interest in ARRL EB Section!';
	   	//mail($recipient, $subject, $message);
    }
    else {
      $retval = FALSE;
    }
    return $retval;
  }

}
