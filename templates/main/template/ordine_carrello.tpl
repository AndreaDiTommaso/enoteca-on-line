        <div class="corner-content-1col-top"></div>
        <div class="content-1col-nobox">
          <h1>Carrello</h1>
          {if $dati!= false}
          <form action="index.php" method="post">
          <table id="carrello">
            <tr><th class="top" scope="col">Titolo</th>
                <th class="top" scope="col">Quantit&agrave;</th>
                <th class="top" scope="col">Prezzo</th>
            {section name=i loop=$dati.oggetti}
            <tr><th scope="row">{$dati.oggetti[i].nome}</th>
                <td id="numero"><input type="text" name="quantita[{$smarty.section.i.iteration}]" value="{$dati.oggetti[i].quantita}" size="1" /></td>
                <td id="numero">{$dati.oggetti[i].prezzo|string_format:"%.2f"}</td>
            {/section}
            <tr><th scope="row" id="numero" colspan="1"></th><th scope="col">Totale:{$dati.totale|string_format:"%.2f"}<th></th></tr>
            <tr><td colspan="1"></td><td colspan="2"><input id="button" type="submit" name="task" value="Svuota" /><input id="button" type="submit" name="task" value="Aggiorna Carrello" /></td></tr>
          </table>
          <input type="hidden" name="controller" value="ordine" />
          </form>
		  <div class="pages">
		  <a href="index.php?controller=ricerca&amp;task=lista"><h3>Continua spesa</h3></a>
		  </div>
          {else}
            <p>Il carrello &egrave; vuoto.</p>
          {/if}
        </div>
        <div class="corner-content-1col-bottom"></div>
