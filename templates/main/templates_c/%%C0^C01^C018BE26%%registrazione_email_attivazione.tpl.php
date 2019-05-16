<?php /* Smarty version 2.6.26, created on 2019-04-29 10:27:25
         compiled from registrazione_email_attivazione.tpl */ ?>
Salve <?php echo $this->_tpl_vars['nome_cognome']; ?>
,

Grazie per esserti registrato. Prima di attivare il tuo account e' necessario compiere un ultimo passaggio per completare la registrazione.

 Clicca sul collegamento qui sotto:
<?php echo $this->_tpl_vars['url']; ?>
index.php?controller=registrazione&task=attivazione&codice_attivazione=<?php echo $this->_tpl_vars['codice_attivazione']; ?>
&username=<?php echo $this->_tpl_vars['username']; ?>


**** Il collegamento non funziona? ****
Se il collegamento non dovesse funzionare, visita questo link:
<?php echo $this->_tpl_vars['url']; ?>
index.php?controller=registrazione&task=attivazione

Inserire i seguenti campi per l'attivazione dell'account:

username e: <?php echo $this->_tpl_vars['username']; ?>

codice di attivazione : <?php echo $this->_tpl_vars['codice_attivazione']; ?>



In caso di problemi con la registrazione contatta un membro del nostro staff all'indirizzo: <?php echo $this->_tpl_vars['email_webmaster']; ?>


Saluti, lo staff 
