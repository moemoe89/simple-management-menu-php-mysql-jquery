<?php 

require_once './config.php';

$data = json_decode($_POST['data']);

function parseJsonArray($jsonArray, $parentID = 0) {

  $return = array();
  foreach ($jsonArray as $subArray) {
    $returnSubSubArray = array();
    if (isset($subArray->children)) {
 		$returnSubSubArray = parseJsonArray($subArray->children, $subArray->id);
    }

    $return[] = array('id' => $subArray->id, 'parentID' => $parentID);
    $return = array_merge($return, $returnSubSubArray);
  }
  return $return;
}

$readbleArray = parseJsonArray($data);

$i=0;
foreach($readbleArray as $row){
  $i++;
	$db->exec("update tbl_menu set parent = '".$row['parentID']."', sort = '".$i."' where id = '".$row['id']."' ");
}


?>
