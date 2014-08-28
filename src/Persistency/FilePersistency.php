 <?php

class FilePersistency implements Persistency {
	
	/**
   * Variable where the file information is going to be held.
   *
   * @var File Resource
   */
	private $persistency_file

	/**
   * Open a file where the information is saved. 
   *
   */ 
 	protected function __construct() {
 		$this->load_peristency_file();
  }

  /**
   * Get persistency file name 
   * Open it content
   * If the file is not open trow and exception
   */ 
  protected load_peristency_file() {
  	$file_name = get_persistency_file_name();
  	$this->persistency_file = fopen( $file_name, "rw");
  	
  	if (!$this->$persistency_file) {
  		throw new Exception ("Unable open the persistency !");
  	}	
  }

  /**
   * Read from the configuration file 
   * Find where the persisten file is  
   * If the file name is not found throw an exception
   */
  protected get_persistency_file_name(){
  	$config_file = fopen( "AAMP.conf", "r");
  	$file = json_decode($config_file, true)["persitency_file"];

  	if ($file === null) {
  		throw new Exception ("Missing varible persistency_file in conf file");
  	}
  }

  /**
   * Returns the *Singleton* instance of this class.
   *
   */ 
  public static function getInstance()
  {
      static $instance = null;
      if (null === $instance) {
          $instance = new FilePersistency();
      }

      return $instance;
  }

	/**
   * Make sure the file is close when this class is destroy
   *
   */ 
 	public function __destruct() {
    	fclose($this->persistency_file);
  }
}

?>