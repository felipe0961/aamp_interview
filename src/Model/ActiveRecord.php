<?php
	
	//require_once('../Persistency/Persistency.php');
	//require_once('../Persistency/FilePersistency.php');

  abstract class ActiveRecord{

  	protected $persistency;

		public function __construct(){
			$this->persistency = FilePersistency::getInstance();
		}

    public function __set($name, $value){
      $this->$name = $value;
    }

    public function __get($name){
      return $this->$name;
    }

    public function to_array(){
      $vars = get_object_vars($this);
      // There is better ways to solve this problem but lack of time :)
      unset($vars["persistency"]);
      unset($vars["contact_count"]);
      return $vars;
    }

    public function insert(){
    	$this->persistency->insert($this->to_array());
    }

    public function read(){
    	return $this->persistency->read();
    }

    public function update(){
    	return $this->persistency->update($this->to_array());
    }

    public function delete(){
    	return $this->persistency->delete($this->to_array());
    } 
 	}

?>