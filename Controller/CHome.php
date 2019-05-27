<?php
/**
 * @access public
 * @package Controller
 */
class CHome {
    /**
     * Imposta la pagina, controlla l'autenticazione
     */
    public function impostaPagina () {
        $CRegistrazione=USingleton::getInstance('CRegistrazione');
        $registrato=$CRegistrazione->getUtenteRegistrato();
        $VHome= USingleton::getInstance('VHome');
        $contenuto=$this->smista();
        //$fvino=USingleton::getInstance('FVino');
		$imprenditore=$CRegistrazione->getUtenteImprenditore();
        $VHome->impostaContenuto($contenuto);
        if ($registrato) 
		{
			if($imprenditore)
			$VHome->impostaPaginaImprenditore();	
			else
			$VHome->impostaPaginaRegistrato();
        }
		else {
            $VHome->impostaPaginaGuest();
        }
		
        $VHome->mostraPagina();
    }
    /**
     * Smista le richieste ai vari controller
     *
     * @return mixed
     */
    public function smista() {
        $view=USingleton::getInstance('VHome');
		
        switch ($view->getController()) {
            case 'registrazione':
                $CRegistrazione=USingleton::getInstance('CRegistrazione');
                return $CRegistrazione->smista();
            case 'ricerca':
                $CRicerca=USingleton::getInstance('CRicerca');
                return $CRicerca->smista();
            case 'ordine':
                $COrdine=USingleton::getInstance('COrdine');
                return $COrdine->smista();
			case 'imprenditore':
				$CImprenditore=USingleton::getInstance('CImprenditore');
                return $CImprenditore->smista();
			case 'commento':
				$CCommento=USingleton::getInstance('CCommento');
                return $CCommento->smista();
			default:
                $CRicerca=USingleton::getInstance('CRicerca');
                return $CRicerca->ultimiArrivi();

            
        }
    }
}

?>
