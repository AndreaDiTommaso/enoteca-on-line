<?php
require("lib/phpmailer/class.phpmailer.php");

class UEmail {
    private $_mail;
    public function __construct() {
        global $config;
        $this->_mail = new PHPMailer();
        $this->_mail->IsSMTP();              // set mailer to use SMTP
        $this->_mail->Host = $config['smtp']['host'];  // specify main and backup server
        $this->_mail->Port = $config['smtp']['port'];  // specify main and backup server
        $this->_mail->SMTPAuth = $config['smtp']['smtpauth']; // turn on SMTP authentication
        $this->_mail->Username = $config['smtp']['username']; // SMTP username
        $this->_mail->Password = $config['smtp']['password']; // SMTP password
        $this->_mail->Charset = 'utf-8';
    }
    public function invia_email($email, $nome, $oggetto, $corpo_email, $corpo_email_testo_semplice = '', $html=false) {
        $this->_mail->From = 'greta.dipaolantonio@virgilio.it';

        //$this->_mail->Sender = $email;
        $this->_mail->FromName = 'EnotecaOnline';
        $this->_mail->AddAddress($email, $nome);
        $this->_mail->SetFrom('greta.dipaolantonio@virgilio.it','EnotecaOnline');
        $this->_mail->WordWrap = 50;                                 // set word wrap to 50 characters
        //$this->_mail->AddAttachment("/var/tmp/file.tar.gz");         // add attachments
        //$this->_mail->AddAttachment("/tmp/image.jpg", "new.jpg");    // optional name
        $this->_mail->IsHTML($html); // set email format to HTML
        $this->_mail->Subject = $oggetto;
        $this->_mail->Body    = $corpo_email;
        $this->_mail->AltBody = $corpo_email_testo_semplice;
        if(!$this->_mail->Send()) {
            debug("L'email non pu&ograve; essere inviata <p>");
            debug("Errore: " . $this->_mail->ErrorInfo);
            return false;
        }
		
        debug("L'email &egrave; stata inviata");
		
        return true;
    }
}


       


?>