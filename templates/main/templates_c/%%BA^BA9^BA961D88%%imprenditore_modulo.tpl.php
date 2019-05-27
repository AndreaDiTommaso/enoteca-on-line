<?php /* Smarty version 2.6.26, created on 2019-05-23 13:47:23
         compiled from imprenditore_modulo.tpl */ ?>
		<a id="anchor-contact-1"></a>
        <div class="corner-content-1col-top"></div>        
        <div class="content-1col-nobox">
          <h1 class="contact">Modulo aggiornamento catalogo</h1>
          <div class="contactform">
            <form method="post" action="index.php" name="task" value="imprenditore" enctype="multipart/form-data">
              <fieldset><legend>&nbsp;AGGIUNGI PRODOTTO&nbsp;</legend>
                <p><label for="ISBN" class="left">Isbn:</label>
                   <input type="text" name="ISBN" id="ISBN" class="field" tabindex="5" /></p>
                <p><label for="nome" class="left">Nome:</label>
                   <input type="text" name="nome" id="nome" class="field" tabindex="6" /></p>
                <p><label for="proprietario" class="left">Proprietario:</label>
                   <input type="text" name="proprietario" id="proprietario" class="field" tabindex="7" /></p>
				<p><label for="prezzo" class="left">Prezzo:</label>
                   <input type="text" name="prezzo" id="prezzo" class="field" tabindex="8" /></p>
                <p><label for="descrizione" class="left">Descrizione:</label>
                   <input type="text" name="descrizione" id="descrizione" class="field" tabindex="20" /></p>
                <p><label for="categoria" class="left">Categoria:</label>
                   <input type="text" name="categoria" id="categoria" class="field" tabindex="10" /></p>
                <p><label for="immagine" class="left">Immagine:</label>
                   <input type="file" name="immagine" id="immagine" class="field" tabindex="11" /></p>
                <p><label for="gradazione" class="left">Gradazione:</label>
                   <input type="text" name="gradazione" id="gradazione" class="field" tabindex="12" /></p>
                <input type="hidden" name="controller" value="imprenditore" />
                <input type="hidden" name="task" value="salva" />
                <p><input type="submit" name="submit" id="submit_1" class="button" value="Aggiungi" tabindex="15" /></p>
               </fieldset>
            </form>
          </div>
        </div>
        <div class="corner-content-1col-bottom"></div> 