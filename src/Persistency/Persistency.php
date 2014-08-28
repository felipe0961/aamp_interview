<?php

interface Persistency
{
    /**
     * Create new conctact. 
     * @param string $string contact information.
     */ 
    public function create($string);
    
    /**
     * Read information. 
     * @param string $contact contact information.
     */
    public function read($string);
    
    /**
     * Update information. 
     * @param string $contact contact information.
     */
    public function update($string);
    
    /**
     * Delete information 
     * @param string $contact contact information.
     */
    public function delete($string);
    
}

?>