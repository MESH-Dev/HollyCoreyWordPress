<?php
	function getInstagram($user_id=1423359968,$count=4){
		$json = file_get_contents("https://api.instagram.com/v1/users/$user_id/media/recent?access_token=1167443738.5b9e1e6.5cb9e88dbfa5493e9c2648e489ece7da&count=$count");
		$obj = json_decode($json);
		return $obj->data;
	}
?>
