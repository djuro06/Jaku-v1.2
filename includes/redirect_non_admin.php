<?php 
	
require_once("authorization.php");


if(!isset($user_id)){
	header("location: ".$pathAPP."public/login.php?noPermission");
	return;
}else if($role == 0){
	header("location: ".$pathAPP."videostore.php");
	return;
}

?>