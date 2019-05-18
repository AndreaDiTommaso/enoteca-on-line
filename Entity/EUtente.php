<?php

/**
 * @access public
 * @package Entity
 */
class EUtente {
	
    public $nome;
    public $cognome;
    public $username;
    public $password;
    public $email;
    public $via;
    public $CAP;
    public $citta;
    public $codice_attivazione;
	public $tipo='G';
    public $stato='non_attivo';
	public $immagine;
	
	public function get_username(){return $this->username;}
    public function get_nome(){return $this->nome;}
    public function get_cognome(){return $this->cognome;}
    public function get_password(){return $this->password;}
    public function get_email(){return $this->email;}
    public function get_via(){return $this->via;}
    public function get_CAP(){return $this->CAP;}
    public function get_citta(){return $this->citta;}
    public function get_tipo(){return $this->tipo;}
    public function get_stato(){return $this->stato;}
	public function get_immagine(){return $this->immagine;}
    
    public function set_username ( $x){ $this->username=$x;}
    public function set_nome ( $x){$this->nome=$x;}
    public function set_cognome ( $x){$this->cognome=$x;}
    public function set_password ( $x){$this->password=$x;}
    public function set_email ( $x){$this->email=$x;}
    public function set_via ( $x){$this->via=$x;}
    public function set_CAP ( $x){$this->CAP=$x;}
    public function set_citta ( $x){$this->citta=$x;}
    public function set_tipo ( $x){$this->tipo=$x;}
    public function set_stato ( $x){$this->stato=$x;}
	public function set_codice_attivazione($x){$this->codice_attivazione=$x;}
	public function set_immagine($x){$this->immagine=$x;}
	
	
    public $_ordini = array();
	
	public function autoload ($object){
	
	    $this->set_username($object->get_username());
		$this->set_nome ($object->get_nome());
		$this->set_cognome ($object->get_cognome());
		$this->set_password ($object->get_password());
		$this->set_email ($object->get_email());
		$this->set_via ($object->get_via());
		$this->set_stato ($object ->get_stato());
		$this->set_citta ($object->get_citta());
		$this->set_CAP ($object->get_CAP());
		$this->set_tipo ($object->get_tipo());
		$this->set_codice_attivazione($object->getCodiceAttivazione());
		$this->set_immagine($object->get_immagine());
		
	}
   public function generaCodiceAttivazione() {
        $this->codice_attivazione=mt_rand();
    }
   public function addOrdine(EOrdine $aOrdine) {
        $this->_ordini[]=$aOrdine;
    }
   public function getOrdini() {
        return $this->_ordini;
    }
   public function getAccountAttivo() {
        if ($this->stato=='attivo')
            return true;
        else
            return false;
    }
   public function getCodiceAttivazione() {
        return $this->codice_attivazione;
    }
	public function carica ($dati_registrazione){

		$FUtente=new FUtente();
        $result=$FUtente->load($dati_registrazione);
		if($result!=false)
		{$this->autoload($result);}
	    else
		{$this->set_username($dati_registrazione);}
		
		return $result; 
		
	}
	public function aggiorna(){
		$FUtente=new FUtente();
		$FUtente->update($this);
		return $FUtente;
	}
	public function salva(){
		
		$FUtente=new FUtente();
		$bool=$FUtente->store($this);
		return $bool;
	}
	
}
?>