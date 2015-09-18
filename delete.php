<?php 

require_once './config.php';

function recursiveDelete($id,$db) {
    $db_conn = $db;
    $query = $db->query("select * from tbl_menu where parent = '".$id."' ");
    if ($query->rowCount()>0) {
       while($current=$query->fetch(PDO::FETCH_ASSOC)) {
            recursiveDelete($current['id'],$db_conn);
       }
    }
    $db->exec("delete from tbl_menu where id = '".$id."' ");
}

recursiveDelete($_POST['id'],$db);

?>
