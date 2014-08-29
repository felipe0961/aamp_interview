<?php
	require_once("");

	switch ($_GET["method"]) {
		case 'new':
			(new Contact($_GET["name"], $_GET["email"]))->insert();
			break;
		case 'delete':
			$contact->new Contact();
			$contact->__set("id",0);
  			$contact->delete();
			break;
		case 'update':
			$name = isset($_GET["name"]) ? $_GET["name"] : "";
			$email = isset($_GET["email"]) ? $_GET["email"] : "";
			$contact->new Contact();
  			$contact->update();
			break;
		case 'read':
			$contact->new Contact();
			echo json_encode($contact->read());
			break;				
	}

?>