<?php
<?php
class EOrdine {
	 public $id;
    public $data;
    public $pagato;
    public $utente;
    public $confermato;
  
    public function get_id( return $this->id;){return $this->id;}
    public function get_data(){return $this->data;}
    public function get_pagato(){return $this->pagato;}
    public function get_utente(){return $this->utente;}
    public function get_confermato(){return $this->confermato;}
    
    public function set_id(int $x){ $this->id=$x;}
    public function set_data(DateTime $x){$this->data=$x;}
    public function set_pagato(bool $x){$this->pagato=$x;}
    public function set_utente(int $x){$this->utente=$x;}
    public function set_confermato(bool $x){$this->confermato=$x;}

    
    }

?>
?>