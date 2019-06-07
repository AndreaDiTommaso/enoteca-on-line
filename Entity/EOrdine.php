/**
 * copia gli attributi di un oggetto Evino
 */<?php

/**
 * @access public
 * @package Entity
 */
class EOrdine {
    
    public $id;
    public $data;
    public $pagato=false;
    public $confermato=false;
    public $utente;
	 public $cartacredito;
	 
	 public $_item = array();
	
	
	 public function get_id(){return $this->id;}
    public function get_data(){return $this->data;}
    public function get_pagato(){return $this->pagato;}
    public function get_confermato(){return $this->confermato;}
    public function get_utente() {return $this->utente;}
    public function get_cartacredito() {return $this->cartacredito;}
   
   
   public function set_id(int $x){ $this->id=$x;}
   public function set_pagato($pagato) {$this->pagato=$pagato;}
   public function set_confermato($confermato) {$this->confermato=$confermato;}
   public function set_utente( $utente) {$this->utente=$utente;}
   public function set_cartacredito( $cartaCredito) {$this->cartacredito=$cartaCredito;}
   public function set_data($data) {
        $anno=substr($data, 6);
        $mese=substr($data, 3, 2);
        $giorno=substr($data, 0, 2);
        $this->data="$anno-$mese-$giorno";
    }
    
/**
 * copia gli attributi di un oggetto Eordine
 */ 
	
  public function autoload ($object){
	
	   $this->set_id($object->get_id());
		$this->set_data ($object->get_data());
		$this->set_pagato ($object->get_pagato());
		$this->set_confermato ($object->get_confermato());
		$this->set_utente($object->get_utente());
		$this->set_cartacredito($object->get_cartacredito());
		
		
	}
  public function getPrezzoTotale() {
        $prezzo=0;
        if (count($this->_item)>0) {
            foreach($this->_item as $item) {
            	$vino=new EVino();
            	$vino->carica($item->get_vino());
                $prezzo += $vino->get_prezzo()*$item->quantita;
            }
        }
        return $prezzo;
    }
  public function addItem(EOrdineItem $item) {
        $itemVino=new EVino();
        $itemVino->carica($item->get_vino());
        $aggiornato=false;
        foreach ($this->_item as & $thisItem) {
            $thisVino=$thisItem->get_vino();
            $EVino=new EVino();
            $EVino->carica($thisVino);
            if ($EVino->get_ISBN()==$itemVino->get_ISBN()) {
                $thisItem->quantita++;
                $aggiornato=true;
            }
        }
        if (!$aggiornato)
            $this->_item[]=$item;
    }
  public function getItems() {
        return $this->_item;
    }
  public function removeItem($pos) {
        unset($this->_item[$pos]);
        $this->_item=array_values($this->_item);
    }
/**
 * aggiorna con i propri attributi i dati salvati nel db relativi a quel ordine
 * 
 */
  public function aggiorna(){
		$FOrdine=new FOrdine();
		$FOrdine->update($this);
		return $FOrdine;
	}
/**
 * aggiunge un ordine nel db
 * 
 */
  public function salva(){
      $FOrdine=new FOrdine();
		$bool=$FOrdine->store($this);
		$id=$FOrdine->ultimoid();
		$num=count($this->_item);
		for($i=0;$i<$num;$i++)
		{
			$this->_item[$i]->ordineID=$id;
			$this->_item[$i]->salva();
		}
	
		return $bool;
		 
    }
    /**
 * carica tutti gli attributi di un istanza con dati presi dal db
 * 
 */
  public function carica($key){    
 
       
       
        $FUtente=new FOrdine();
        $result=$FUtente->load($key);
        $parametri=array();
        $parametri[]=array('ordineID','=',$key);
        $FOrdine=new FOrdine();
        $this->_item=$FOrdine->search($parametri);
        return $result;
    }
/**
 * cancella un ordine dal db
 * 
 */
  public function cancella(){
		$FOrdine=new FOrdine();
		$bool=$FOrdine->delete($this);
		if ($this->_item!=false)
		{
			$num=count($this->_item);
			for($i=0;$i<$num;$i++)
			{
				$it=$this->_item[$i];
				$it->cancella();
			}
		}
		return $bool;
		
	}
	
	  
 
}
?>