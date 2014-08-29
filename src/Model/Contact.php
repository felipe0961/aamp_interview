<?php
	require_once('ActiveRecord.php');

	class Contact extends ActiveRecord {
		/**
   		* Contact E-mail
   		*
   		* @var String 
   		*/
		protected $email;

		/**
   		* Contact id
   		*
   		* @var Integer 
   		*/
		protected $id;

		/**
   		* Contact name
   		*
   		* @var String 
   		*/
		protected $name;

		/**
   		* Static variable that increment when a new contact is created 
   		* Keep track of index
   		* @var integer 
   		*/
		static $contact_count = 0;

		/**
   		* Initialize class attributes and call parent constructor 
   		* @param name string initialize name variable
   		* @param email string initialize email variable 
   		*/
		public function __construct($name = "", $email = "") {	
      parent::__construct();
			$this->name	 = $name;
			$this->email = $email;
      $contact_count = count($this->read());
			$this->id = $contact_count++;
		}
	}
?>