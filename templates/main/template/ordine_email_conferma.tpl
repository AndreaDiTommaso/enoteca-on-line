        <div class="corner-content-1col-top"></div>
        <div class="content-1col-nobox">
          <h1>Riepilogo Ordine</h1>
          <h5>{$dati.proprietario}</h5>
          <h3>Buongiorno, con la seguente email confermiamo l'ordine da lei effettuato.</h3>
		  <h2> I prodotti riportati verranno inviati a nome di {$dati_utente.nome} {$dati_utente.cognome} residente a {$dati_utente.citta} in via {$dati_utente.via}, {$dati_utente.CAP}.</h2>
          <table id="carrello">
            <tr><th class="top" scope="col">Titolo</th>
                <th class="top" scope="col">Autore</th>
                <th class="top" scope="col">Quantit&agrave;</th>
                <th class="top" scope="col">Prezzo</th>
                <th class="top" scope="col">Subtotale</th></tr>
            {section name=i loop=$ordine.vini}
            <tr><th scope="row" align="left">{$ordine.vini[i].nome}</th>
                <td align="left">{$ordine.vini[i].autore}</td>
                <td align="right">{$ordine.vini[i].quantita}</td>
                <td align="right">{$ordine.vini[i].prezzo|string_format:"%.2f"}</td>
                <td align="right">{$ordine.vini[i].quantita*$ordine.vini[i].prezzo|string_format:"%.2f"}</td></tr>
                {assign var="sub" value="`$ordine.vini[i].quantita*$ordine.vini[i].prezzo`"}
                {assign var="totale" value="`$totale+$sub`"}
            {/section}
            <tr><th scope="row" id="numero" colspan="3"></th><th scope="col">Totale:</th><td align="right">{$totale|string_format:"%.2f"}</td></tr>
          </table>
        </div>
        <div class="corner-content-1col-bottom"></div>
