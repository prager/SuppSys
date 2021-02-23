<?php namespace App\Models;

use CodeIgniter\Model;

class Mngr_model extends Model {
  public function get_gear($num_rec, $pg_no) {
      //$pg_no = 3;
      $offset = ($pg_no -1) * $num_rec;

      $db      = \Config\Database::connect();
      $builder = $db->table('gear');
      //$builder->where('type', 1);
      $builder->orderBy('description', 'ASC');
      $q = $builder->get()->getResult();
      $gear = array();
      $fstr = "Item #,Description,Qty,Qty Assigned,Location,Issued\n";
      $i = 0;
      foreach ($q as $item) {
        $item_arr = array(
            'id_gear' => $item->id_gear,
            'id_gear_set' => $item->id_gear_set,
            'desc' => $this->encr_decr($item->description, FALSE, TRUE),
            'type' => $item->type,
            'qty' => $item->qty,
            'location' => $item->location,
            'issued' => $this->get_item_cnt($item->id_gear),
            'assg' => $this->get_assigned_to($item->id_gear),
            'selected' => ($item->type - 1),
            'types' => $this->get_gear_types(),
            'sn' => $item->sn,
            'size' => $item->size
        );
        if($item_arr['issued'] > 0) {
          $fstr = $item_arr['desc'] . "\n\n";
          $fstr .= "Location,Qty O/H,Qty Issued\n";
          $fstr .= $item_arr['location'] ."," . $item_arr['qty'] . "," . $item_arr['issued'] . "\n\n";
          $fstr .= "Issued To:\n";
          foreach($item_arr['assg'] as $mem) {
            $fstr .= $mem . "\n";
          }
          file_put_contents('files/gear/item-'. $item_arr['id_gear'] . '.csv', $fstr);
        }
//count the number of items in all gearsets
        $builder->resetQuery();
        $builder = $db->table('members');
        $builder->where('gear >', 0);

//figure if there are any members with gearsets
        if($builder->countAllResults() > 0) {

//if yes, get those members and their gearsets
            $res = $builder->get()->getResult();
            $builder->resetQuery();
            $gear_cnt = 0;
            foreach($res as $id) {
              $builder = $db->table('gear_sets');
              $builder->where('id_gear_sets', intval($id->gear));
              $row = $builder->get()->getRow();
              if(isset($row)) {
                $set_arr = explode(":", $row->gear_set);
                foreach ($set_arr as $gear_item) {
                    if($item->id_gear == $gear_item) {
                        $gear_cnt++;
                    }
                }
              }
            }
        }
        $i++;
        $fstr .= $item_arr['id_gear'] . "," . $item_arr['desc'] . "," . $item->qty . "," . $gear_cnt . "," . $item->location .
        "," . $item_arr['issued'] . "\n";
        array_push($gear, $item_arr);
      }
      $db->close();
      file_put_contents('files/gear/gear.csv', $fstr);
      //file_put_contents('/kunden/homepages/36/d117019790/htdocs/supp/assets/files/gear.txt', $fstr);

//https://www.php.net/manual/en/function.array-multisort.php
      array_multisort (array_column($gear, 'desc'), SORT_ASC, $gear);
      $retarr = array();

//pagination: https://www.myprogrammingtutorials.com/create-pagination-with-php-and-mysql.html
      $retarr['no_pages'] = ceil(count($gear) / $num_rec);
      $retarr['pg'] = $pg_no;
      //echo 'offset: ' . $offset;
      //if($pg_no != 99) {
      $gear = array_slice($gear, $offset, $num_rec);
      //}
      $retarr['gear_type'] = 'gear';
      $retarr['gear'] = $gear;
      return $retarr;
  }
    public function get_gear_types() {
      $db      = \Config\Database::connect();
      $builder = $db->table('gear_types');
      $res = $builder->get()->getResult();
      $db->close();
      $types = array();
      foreach($res as $type) {
        array_push($types, $type->description);
      }
      return $types;
    }

  public function get_boat_gear($pg_no, $num_rec) {
    $retarr = array();

    return $retarr;
  }

  public function get_other_gear($pg_no, $num_rec) {
    $retarr = array();

    return $retarr;
  }

  /**
   * Reference: https://www.geeksforgeeks.org/how-to-encrypt-and-decrypt-a-php-string/
   * @param string $str_cr
   * @param bool $encr
   * @param bool $decr
   * @return NULL|string
   */
  public function encr_decr($str_cr, $encr, $decr) {
      $retval = NULL;

      $ciphering = "AES-256-CBC";
      $iv_length = openssl_cipher_iv_length($ciphering);
      $options = 0;
      $iv = '1234567891011121';

      if (session_status() !== PHP_SESSION_ACTIVE) {
          session_start();
      }

      $key = $_SESSION['key'];

      if($encr == TRUE){
          $retval = openssl_encrypt($str_cr, $ciphering,
              $key, $options, $iv);
      }
      elseif($decr == TRUE) {
          $retval = openssl_decrypt ($str_cr, $ciphering,
              $key, $options, $iv);
      }

      return $retval;
  }

  public function get_item_cnt($id) {
    $db      = \Config\Database::connect();
    $builder = $db->table('gear_sets');
    $gear_sets = $builder->get()->getResult();
    $cnt = 0;
    foreach($gear_sets as $gear_set) {
      $gear_arr = explode(':', $gear_set->gear_set);
      foreach($gear_arr as $item) {
        if(intval($item) == intval($id)) {
          $cnt++;
        }
      }
    }
    $db->close();
    return $cnt;
  }

  public function get_assigned_to($id) {
    $db      = \Config\Database::connect();
    $builder = $db->table('gear_sets');
    $gear_sets = $builder->get()->getResult();
    $members = array();
    foreach($gear_sets as $gear_set) {
      $gear_arr = explode(':', $gear_set->gear_set);
      foreach($gear_arr as $item) {
        if(intval($item) == intval($id)) {
          array_push($members, $this->encr_decr($gear_set->description, FALSE, TRUE));
        }
      }
    }
    $db->close();
    return $members;
  }

  public function edit_gear($param) {
    $db      = \Config\Database::connect();
    $builder = $db->table('gear');
    $id = $param['id_gear'];
    unset($param['id_gear']);
    if($id > 0) {
      $param['description'] = $this->encr_decr($param['description'], TRUE, FALSE);
      $builder->resetQuery();
      $builder->update($param, ['id_gear' => $id]);
    }
    else {
      $param['description'] = $this->encr_decr($param['description'], TRUE, FALSE);
      $builder->insert($param);
    }
    $db->close();
  }

  public function delete_gear($id) {
    $db      = \Config\Database::connect();
    $builder = $db->table('gear');
    $builder->resetQuery();
    $builder->delete(['id_gear' => $id]);
    $db->close;
  }

  public function get_gearsets() {
    $db      = \Config\Database::connect();
    $builder = $db->table('gear_sets');
    $gear_sets = $builder->get()->getResult();
    $gearsets = array();
    foreach($gear_sets as $set) {
      $item = array();
      $item['id'] = $set->id_gear_sets;
      $item['parent'] = $set->id_parent;
      $item['member'] = $set->id_member;
      $item['desc'] = $this->encr_decr($set->description, FALSE, TRUE);
      $item['date'] = date('m/d/Y', $set->date_issued);
      $builder = $db->table('members');
      $builder->where('gear', $item['id']);
      if ($builder->countAllResults() == 0) {
          $item['assigned'] = FALSE;
      }
      else {
          $item['assigned'] = TRUE;
      }
      array_push($gearsets, $item);
    }
    $db->close();
    //https://www.php.net/manual/en/function.array-multisort.php
    array_multisort (array_column($gearsets, 'desc'), SORT_ASC, $gearsets);
    $retarr['gearsets'] = $gearsets;
    return $retarr;
  }
}
