
<?php
/**
 * @access public
 * @package Controller
 */
class CCommento {



 public function inserisciCommento() {
        $session=USingleton::getInstance('USession');
        $username=$session->leggi_valore('username');
        if ($username!=false) {
            $view = USingleton::getInstance('VCommento');
            $ECommento = new ECommento();
            $ECommento->vinoISBN=$view->getIdVino();
            $ECommento->voto=$view->getVoto();
            $ECommento->testo=$view->getCommento();
		    $ECommento->salva();
            $view->setLayout('conferma_inserimento');
		    return $view->processaTemplate();
        }
     }

	public function eliminaCommento(){

		$view=USingleton::getInstance('VCommento');
		$id=$view->getCommento();
      $ECommento=new ECommento();
      $ECommento->carica($id);
		$ECommento->cancella();
		
		$view->setLayout('conferma_eliminazione');
		return $view->processaTemplate();
	}
	
	 public function smista() {
        $view=USingleton::getInstance('VRegistrazione');
		switch ($view->getTask()) {
			case 'Inserisci':
                return $this->inserisciCommento();
			case 'eliminaCommento':
				return $this->eliminaCommento();
		}
}
}
?>
	