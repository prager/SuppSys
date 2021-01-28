<?php namespace App\Models;

use CodeIgniter\Model;

class Orders_model extends Model {
  function __construct() {
		parent::__construct();
	}

  public function get_orders($num_rec, $pg_no, $flag) {
    setlocale(LC_MONETARY, 'en_US');
    $retarr = array();
    $offset = ($pg_no -1) * $num_rec;
    $db      = \Config\Database::connect();
    $builder = $db->table('orders');
    $builder->orderBy('description', 'ASC');
    $fstr = "Item #,Part #,Supp Part #,Desc,Vendor,Ord Date,Rec Date,Doc #,Order #,Qty,Price,Total,Remark,Type\n";
    $q = $builder->get()->getResult();
    $orders = array();
    $mngr_mod = new \App\Models\Mngr_model();
    foreach($q as $item) {
      if($item->date_received == 0) {
          $date_rec = '';
      }
      else {
          $date_rec = date('m/d/Y', $item->date_received);
      }
      $item_arr = array(
        'id_orders' => $item->id_orders,
        'part_no' => $item->part_no,
        'supp_part_no' => $item->supp_part_no,
        'desc' => $mngr_mod->encr_decr($item->description, FALSE, TRUE),
        'supplier' => $mngr_mod->encr_decr($item->supplier, FALSE, TRUE),
        'order_date' => date('m/d/Y', $item->order_date),
        'date_received' => $date_rec,
        'doc_no' => $item->doc_no,
        'invoice_no' => $item->invoice_no,
        'qty' => $item->qty,
        'price' => number_format($item->price, 2, '.', ''),
        'remarks' => $item->remarks,
        'url' => $item->url,
				'type' => $item->type
      );
      $item_arr['total'] = number_format(($item_arr['price'] * $item_arr['qty']), 2, '.', '');
      $fstr .= $item_arr['id_orders'] . "," .  $item_arr['part_no'] . "," . $item_arr['supp_part_no'] . "," . $item_arr['desc'] .
	        "," . $item_arr['supplier'] . "," . $item_arr['order_date'] ."," .  $item_arr['date_received'] .
	        "," . $item_arr['doc_no'] ."," .  $item_arr['invoice_no'] ."," .  $item_arr['qty'] ."," .
	        $item_arr['price'] ."," .  $item_arr['total'] ."," .  $item_arr['remarks'] ."," .  $item_arr['type'] . "\n";
	        array_push($orders, $item_arr);
    }
    file_put_contents('files/orders.csv', $fstr);
    array_multisort (array_column($orders, 'desc'), SORT_ASC, $orders);

    $retarr['no_pages'] = ceil(count($orders) / $num_rec);
	  $retarr['pg'] = $pg_no;

    $orders = array_slice($orders, $offset, $num_rec);
    $retarr['orders'] = $orders;
    $db->close();
    return $retarr;
  }
  public function edit_orders($param) {
    $chr = substr($param['price'], 0, 1);
    if (!(is_numeric($chr))) {
        $param['price'] = substr($param['price'], 1, (strlen($param['price']) - 1));
        $param['price'] = str_replace(',', '', $param['price']);
    }
    $db      = \Config\Database::connect();
    $builder = $db->table('orders');
    $id = $param['id_orders'];
    unset($param['id_orders']);
    $mngr_mod = new \App\Models\Mngr_model();

    $db->close();
  }
}
