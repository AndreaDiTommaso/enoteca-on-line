<?php
/**
 * @access public
 * @package Entity
 */
class ECartaCredito {
    public $nome_titolare;
    public $cognome_titolare;
    public $data_scadenza;
    public $numero;
    public $ccv;
    public $utente;
    
    
      
    public function set_nome_titolare($x) {$this->nome_titolare=$x;}
    public function set_cognome_titolare($x) {$this->cognome_titolare=$x;}
    public function set_data_scadenza($data) {
        $anno='20'.substr($data, 3);
        $mese=substr($data, 0, 2);
        $giorno='01';
        $this->data_scadenza="$anno-$mese-$giorno";
    }
    public function set_numero($x) {$this->numero=$x;}
    public function set_ccv($x) {$this->ccv=$x;}
    public function set_utente($x) {$this->utente=$x;}
   
    public function get_nome_titolare() {return $this->nome_titolare;}
    public function get_cognome_titolare() {return $this->cognome_titolare;}
    public function get_data_scadenza() {return $this->data_scadenza;}
    public function get_numero() {return $this->numero;}
    public function get_ccv() {return $this->ccv;}
    public function get_utente() {return $this->utente;}

   
    public function eScaduta() {
        $date2 = time();
        $dateArr = explode("-",$this->data_scadenza);
        $date1Int = mktime(0,0,0,$dateArr[1],$dateArr[2],$dateArr[0]) ;
        if (($date1Int-$date2)<0)
            return true;
        else
            return false;
    }
   
/**
 * aggiunge una carta di credito nel db
 * 
 */
   public function salva(){
      $carta=new FCartaCredito();
		$bool=$carta->store($this);
		return $bool;
		}
/**
 * carica tutti gli attributi di un istanza con dati presi dal db
 * 
 */
	public function carica ($key){

		$FCartaCredito=new FCartaCredito();
      $result=$FCartaCredito->load($key);
		$this->autoload($result);
	   return $result; 
		
	}
	/**
 * aggiorna con i propri attributi i dati salvati nel db relativi a quella carta di credito
 * 
 */
	public function aggiorna(){	
	   $FCartaCredito=new FCartaCredito();
		$FCartaCredito->update($this);
		return $FCartaCredito;
	}
/**
 * cancella una carta di credito dal db
 * 
 */
	public function cancella(){
		$FCartaCredito=new FCartaCredito();
		$bool=$FCartaCredito->delete($this);
	
		return $bool;
		
	}
/**
 * copia gli attributi di un oggetto Ecartadicredito
 */ 
	public function autoload ($object){
	
	   $this->set_nome_titolare($object->get_nome_titolare());
		$this->set_cognome_titolare ($object->get_cognome_titolare());
		$this->set_ccv ($object->get_ccv());
		$this->set_utente($object->get_utente());
		$this->set_data_scadenza ($object->get_data_scadenza());
		$this->set_numero($object->get_numero());
		
	}
      
}
?>