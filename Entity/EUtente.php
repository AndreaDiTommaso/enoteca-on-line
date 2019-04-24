<?php
class EUtente {
	 public $id;
    public $nome;
    public $cognome;
    public $password;
    public $email;
    public $indirizzo;
    public $CAP;
    public $citta;
    public $tipo;
    public $codice_attivazione;
    public $stato;
 stato bool,
    
   // public $codice_attivazione;
    //public $stato='non_attivo';
    public function get_id( return $this->id;){return $this->id;}
    public function get_nome(){return $this->nome;}
    public function get_cognome(){return $this->cognome;}
    public function get_password(){return $this->password;}
    public function get_email(){return $this->email;}
    public function get_indirizzo(){return $this->indirizzo;}
    public function get_cap(){return $this->cap;}
    public function get_citta(){return $this->citta;}
    public function get_tipo(){return $this->tipo;}
    public function get_codice_attivazione(){return $this->codice_attivazione;}
    public function get_stato(){return $this->stato;}
    
    public function set_id (int $x){ $this->id=$x;}
    public function set_nome (string $x){$this->nome=$x;}
    public function set_cognome (string $x){$this->cognome=$x;}
    public function set_password (string $x){$this->password=$x;}
    public function set_email (string $x){$this->email=$x;}
    public function set_indirizzo (string $x){$this->indirizzo=$x;}
    public function set_cap (string $x){$this->cap=$x;}
    public function set_citta (string $x){$this->citta=$x;}
    public function set_tipo (string $x){$this->tipo=$x;}
    public function set_codice_attivazione (int $x){$this->codice_attivazione=$x;}
    public function set_stato (bool $x){$this->stato=$x;}

    
    }

?>