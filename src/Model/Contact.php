<?php

	class Contact extends Person {
		private $email

		public __contructor($name, $email){
			parent::__construct($name);
			$this->email = $email;
		}
	}

?>