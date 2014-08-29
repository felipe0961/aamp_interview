 <?php

class FilePersistency implements Persistency {
	
	/**
   * Variable where the file information is going to be held.
   *
   * @var Array infor
   */
	private $content = array();

  /**
   * contains the fa.
   *
   * @var String where the file is going to be save
   */
  private $file_name = "";

	/**
   * Open a file where the information is saved. 
   *
   */ 
 	protected function __construct() {
 		$this->load_peristency_file();
  }

  /**
   * Get persitency file name 
   * Open it content
   * If the file is not open trow and exception
   */ 
  protected function load_peristency_file() {
  	$this->get_content_name();
  	$this->content = file_get_contents( "data/$this->file_name");
    $this->content = json_decode($this->content);

    if ($this->content === null) {
      $this->content = array();
    }
  }

  /**
   * Read from the configuration file 
   * Find where the persistent file is  
   * If the file name is not found throw an exception
   */
  protected function get_content_name(){
  	$config_file = file_get_contents( "conf/AAMP.conf", "r");
  	$this->file_name = json_decode($config_file, true)["persistency_file"];

  	if ($this->file_name === null) {
  		throw new Exception ("Unable to get persitency file name");
  	}
    return $this->file_name;
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

  public function write_to_disk(){
    file_put_contents("data/$this->file_name", 
    json_encode($this->content));
  }

  public function find($array){
    $size = count($this->content); 
    for ($i = 0; $i < $size; $i++) {
      if( $array["id"] == $this->content[$i]->id){
        return $i;
      }
    }

    return -1; 
  }
  
  /**
   * Insert information. 
   * @param array $array Active Record Information.
   */  
  public function insert($array){
    array_push($this->content, $array);
    $this->write_to_disk();
    return true;
  }
    
  /**
   * Read all the information. 
   * @param array $array Active Record Information.
   */
  public function read(){
    return $this->content;
  }
    
  /**
   * Update information. 
   * @param JSON $array Active Record Information.
   */
  public function update($array){
    $position = $this->find($array);
    if ($position === -1){
      return false;
    }


    $this->content[$position]->name = $array["name"] ? $array["name"] : $this->content[$position]->name;
    $this->content[$position]->email = $array["email"] ? $array["email"] : $this->content[$position]->name;
    $this->write_to_disk();
    return true;
  }
    
  /**
   * Delete information 
   * @param JSON $array Active Record Information.
   */
  public function delete($array){
    $position = $this->find($array);  
    if ($position === -1){
      return false;
    }
    unset($this->content[$position]);
    $this->write_to_disk();
    return true;
  }
}

?>