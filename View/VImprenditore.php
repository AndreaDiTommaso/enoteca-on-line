<?php
/**
 * File VHome.php contenente la classe VHome
 *
 * @package view
 */
/**
 * Classe VHome, estende la classe view del package System e gestisce la visualizzazione e formattazione del sito, inoltre imposta i principali contenuti della pagina, suddivisi in contenuti principali (main_content) e contenuti della barra laterale (side_content)
 *
 * @package View
 */
class VImprenditore extends View {
    /**
     * @var string _layout
     */
    private $_layout='default';
    /**
     * restituisce il numero della pagina (utilizzato nella visualizzazione dei vini) passato per GET o POST
     * @return int
     */
    public function getPage() {
        if (isset($_REQUEST['page'])) {
            return $_REQUEST['page'];
        } else
            return 0;
    }
    /**
     * Processa il layout scelto nella variabile _layout
     *
     * @return string
     */
    public function processaTemplate() {
        return $this->fetch('imprenditore_'.$this->_layout.'.tpl');
   }
    /**
     * Imposta i dati nel template identificati da una chiave ed il relativo valore
     *
     * @param string $key
     * @param mixed $valore
     */
    public function impostaDati($key,$valore) {
        $this->assign($key,$valore);
    }
    /**
     * Ritorna l'id del vino passato tramite GET o POST
     *
     * @return mixed
     */
    public function getIdVino() {
        if (isset($_REQUEST['id_vino'])) {
            return $_REQUEST['id_vino'];
        } else
            return false;
    }
    /**
     * @param string $layout
     */
    public function setLayout($layout) {
        $this->_layout=$layout;
    }


	
	 public function getDati() {
        $dati_richiesti=array('ISBN','nome','proprietario','prezzo','descrizione','categoria','immagine','gradazione');
        $dati=array();
        foreach ($dati_richiesti as $dato) {
            if (isset($_REQUEST[$dato]))
                $dati[$dato]=$_REQUEST[$dato];
        }
		$dati['immagine']=$_FILES['immagine']['name'];
		
        return $dati;
    }
	
	 
}

?>