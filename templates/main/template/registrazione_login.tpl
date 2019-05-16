        <a id="anchor-contact-1"></a>
        <div class="corner-content-1col-top"></div>
        <div class="content-1col-nobox">
          <h1 class="contact">Modulo di login</h1>
          <div class="contactform">
            <form method="post" action="index.php">
              <p><input type="hidden" name="rememberme" value="0" /></p>
              <p><input type="hidden" name="controller" value="registrazione" /></p>
              <p><input type="hidden" name="task" value="autentica" /></p>
              <fieldset>
                <p><label for="username" class="top">Nome utente:</label><br />
                  <input type="text" name="username" id="username" tabindex="1" class="field" value="" /></p>
              <p><label for="password" class="top">Password:</label><br />
                  <input type="password" name="password" id="password" tabindex="2" class="field" value="" /></p>
              <p><input type="checkbox" name="checkbox" id="checkbox" class="checkbox" tabindex="3" size="1" value="" /><label for="checkbox" class="right">Ricordati?</label></p>
              <p><input type="submit" name="cmdweblogin" class="button" value="Login"  /></p>
              <p><a href="?controller=autenticazione&task=password_dimenticata" id="forgotpsswd">Password dimenticata?</a></p>
            </fieldset>
            </form>
          </div>
        </div>
        <div class="corner-content-1col-bottom"></div>