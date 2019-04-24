<?php
<?php
class EVino {
	 public $id;
    public $nome;
    public $proprietario;
    public $colore;
    public $gradazione;
    public $provenienza;
    public $dimensione;
    public $prezzo;
    public $tipo;
    public $descrizione;
    public $immagine;
    
    public function get_id( return $this->id;){return $this->id;}
    public function get_nome(){return $this->nome;}
    public function get_proprietario(){return $this->proprietario;}
    public function get_colore(){return $this->colore;}
    public function get_gradazione(){return $this->gradazione;}
    public function get_provenienza(){return $this->provenienza;}
    public function get_dimensione(){return $this->dimensione;}
    public function get_prezzo(){return $this->prezzo;}
    public function get_tipo(){return $this->tipo;}
    public function get_descrizione(){return $this->descrizione;}
    public function get_immagine(){return $this->immagine;}
    
    public function set_id (int $x){ $this->id=$x;}
    public function set_nome (string $x){$this->nome=$x;}
    public function set_proprietario (int $x){$this->proprietario=$x;}
    public function set_colore (string $x){$this->colore=$x;}
    public function set_gradazione (float $x){$this->gradazione=$x;}
    public function set_provenienza (string $x){$this->provenienza=$x;}
    public function set_dimensione (float $x){$this->dimensione=$x;}
    public function set_prezzo (float $x){$this->prezzo=$x;}
    public function set_tipo (string $x){$this->tipo=$x;}
    public function set_descrizione (string $x){$this->descrizione=$x;}
    public function set_immagine (object $x){$this->immagine=$x;}

    
    }

?>
?>