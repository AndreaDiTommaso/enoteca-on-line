        <a id="anchor-contact-1"></a>
        <div class="corner-content-1col-top"></div>        
        <div class="content-1col-nobox">
          <h1 class="contact">Modulo di registrazione</h1>
          <div class="contactform">
            <form method="post" action="index.php" name="reg" value="lista" enctype="multipart/form-data" onsubmit="return control_reg()">
              <fieldset><legend>&nbsp;CREDENZIALI DI ACCESSO&nbsp;</legend>
                <p><label for="username" class="left">Username:</label>
                   <input type="text" name="username" id="username" class="field" value="" tabindex="5" /></p>
                <p><label for="password" class="left">Password:</label>
                   <input type="password" name="password" id="password" class="field" value="" tabindex="6" /></p>
                <p><label for="password_1" class="left">Ripeti password:</label>
                   <input type="password" name="password_1" id="password_1" class="field" value="" tabindex="7" /></p>
				<p><label for="nome" class="left">Nome:</label>
                   <input type="text" name="nome" id="nome" class="field" value="" tabindex="8" /></p>
                <p><label for="cognome" class="left">Cognome:</label>
                   <input type="text" name="cognome" id="cognome" class="field" value="" tabindex="9" /></p>
                <p><label for="indirizzo" class="left">Via:</label>
                   <input type="text" name="indirizzo" id="indirizzo" class="field" value="" tabindex="10" /></p>
                <p><label for="cap" class="left">CAP:</label>
                   <input type="text" name="cap" id="cap" class="field" value="" tabindex="11" /></p>
                <p><label for="citta" class="left">Citt&agrave;:</label>
                   <input type="text" name="citta" id="citta" class="field" value="" tabindex="12" /></p>
                <p><label for="email" class="left">Email:</label>
                   <input type="text" name="email" id="email" class="field" value="" tabindex="14" /></p>
				<p><label for="immagine" class="left">Immagine:</label>
                   <input type="file" name="immagine" id="immagine" class="field" tabindex="11" /></p>
				<legend> Che tipo di utente vuoi essere?</legend>
				<p><label for="tipo" class="left">Imprenditore:</label>
                   <input type="radio" name="tipo" id="tipo" class="field" value="I" tabindex="11" /></p>
				<p><label for="tipo" class="left">Utente semplice:</label>
                   <input type="radio" name="tipo" id="tipo" class="field" value="G" tabindex="11" /></p>
                <input type="hidden" name="controller" value="registrazione" />
                <input type="hidden" name="task" value="salva" />
                <p><input type="submit" name="submit" id="submit_1" class="button" value="Registrati" tabindex="15" /></p>
               </fieldset>
            </form>
          </div>
        </div>
        <div class="corner-content-1col-bottom"></div>