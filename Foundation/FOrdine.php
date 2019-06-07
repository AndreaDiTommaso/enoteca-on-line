<?php
/**
 * @access public
 * @package Foundation
 */
class FOrdine extends Fdb{
    public function __construct() {
        $this->_table='ordine';
        $this->_key='id';
        $this->_auto_increment=true;
        $this->_return_class='EOrdine';
        USingleton::getInstance('Fdb');
    }
  
  /**
   * restituisce l'id dell'ultimo ordine effettuato
   */
    public function ultimoid()
    {
    	$somma=0;
    	$arrayordini=$this->search();
    	if($arrayordini!=false)
		{$j=count($arrayordini);
		for($i=0;$i<$j;$i++)
		{
			$ordine=$arrayordini[$i];
			$a=$ordine->id;
			if($a>$somma)
			$somma=$a;
		
		}
	}
		return $somma;
    }
}

?>
