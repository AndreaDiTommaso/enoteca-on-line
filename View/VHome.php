<?php
/**
 * File VHome.php contenente la classe VHome
 *
 * @package view
 */
/**
 * Classe VHome, estende la classe view e gestisce la visualizzazione e formattazione del sito, inoltre imposta i principali contenuti della pagina, suddivisi in contenuti principali (main_content) e contenuti della barra laterale (side_content)
 *
 * @package View
 */
class VHome extends View {
    /**
     * @var string $_main_content
     */
    private $_main_content;
    /**
     * @var array $_main_button
     */
    private $_main_button=array();
    /**
     * @var string $_side_content
     */
    private $_side_content;
    /**
     * @var array $_side_button
     */
    private $_side_button=array();
    /**
     * @var string $_layout
     */
    private $_layout='default';
	
    /**
     * Assegna il contenuto al template e lo manda in output
     */
    public function mostraPagina() {
	
        $this->assign('right_content',$this->_side_content);
        $this->assign('tasti_laterali',$this->_side_button);
        $this->display('home_'.$this->_layout.'.tpl');
    }
    /**
     * imposta il contenuto principale alla variabile privata della classe
     */
    public function impostaContenuto($contenuto) {
        $this->_main_content=$contenuto;
    }
    /**
     * Restituisce il controller passato tramite richiesta GET o POST
     *
     * @return mixed
     */
    public function getController() {
        if (isset($_REQUEST['controller']))
            return $_REQUEST['controller'];
        else
            return false;
    }
    /**
     * Imposta la pagina per gli utenti registrati/autenticati
     */
    public function impostaPaginaRegistrato() {
        $session=USingleton::getInstance('USession');
        $this->assign('title','Enoteca On-line');
		$nome_cognome=$session->leggi_valore('nome_cognome');
        $this->assign('content_title','Benvenuto <b>'.$nome_cognome .'</b>');
        $this->assign('menu',$this->_main_button);
		$this->assign('main_content',$this->_main_content);
        $this->aggiungiTastoLogout();
		
    }
	public function impostaPaginaImprenditore() {
        $session=USingleton::getInstance('USession');
        $this->assign('title','Enoteca On-line');
		$nome_cognome=$session->leggi_valore('nome_cognome');
        $this->assign('content_title','Benvenuto <b>'.$nome_cognome .'</b>');
        $this->assign('menu',$this->_main_button);
		$this->assign('main_content',$this->_main_content);
        $this->aggiungiTastoLogout();
		$this->aggiungiTastoImprenditore();
		
    }
	
    /*
     * imposta la pagina per gli utenti non registrati/autenticati
     */
    public function impostaPaginaGuest() {
        $this->assign('title','Enoteca On-line');
        $this->assign('menu',$this->_main_button);
		$this->assign('main_content',$this->_main_content);
        $this->aggiungiTastoRegistrazione();
    }
    /**
     * aggiunge il tasto logout al menu laterale
     */
    public function aggiungiTastoLogout() {
        $tasto_logout_profilo=array();
		$tasto_logout_profilo[]=array('testo' => 'Profilo', 'link' => '?controller=registrazione&task=profilo');
        $tasto_logout_profilo[]=array('testo' => 'Logout', 'link' => '?controller=registrazione&task=esci');
        $this->_side_button=array_merge($tasto_logout_profilo,$this->_side_button);
    }
	
	public function aggiungiTastoImprenditore(){
		$tasto_vini=array();
		$tasto_vini[]=array('testo' => 'I miei vini', 'link' => '?controller=imprenditore&task=imprenditore');
		$this->_side_button=array_merge($tasto_vini,$this->_side_button);
		
		
	}
    /**
     * aggiunge il tasto per la registrazione nel menu laterale (per gli utenti non autenticati)
     */
    public function aggiungiTastoRegistrazione() {
        $menu_registrazione=array();
        $menu_registrazione[]=array('testo' => 'Attivati', 'link' => '?controller=registrazione&task=attivazione');
		$menu_registrazione2=array();
		$menu_registrazione[]=array('testo' => 'Registrati', 'link' => '?controller=registrazione&task=registra');
		$this->_side_button[]=array_merge(array('testo' => 'Login', 'link' => '?controller=registrazione&task=login', 'submenu' => $menu_registrazione, 'submenu2'=>$menu_registrazione2),$this->_side_button);
    }
   	
}

?>