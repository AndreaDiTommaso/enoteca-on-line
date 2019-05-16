        <div class="corner-content-1col-top"></div>
        <div class="content-1col-nobox">
          <h1>{$dati.nome}</h1>
          <h5>{$dati.autore}</h5>
          <p><img height="350" src="copertine/{$dati.immagine}" alt="{$dati.nome}" title="{$dati.nome}">{$dati.descrizione}</p>
          {if $dati.commento!=false}
          {section name=i loop=$dati.commento}
              {assign var="somma" value="`$dati.commento[i].votazione+$somma`"}
              {assign var="max" value="`$smarty.section.i.max`"}
          {/section}
          {/if}
          <p class="details">
			<ul>
				<li>Categoria: <a href="#">{$dati.categoria}</a> </li>
				<li>Prezzo: <a href="#">{$dati.prezzo}</a> </li>
			</ul>
		</p>
         
        </div>
        <div class="corner-content-1col-bottom"></div>
