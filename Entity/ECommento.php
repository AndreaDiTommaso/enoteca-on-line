<?php
/**
 * @access public
 * @package Entity
 */
class ECommento {
	
	public $id;
	public $testo;
	public $voto;
	public $vinoISBN;
	
	
	 public function get_vinoISBN(){return $this->vinoISBN;}
	 public function get_id(){return $this->id;}
    public function get_testo(){return $this->testo;}
    public function get_voto(){return $this->voto;}
  
    public function set_vinoISBN($x){$this->vinoISBN=$x;}
    public function set_id( $x){ $this->id=$x;}
    public function set_testo( $x){$this->testo=$x;}
    public function set_voto( $x){$this->voto=$x;}
    /**
 * copia gli attributi di un oggetto Ecommento
 */ 
	
	public function autoload ($object){
	
	    $this->set_id($object->get_id());
		$this->set_testo($object->get_testo());
		$this->set_voto($object->get_voto());
		$this->set_vinoISBN($object->get_vinoISBN());
		
	}
	/**
 * carica tutti gli attributi di un istanza con dati presi dal db
 * 
 */
	public function carica($dati){

		$FCommento=new FCommento();
       $result=$FCommento->load($dati);
		if($result!=false)
		{$this->autoload($result);}
	    else
		{$this->set_id($dati);}
		return $result; 
	}
/**
 * aggiorna con i propri attributi i dati salvati nel db relativi a quel commento
 * 
 */
	public function aggiorna(){
		$FCommento=new FCommento();
		$FCommento->update($this);
		return $FCommento;
	}
/**
 * aggiunge un commento nel db
 * 
 */
	public function salva(){
		$FCommento=new FCommento();
		$bool=$FCommento->store($this);
		return $bool;
	}
/**
 * cancella un commento dal db
 * 
 */
	public function cancella(){
		$FCommento=new FCommento();
		$bool=$FCommento->delete($this);
		return $bool;
		
	}

	
	
}

?>