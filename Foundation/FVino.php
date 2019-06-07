<?php
/**
 * @access public
 * @package Foundation
 */
class FVino extends Fdb {
    public function __construct() {
        $this->_table='vino';
        $this->_key='ISBN';
        $this->_return_class='EVino';
        USingleton::getInstance('Fdb');
    }
    /**
     * restituisce tutti i vini che hanno la stessa categoria
     */
    public function getCategorie(){
        $query='SELECT DISTINCT `categoria` ' .
                'FROM `vino` ';
        $this->query($query);
        return $this->getResultAssoc();
		
    }
	
	
		
    }
	
	
	

?>
