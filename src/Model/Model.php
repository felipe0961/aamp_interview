<?php
	require_once('../Persistency/Persistency.php');
	require_once('../Persistency/FilePersistency.php');

	class Model {

		private $persistency;

		public function __construct(){
			$this->persistency = FilePersistency::getInstance();
		}

		public function __set($name, $value){
     	echo "Setting '$name' to '$value'\n";
     	$this->$name = $value;
   	}

   	public function __get($name){
     	echo "Setting '$name' to '$value'\n";
     	return $this->$name;
   	}

		public function to_json(){
			$vars = get_object_vars($this);
			return json_encode($vars);
		}
	}

?>