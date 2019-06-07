<?php


/**
 * @access public
 * @package Entity
 */
class EOrdineItem {
    /**
     *
     * @var int
     */
    public $id;
    public $quantita=1;
    public $vino;
    public $ordineID;
    
    public function set_vino($x) {$this->vino=$x;}
    public function set_quantita($x) {$this->quantita=$x;}
    public function set_id($x) {$this->id=$x;}
    public function set_ordineID($x) {$this->ordineID=$x;}
   
    public function get_vino() {return (int) $this->vino;}
    public function get_id() {return $this->id;}
    public function get_quantita() {return $this->quantita;}
    public function get_ordineID() {return $this->ordineID;}
/**
 * aggiunge un ordineitem nel db
 * 
 */  
   public function salva(){  
      $item=new FOrdineItem();
		$bool=$item->store($this);
	   return $bool;
	  } 
/**
 * carica tutti gli attributi di un istanza con dati presi dal db
 * 
 */  
	  public function carica ($key){

		$FOrdineItem=new FOrdineItem();
      $result=$FOrdineItem->load($key);
		$this->autoload($result);
	   
		
		return $result; 
		
	}
	/**
 * aggiorna con i propri attributi i dati salvati nel db relativi a quel ordineitem
 * 
 */
	public function aggiorna(){	
	
	
	
		$FOrdineItem=new FOrdineItem();
		$FOrdineItem->update($this);
		return $FOrdineItem;
	}
/**
 * cancella un ordineitem dal db
 * 
 */
	public function cancella(){
		$FOrdineItem=new FOrdineItem();
		$bool=$FOrdineItem->delete($this);
	
		return $bool;
		
	}
/**
 * copia gli attributi di un oggetto Eordineitem
 */ 
	public function autoload ($object){
	
	   $this->set_id($object->get_id());
		$this->set_quantita ($object->get_quantita());
		$this->set_vino ($object->get_vino());
		$this->set_ordineID($object->get_ordineID());
		
	}
      
}
?>