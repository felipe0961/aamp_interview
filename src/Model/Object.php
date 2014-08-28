<?
	class Object{

		public function __set($name, $value){
        	echo "Setting '$name' to '$value'\n";
        	$this->"$name" = $value;
    	}

    	public function __get($name){
        	echo "Setting '$name' to '$value'\n";
        	return $this->"$name"
    	}

		public to_json(){
			$vars = get_object_vars($this)
			return json_encode($vars)
		}
	}
?>