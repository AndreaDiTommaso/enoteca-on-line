<?php
/**
 * @access public
 * @package Controller
 */
class CRicerca {
  
   private $_vini_per_pagina=4;
	
	public function ultimiArrivi() {
        $view = USingleton::getInstance('VRicerca');
        $this->_vini_per_pagina=2;
		  $EVino=new EVino();
        $limit=$view->getPage()*$this->_vini_per_pagina.','.$this->_vini_per_pagina;
        $num_risultati=count($EVino->cerca());
        $pagine = ceil($num_risultati/$this->_vini_per_pagina);
        $risultato=$EVino->cerca(array(), '`ISBN` DESC' , $limit);
        if ($risultato!=false) {
            $array_risultato=array();
            foreach ($risultato as $item) {
                $tmpVino=$EVino->carica($item->get_ISBN());
                $array_risultato[]=array_merge(get_object_vars($tmpVino),array('media_voti'=>$tmpVino->getMediaVoti()));
            }
        }
        $view->impostaDati('pagine',$pagine);
        $view->impostaDati('task','ultimi_arrivi');
        $view->impostaDati('dati',$array_risultato);
        return $view->processaTemplate();
    }
	
	
   public function lista(){
        $view = USingleton::getInstance('VRicerca');
        $EVino=new EVino();
        $parametri=array();
        $categoria=$view->getCategoria();
        $parola=$view->getParola();
        if ($categoria!=false){
            $parametri[]=array('categoria','=',$categoria);
        }
        if ($parola!=false){
        	   if ($parola=='bianco' or $parola=='rosso' or $parola=='rosato')
        	   {$parametri[]=array('categoria','=',$parola);}
        	   else
            {$parametri[]=array('descrizione','LIKE','%'.$parola.'%');}
        }
        $limit=$view->getPage()*$this->_vini_per_pagina.','.$this->_vini_per_pagina;
        $num_risultati=count($EVino->cerca($parametri));
        $pagine = ceil($num_risultati/$this->_vini_per_pagina);
        $risultato=$EVino->cerca($parametri, '', $limit);
        if ($risultato!=false) {
            $array_risultato=array();
            foreach ($risultato as $item) {
                $tmpVino=$EVino->carica($item->get_ISBN());
                $array_risultato[]=array_merge(get_object_vars($tmpVino),array('media_voti'=>$tmpVino->getMediaVoti()));
            }
        }
        $view->impostaDati('pagine',$pagine);
        $view->impostaDati('task','lista');
        $view->impostaDati('parametri','categoria='.$categoria.'&stringa='.$parola);
        $view->impostaDati('dati',$array_risultato);
		$session=USingleton::getInstance('USession');
		
		
		return $view->processaTemplate(); 
    }
	
	
   public function dettagli() {
        $view = USingleton::getInstance('VRicerca');
        $id_vino=$view->getIdVino();
        $EVino=new EVino();
		  $vino=$EVino->carica($id_vino);
        $commenti=$EVino->getCommenti();
        $arrayCommenti=array();
        $dati=get_object_vars($vino);

	if ( is_array( $commenti )  ) {
	    foreach ($commenti as $commento){
		$arrayCommenti[]=get_object_vars($commento);
	    }
        }
        

        $dati['commento']=$arrayCommenti;
        $view->impostaDati('dati',$dati);

        $session=USingleton::getInstance('USession');
        $username=$session->leggi_valore('username');
        if ($username!=false)
            $view->setLayout('dettagli_registrato');
        else
            $view->setLayout('dettagli');
  
		$session=USingleton::getInstance('USession');
		if ($session->leggi_valore('username')==true){
			$utente=new EUtente();
			$utente->carica($_SESSION["username"]);
			$tipo=$utente->get_tipo();
			if ($tipo == 'A') {
				
			
			
			$view->setLayout('dettagli_amministratore');
			
			}
			
		}
		return $view->processaTemplate();
    }
	

	
	
   public function smista() {
        $view=USingleton::getInstance('VRegistrazione');
	
        switch ($view->getTask()) {
            case 'ultimi_arrivi':
                return $this->ultimiArrivi();
            case 'dettagli':
                return $this->dettagli();
		    case 'lista':
                return $this->lista();
            case 'Cerca':
                return $this->lista();
		
			
        }
    }
}
?>
