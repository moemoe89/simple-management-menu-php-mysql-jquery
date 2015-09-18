<?php 

require_once './config.php';

if($_POST['id'] != ''){

	$db->exec("update tbl_menu set label = '".$_POST['label']."', link  = '".$_POST['link']."' where id = '".$_POST['id']."' ");

	$arr['type']  = 'edit';
	$arr['label'] = $_POST['label'];
	$arr['link']  = $_POST['link'];
	$arr['id']    = $_POST['id'];

} else {


	$db->exec("insert into tbl_menu (label,link) values ('".$_POST['label']."', '".$_POST['link']."')");

	$arr['menu'] = '<li class="dd-item dd3-item" data-id="'.$db->lastInsertId().'" >
	                    <div class="dd-handle dd3-handle">Drag</div>
	                    <div class="dd3-content"><span id="label_show'.$db->lastInsertId().'">'.$_POST['label'].'</span>
	                        <span class="span-right">/<span id="link_show'.$db->lastInsertId().'">'.$_POST['link'].'</span> &nbsp;&nbsp; 
	                        	<a class="edit-button" id="'.$db->lastInsertId().'" label="'.$_POST['label'].'" link="'.$_POST['link'].'" ><i class="fa fa-pencil"></i></a>
                           		<a class="del-button" id="'.$db->lastInsertId().'"><i class="fa fa-trash"></i></a>
	                        </span> 
	                    </div>';

	$arr['type'] = 'add';

}

print json_encode($arr);

?>
