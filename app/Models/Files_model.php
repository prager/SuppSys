<?php namespace App\Models;

use CodeIgniter\Model;

class Files_model extends Model {

  public function download_pub($file, $response) {
    return $response->download($file, NULL);
  }

}
