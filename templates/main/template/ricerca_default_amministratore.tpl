		  <div class="content-1col-box">
            <form method="post" action="index.php">
				<input id="button" type="submit" name="task" value="+ Aggiungi prodotto al catalogo" />
				<input type="hidden" name="controller" value="ricerca"  />
				<input type="hidden" name="task" value="modulo"  />
		  </form>
		  </div>
		  <div class="content-1col-box">
          <!-- Subcell LEFT -->
          <div class="content-2col-box-leftcolumn">
            {if $dati != false}
            <!-- Subcell content -->
            {section name=i loop=$dati}
            {if $smarty.section.i.iteration % 2 == 1}
            <div class="corner-content-2col-top"></div>
            <div class="content-2col-box">
              <h1><a href="?controller=ricerca&task=dettagli&id_vino={$dati[i].ISBN}">{$dati[i].nome}</a></h1>
              <p><img height="200" src="copertine/{$dati[i].immagine}" alt="{$dati[i].nome}" title="{$dati[i].nome}"}</p>
                  {assign var="somma" value="`0`"}
                  {assign var="max" value="`0`"}
              {section name=j loop=$dati[i].commento}
                  {assign var="somma" value="`$dati[i].commento[j].votazione+$somma`"}
                  {assign var="max" value="`$smarty.section.j.max`"}
              {/section}
              <p class="details">
				<ul>
					<li><b>Media Voti:</b> <a href="#">{if $dati[i].media_voti>0}{$dati[i].media_voti}{else}-{/if}</a> </li>
					<li>	Categoria: <a href="#">{$dati[i].categoria}</a> </li>
					<li> Prezzo: <a href="#">{$dati[i].prezzo|string_format:"%.2f"}</a> </li>
				</ul>
			</p>
              <form action="index.php" method="post">
              <input type="hidden" name="id_vino" value="{$dati[i].ISBN}" />
              <input id="button" type="submit" name="task" value="Aggiungi al Carrello" />
              <input type="hidden" name="controller" value="ordine" />
			  </form>
			  <form action="index.php" method="post">
			  <input id="button" type="submit" name="task" value="Elimina" /> 
			  <input type="hidden" name="controller" value="ricerca"  />
              <input type="hidden" name="id_vino" value="{$dati[i].ISBN}" />
			  <input type="hidden" name="task" value="eliminaProdotto"  />
              </form>
            </div>
            <div class="corner-content-2col-bottom">
			
			
		  
		    </div>
            {/if}
            {/section}
            {/if}
          </div>
          <div class="content-2col-box-rightcolumn">
            {if $dati != false}
            <!-- Subcell content -->
            {section name=i loop=$dati}
            {if $smarty.section.i.iteration % 2 == 0}
            <div class="corner-content-2col-top"></div>
            <div class="content-2col-box">
              <h1><a href="?controller=ricerca&task=dettagli&id_vino={$dati[i].ISBN}">{$dati[i].nome}</a></h1>
              <p><img height="200" src="copertine/{$dati[i].immagine}" alt="{$dati[i].nome}" title="{$dati[i].nome}"</p>
                  {assign var="somma" value="`0`"}
                  {assign var="max" value="`0`"}
          {section name=k loop=$dati[i].commento}
              {assign var="somma" value="`$dati[i].commento[k].votazione+$somma`"}
              {assign var="max" value="`$smarty.section.k.max`"}
          {/section}
            <p class="details">
				<ul>
					<li><b>Media Voti:</b> <a href="#">{if $dati[i].media_voti>0}{$dati[i].media_voti}{else}-{/if}</a> </li>
					<li>	Categoria: <a href="#">{$dati[i].categoria}</a> </li>
					<li> Prezzo: <a href="#">{$dati[i].prezzo|string_format:"%.2f"}</a> </li>
				</ul>
			</p>
              <form action="index.php" method="post">
              <input type="hidden" name="id_vino" value="{$dati[i].ISBN}" />
              <input id="button" type="submit" name="task" value="Aggiungi al Carrello" />
              <input type="hidden" name="controller" value="ordine" />
			  </form>
			  <form action="index.php" method="post">
			  <input id="button" type="submit" name="task" value="Elimina" /> 
			  <input type="hidden" name="controller" value="ricerca"  />
              <input type="hidden" name="id_vino" value="{$dati[i].ISBN}" />
			  <input type="hidden" name="task" value="eliminaProdotto"  />
              </form>
            </div>
            <div class="corner-content-2col-bottom"></div>
            {/if}
            {/section}
            {/if}
          </div>
       </div>
		
		{if $task=='lista'}
			{if $pagine!=''}
			<div class="content-1col-nobox">
				<h2 class="pages">
			   {section name=pages loop=$pagine}
				   <a href="index.php?controller=ricerca&task={$task}{if $parametri!=''}&{$parametri}{/if}&page={$smarty.section.pages.iteration-1}">{$smarty.section.pages.iteration}</a>
			   {/section}
			   </h2>
			</div>
			<div class="corner-content-1col-bottom"></div>
			{/if}
		{else}
		<div class="corner-content-1col-top"></div>
        <div class="content-1col-nobox">
            <h2 class="pages">
				<a href="index.php?controller=ricerca&task=lista">Vai al catalogo</a>
           </h2>
        </div>
        <div class="corner-content-1col-bottom"></div>
        {/if}
