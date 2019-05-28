<?php
/**
 * @access public
 * @package Controller
 */
class CRegistrazione {
    
    private $_username=null;
    private $_password=null;
    private $_errore='';
	
	
    public function getUtenteRegistrato() {
        $autenticato=false;
        $session=USingleton::getInstance('USession');
        $VRegistrazione= USingleton::getInstance('VRegistrazione');
        $task=$VRegistrazione->getTask();
        $controller=$VRegistrazione->getController();
        $this->_username=$VRegistrazione->getUsername();
        $this->_password=$VRegistrazione->getPassword();
        if ($session->leggi_valore('username')!=false) {
            $autenticato=true;
            //autenticato
        } elseif ($task=='autentica' && $controller='registrazione') {
            //controlla autenticazione
            $autenticato=$this->autentica($this->_username, $this->_password);
        }
        if ($task=='esci' && $controller='registrazione') {
            //logout
            $this->logout();
            $autenticato=false;
        }
        $VRegistrazione->impostaErrore($this->_errore);
        $this->_errore='';
        return $autenticato;
    }
	
	
	public function getUtenteImprenditore() {
        $imp=false;
        $session=USingleton::getInstance('USession');
        $username=$session->leggi_valore('username');
		$user=new EUtente();
		$user->carica($username);
		if($user->get_tipo() == 'I')
		{
	   
            $imp=true;
        }
       
        return $imp;
    }
	
	
    public function autentica($username, $password) {
		
        $utente=new EUtente();
		$utente->carica($username);
        if ($utente!=false) {
            if ($utente->getAccountAttivo()) {
                //account attivo
                if ($username==$utente->username && $password==$utente->password) {
                    $session=USingleton::getInstance('USession');
                    $session->imposta_valore('username',$username);
                    $session->imposta_valore('nome_cognome',$utente->nome.' '.$utente->cognome);
                    return true;
                } else{
                    $this->_errore='Username o password errati';
                    //username password errati
                }
            } else {
                $this->_errore='L\'account non &egrave; attivo';
                //account non attivo
            }
        } else {
            $this->_errore='L\'account non esiste';
            //account non esiste
        }
        return false;
    }
	
	
    public function creaUtente() {
        $view=USingleton::getInstance('VRegistrazione');
        $dati_registrazione=$view->getDatiRegistrazione();
		  $utente=new EUtente();
		  $dati=$dati_registrazione['username'];
		  $result=$utente->carica($dati);
        $registrato=false;
        if ($result==false) {
            //utente non esiste
            if($dati_registrazione['password_1']==$dati_registrazione['password']) 
            {
                unset($dati_registrazione['password_1']);
                $keys=array_keys($dati_registrazione);
                $i=0;
                foreach ($dati_registrazione as $dato) {
                	
                    $k=$keys[$i];
                    $utente->$k=$dato;
                    $i++;
                }
                $utente->generaCodiceAttivazione();
				if ($dati_registrazione['tipo'] == 'o')
					$utente->set_tipo('I');
                    $utente->salva();
				    $target_file = "copertine/";
				    $uploadOk = 1;
				    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		
				// Check if $uploadOk is set to 0 by an error
				if ($uploadOk == 0) {
				echo "Sorry, your file was not uploaded.";
				// if everything is ok, try to upload file
				} else {
				if (move_uploaded_file($_FILES['immagine']['tmp_name'], $target_file . $_FILES['immagine']['name'])) {
					echo "The file ". $_FILES['immagine']['name']. " has been uploaded.";
				} else {
				echo "Sorry, there was an error uploading your file.";echo "</p>";
				}
				}
                
			    $this->emailAttivazione($utente);
                $registrato=true;
            } else 
            {
                $this->_errore='Le password immesse non coincidono';
            }
        } else {
            //utente esistente
            $this->_errore='Username gi&agrave; utilizzato';
        }
        if (!$registrato) {
            $view->impostaErrore($this->_errore);
            $this->_errore='';
            $view->setLayout('problemi');
            $result=$view->processaTemplate();
            $view->setLayout('modulo');
            $result.=$view->processaTemplate();
            $view->impostaErrore('');
            return $result;
        } else {
            $view->setLayout('conferma_registrazione');
            return $view->processaTemplate();
        }
    }
    public function emailAttivazione(EUtente $utente) {
        global $config;
        $view=USingleton::getInstance('VRegistrazione');
        $view->setLayout('email_attivazione');
        $view->impostaDati('username',$utente->username);
        $view->impostaDati('nome_cognome',$utente->nome.' '.$utente->cognome);
        $view->impostaDati('codice_attivazione',$utente->getCodiceAttivazione());
        $view->impostaDati('email_webmaster',$config['email_webmaster']);
        $view->impostaDati('url',$config['url_enoteca']);
        $corpo_email=$view->processaTemplate();
        $email=USingleton::getInstance('UEmail');
        return $email->invia_email($utente->email,$utente->nome.' '.$utente->cognome,'Attivazione account',$corpo_email);
    }
    public function attivazione() {
        $view = USingleton::getInstance('VRegistrazione');
        $dati_attivazione=$view->getDatiAttivazione();
		  $utente=new EUtente();
		  $utente->carica($dati_attivazione['username']);
		  if ($dati_attivazione!=false) {
			
            if ($utente->getCodiceAttivazione()==$dati_attivazione['codice']) {
                $utente->stato='attivo';
				    $utente->aggiorna();
                $view->setLayout('conferma_attivazione');
            } else {
                $view->impostaErrore('Il codice di attivazione &egrave; errato');
                $view->setLayout('problemi');
            }
        } else {
            $view->setLayout('attivazione');
        }
        return $view->processaTemplate();
    }
    public function moduloRegistrazione() {
        $VRegistrazione=USingleton::getInstance('VRegistrazione');
	
        $VRegistrazione->setLayout('modulo');
        return $VRegistrazione->processaTemplate();
    }
	 public function moduloLogin() {
		 $VRegistrazione=USingleton::getInstance('VRegistrazione');
        $VRegistrazione->setLayout('login');
        return $VRegistrazione->processaTemplate();
   
    }
	 public function profilo() {
		$view=USingleton::getInstance('VRegistrazione');
		$utente=new EUtente();
		$session = USingleton::getInstance('USession');
		$username=$session->leggi_valore('username');
		$result=$utente->carica($username);
		$dati_utente=get_object_vars($utente);
        $view->impostaDati('dati_utente', $dati_utente);
		$view->setLayout('profilo');
        return $view->processaTemplate();
   
    }
    public function logout() {
        $session=USingleton::getInstance('USession');
        $session->cancella_valore('username');
        $session->cancella_valore('nome_cognome');
    }
    public function smista() {
        $view=USingleton::getInstance('VRegistrazione');
        switch ($view->getTask()) {
            case 'recupera_password':
                return $this->recuperaPassword();
            case 'registra':
                return $this->moduloRegistrazione();
			case 'login':
				return $this->moduloLogin();
            case 'salva':
                return $this->creaUtente();
            case 'attivazione':
                return $this->attivazione();
			case 'profilo':
				return $this->profilo();
            default:
                $CRicerca=USingleton::getInstance('CRicerca');
                return $CRicerca->ultimiArrivi();
        }
    }
}

?>
