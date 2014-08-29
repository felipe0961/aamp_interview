<?php
	require_once('ActiveRecord.php');

	class Contact extends ActiveRecord {
		protected $email;
		protected $id;
		protected $name;
		static $contact_count = 0;

		public function __construct($name = "", $email = "") {	
      parent::__construct();
			$this->name	 = $name;
			$this->email = $email;
      $contact_count = count($this->read());
			$this->id = $contact_count++;
		}
	}
?>