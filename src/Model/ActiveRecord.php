<?php
	
	//require_once('../Persistency/Persistency.php');
	//require_once('../Persistency/FilePersistency.php');

  abstract class ActiveRecord{

  	protected $persistency;

    /**
    * Initialize persistency object
    */
		public function __construct(){
			$this->persistency = FilePersistency::getInstance();
		}

    /**
    * Setter function for every attribute
    */
    public function __set($name, $value){
      $this->$name = $value;
    }

    /**
    * Getter function for every attribute
    */
    public function __get($name){
      return $this->$name;
    }

    /**
    * Get every no private attribute into an array and return this one  
    */
    public function to_array(){
      $vars = get_object_vars($this);
      // There is better ways to solve this problem but lack of time :)
      unset($vars["persistency"]);
      unset($vars["contact_count"]);
      return $vars;
    }

    /**
    * Insert object into the persistency object  
    */
    public function insert(){
    	$this->persistency->insert($this->to_array());
    }

    /**
    * Get all the information  
    */
    public function read(){
    	return $this->persistency->read();
    }

    /**
    * Update the persistent information on 
    */
    public function update(){
    	return $this->persistency->update($this->to_array());
    }

    /**
    * Insert object into the persistency object  
    */
    public function delete(){
    	return $this->persistency->delete($this->to_array());
    } 
 	}

?>