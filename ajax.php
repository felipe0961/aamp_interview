<?php
	require_once('src/Model/Contact.php');
	require_once('src/Persistency/Persistency.php');
	require_once('src/Persistency/FilePersistency.php');

	switch ($_GET["method"]) {
		case 'new':
			(new Contact($_GET["name"], $_GET["email"]))->insert();
			break;
		case 'delete':
			$contact = new Contact();
			$contact->__set("id",$_GET["id"]);
  		$contact->delete();
			break;
		case 'update':
			$name = isset($_GET["name"]) ? $_GET["name"] : "" ;
			$email = isset($_GET["email"]) ? $_GET["email"] : "" ;
			$id = isset($_GET["id"]) ? $_GET["id"] : "" ;
			if ( $id == "" ){
				return false;
			}
			$contact = new Contact($name, $email);
			$contact->__set("id",$_GET["id"]);
  		$contact->update();
			break;
		case 'read':
			$contact = new Contact();
			echo json_encode($contact->read());
			break;				
	}

?>