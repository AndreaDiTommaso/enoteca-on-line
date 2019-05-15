<?php

class USession {
    public function __construct() {
        session_start(['cookie_lifetime' => 86400]); //1 day;
        debug($_SESSION);
    }
    function imposta_valore($chiave,$valore) {
        $_SESSION[$chiave]=$valore;
    }
    function cancella_valore($chiave) {
        unset($_SESSION[$chiave]);
    }
    function leggi_valore($chiave) {
        if (isset($_SESSION[$chiave]))
            return $_SESSION[$chiave];
        else
            return false;
    }
	
}
?>