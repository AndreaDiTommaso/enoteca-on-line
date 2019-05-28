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
     
   public function salva(){  
      $item=new FOrdineItem();
		$bool=$item->store($this);
	   return $bool;
	  }   public function carica ($key){

		$FOrdineItem=new FOrdineItem();
      $result=$FOrdineItem->load($key);
		$this->autoload($result);
	   
		
		return $result; 
		
	}
	public function aggiorna(){	
	
	
	
		$FOrdineItem=new FOrdineItem();
		$FOrdineItem->update($this);
		return $FOrdineItem;
	}
	public function cancella(){
		$FOrdineItem=new FOrdineItem();
		$bool=$FOrdineItem->delete($this);
	
		return $bool;
		
	}
	public function autoload ($object){
	
	   $this->set_id($object->get_id());
		$this->set_quantita ($object->get_quantita());
		$this->set_vino ($object->get_vino());
		$this->set_ordineID($object->get_ordineID());
		
	}
      
}
?>