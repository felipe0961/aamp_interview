<?php
	require_once('Model.php');

	class Contact extends Model {
		protected $email;
		protected $name;

		public function __construct($name, $email) {	
			$this->name	 = $name;
			$this->email = $email;
		}
	}


	$a = new Contact("Luis", "Hell");
	echo $a->to_json();
?>