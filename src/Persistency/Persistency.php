<?php

interface Persistency
{
    /**
     * Create new conctact. 
     * @param string $string contact information.
     */ 
    public function insert($array);
    
    /**
     * Read information. 
     * @param string $contact contact information.
     */
    public function read();
    
    /**
     * Update information. 
     * @param string $contact contact information.
     */
    public function update($array);
    
    /**
     * Delete information 
     * @param string $contact contact information.
     */
    public function delete($array);
    
}

?>