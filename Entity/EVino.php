<?php
/**
 * @access public
 * @package Entity
 */
class EVino {
	 public $ISBN;
    public $nome;
    public $proprietario;
    public $prezzo;
    public $descrizione;
    public $categoria;
    public $immagine;
	public $gradazione;
	public $utente;
	 
	 
	 public $_commento = array();
	
	
	 public function get_ISBN(){return $this->ISBN;}
    public function get_nome(){return $this->nome;}
    public function get_proprietario(){return $this->proprietario;}
    public function get_prezzo(){return $this->prezzo;}
    public function get_descrizione(){return $this->descrizione;}
    public function get_categoria(){return $this->categoria;}
    public function get_immagine(){return $this->immagine;}
    public function get_gradazione(){return $this->gradazione;}
    public function getCommenti() {return ($this->_commento);}
    public function get_utente() {return ($this->utente);}
	
   
   
    public function set_ISBN ( $x){ $this->ISBN=$x;}
    public function set_nome ( $x){$this->nome=$x;}
    public function set_proprietario ( $x){$this->proprietario=$x;}
    public function set_prezzo( $x){$this->prezzo=$x;}
    public function set_descrizione ( $x){$this->descrizione=$x;}
    public function set_categoria( $x){$this->categoria=$x;}
    public function set_immagine( $x){$this->immagine=$x;}
    public function set_gradazione( $x){$this->gradazione=$x;}
    public function set_utente( $x){$this->utente=$x;}
    public function addCommento(ECommento $commento) {array_push($this->_commento, $commento);}

/**
 * copia gli attributi di un oggetto Evino
 */ 
    
	 public function autoload ($object){
	 	
	   $this->set_utente($object->get_utente());
	   $this->set_ISBN($object->get_ISBN());
		$this->set_nome ($object->get_nome());
		$this->set_proprietario($object->get_proprietario());
		$this->set_prezzo($object->get_prezzo());
		$this->set_descrizione($object->get_descrizione());
		$this->set_categoria($object->get_categoria());
		$this->set_immagine($object ->get_immagine());
		$this->set_gradazione($object->get_gradazione());
	
		
	}
/**
 * restituisce la media dei voti di un vino
 * 
 */
    public function getMediaVoti() {
        $somma=0;
        $voti=0;
        if ($this->_commento!= false)
        $voti=count($this->_commento);
        if ($voti>1) {
            foreach ($this->_commento as $commento) {
                $somma+=$commento->voto;
            }
            return $somma/$voti;
        }
        elseif (isset($this->_commento[0]->voto))
            return $this->_commento[0]->voto;
        else
            return false;
    }
/**
 * carica tutti gli attributi di un istanza con dati presi dal db
 * 
 */
    public function carica($dati){
		$FVino=new FVino();
      $result=$FVino->load($dati);
		if($result!=false)
		{$this->autoload($result);}
	    else
		{$this->set_ISBN($dati);}
		$parametri=array();
      $parametri[]=array('vinoISBN','=',$dati);
      $FCommento=new FCommento();
      $this->_commento=$FCommento->search($parametri);
		return $result; 
		
	}
/**
 * aggiorna con i propri attributi i dati salvati nel db relativi a quel vino
 * 
 */
	 public function aggiorna(){
		$FVino=new FVino();
		$FVino->update($this);
		return $FVino;
	}
/**
 * aggiunge un vino nel db
 * 
 */
	 public function salva(){
		$FVino=new FVino();
		$bool=$FVino->store($this);
		
		return $bool;
		
	}
/**
 * cancella un vino dal db
 * 
 */
	 public function cancella(){
		$FVino=new FVino();
		$bool=$FVino->delete($this);
		if ($this->_commento!=false)
		{
			$num=count($this->_commento);
			print_r($num);
			for($i=0;$i<$num;$i++)
			{
				$comm=$this->_commento[$i];
				$comm->cancella();
			}
		}
		return $bool;
		
	}
/**
 * effettua una ricerca nel db
 * 
 */
	 public function cerca($parametri = array(), $ordinamento = '', $limit=''){
	
        $FVino=new FVino();
		$risultato=$FVino->search($parametri , $ordinamento, $limit );
		
		return $risultato;
    }
}
	
?>