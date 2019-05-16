 <div class="corner-content-1col-top"></div>
        <div class="content-1col-nobox">
          <h1>{$dati.nome}</h1>
          <h5>{$dati.autore}</h5>
          <p><img height="350" src="copertine/{$dati.immagine}" alt="{$dati.nome}" title="{$dati.nome}">{$dati.descrizione}</p>
          {section name=i loop=$dati.commento}
              {assign var="somma" value="`$dati.commento[i].voto+$somma`"}
              {assign var="max" value="`$smarty.section.i.max`"}
          {/section}
			<p class="details">
				<ul>
				<li><b>Media Voti:</b> <a href="#">{if $max>0}{$somma/$max|string_format:"%.2f"}{else}-{/if}</a> </li>
				<li>Categoria: <a href="#">{$dati.categoria}</a> </li>
				<li>Prezzo: <a href="#">{$dati.prezzo}</a> </li>
				</ul>
			</p>
          <div class="contactform">
             <form action="index.php" method="post">
              <fieldset><legend>&nbsp;VOTA VINO&nbsp;</legend>
                <p><label for="voto" class="left">Vota:</label>
                   <!-- <input type="text" name="voto" id="voto" class="field" value="" tabindex="4" /></p> -->
                   <select name="voto" tabindex="4">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                   </select>
                <p><label for="commento" class="left">Commento:</label>
                   <textarea name="commento" id="commento" cols="45" rows="10" tabindex="5"></textarea></p>
                   <input type="hidden" name="controller" value="ricerca" />
                   <input type="hidden" name="id_vino" value="{$dati.ISBN}" />
                <p><input type="submit" name="task" class="button" value="Inserisci" tabindex="6" /></p>
              </fieldset>
            </form>
          </div>
          {section name=j loop=$dati.commento}
		
          <blockquote>
            <p>{$dati.commento[j].testo}</p>
            <p>voto: {$dati.commento[j].voto}</p>
			<form action="index.php" method="post">
			  <input id="button" type="submit" name="task" value="Elimina" /> 
			  <input type="hidden" name="controller" value="ricerca"  />
			   <input type="hidden" name="commento" value="{$dati.commento[j].id}" />
			  <input type="hidden" name="task" value="eliminaCommento"  />
             </form>
          </blockquote>
          {/section}
        </div>
        <div class="corner-content-1col-bottom"></div>
