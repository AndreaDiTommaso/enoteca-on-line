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
    public function store( $vino) {
        parent::store($vino);
        $FCommento=new FCommento();
        $arrayCommentiEsistenti=$FCommento->loadCommenti($vino->ISBN);
        if ($arrayCommentiEsistenti!=false) {
            foreach ($arrayCommentiEsistenti as $itemCommento) {
                $FCommento->delete($itemCommento);
            }
        }
        $arrayCommenti=$vino->getCommenti();
        foreach ($arrayCommenti as &$commento) {
            $commento->vinoISBN=$vino->ISBN;
            $FCommento->store($commento);
        }
    }
    public function load ($key) {
        $vino=parent::load($key);
        $FCommento=new FCommento();
        $arrayCommenti=$FCommento->loadCommenti($vino->ISBN);
        $vino->_commento=$arrayCommenti;
        return $vino;
    }
	
	    
    

    public function delete( & $vino) {
        $arrayCommenti=& $vino->getCommenti();
        $FCommento= new FCommento();
        foreach ($arrayCommenti as &$commento) {
            $FCommento->delete($commento);
        }
        parent::delete($vino);
    }
    
     /**
     * Seleziona sul database le diverse categorie esistenti per i vari vini
     *
     * @return array
     */
    public function getCategorie(){
        $query='SELECT DISTINCT `categoria` ' .
                'FROM `vino` ';
        $this->query($query);
        return $this->getResultAssoc();
    }
	
	
	
}

?>
