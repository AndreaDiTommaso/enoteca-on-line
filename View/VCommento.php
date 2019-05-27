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
class VCommento extends View {
   
    /**
     * Processa il layout scelto nella variabile _layout
     *
     * @return string
     */
    public function processaTemplate() {
        return $this->fetch('commento_'.$this->_layout.'.tpl');
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
    /**
     * restituisce il voto passato tramite GET o POST
     *
     * @return mixed
     */
    public function getVoto() {
        if (isset($_REQUEST['voto'])) {
            return $_REQUEST['voto'];
        } else
            return false;
    }
    /**
     * Restituisce il commento
     *
     * @return mixed
     */
    public function getCommento() {
        if (isset($_REQUEST['commento']))
			{
            return $_REQUEST['commento'];
	
        } else 

            return false;
		
    }

	 
}

?>