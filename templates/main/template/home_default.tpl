<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">


<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="cache-control" content="no-cache" />
  <meta http-equiv="expires" content="3600" />

  <link rel="stylesheet" type="text/css" media="screen,projection,print" href="templates/main/template/css/mf54_reset.css" />
  <link rel="stylesheet" type="text/css" media="screen,projection,print" href="templates/main/template/css/mf54_grid.css" />
  <link rel="stylesheet" type="text/css" media="screen,projection,print" href="templates/main/template/css/mf54_content.css" />
  <link rel="icon" type="image/x-icon" href="templates/main/template/img/prova3.png" />
  <title>{$title}</title>
</head>

{literal}{/literal}

<body>
  <!-- CONTAINER FOR ENTIRE PAGE -->
  <div class="container">

    <!-- A. HEADER -->         
    <div class="corner-page-top">
		
		<ul class="menuTop">
			<li class="pagetitle">{$content_title}</li>
			{section name=i loop=$tasti_laterali}
			<li>
			<a href="{$tasti_laterali[i].link}">{$tasti_laterali[i].testo}</a>
			{if $tasti_laterali[i].submenu !=false}
				
				{section name=j loop=$tasti_laterali[i].submenu}
					<li><a href="{$tasti_laterali[i].submenu[j].link}">{$tasti_laterali[i].submenu[j].testo}</a></li>
				{/section}
				
			{/if}
			</li>
			{/section}
		</ul>
	</div>  
    <div class="header">
      <div class="header-top">
        
        <!-- A.1 SITENAME -->      
        <a class="sitelogo" href="index.php" title="Enoteca Online"></a>
   
    
      <!-- A.4 BREADCRUMB and SEARCHFORM -->
      <div class="header-bottom">
        <!-- Search form -->                  
        <div class="searchform">
          <form action="index.php" method="get">
            <fieldset>
              <input name="stringa" class="field"  value="Inserisci una parola da cercare" />
              <input type="hidden" name="controller" value="ricerca" />
              <input type="submit" name="task" class="button" value="Cerca" />
            </fieldset>
          </form>
        </div>
      </div>
    </div>
    
    <!-- B. NAVIGATION BAR -->       
    <div class="navbar">
	
      <!-- Navigation item -->
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="index.php?controller=ricerca&task=lista">Prodotti</a></li>
        <li><a href="index.php?controller=ordine&task=contenuto">Carrello</a></li>
        {section name=i loop=$menu}
                <li><a href="{$menu[i].link}">{$menu[i].testo}</a>
                {if $menu[i].submenu !=false}
                    <ul>
                    {section name=j loop=$menu[i].submenu}
                        <li><a href="{$menu[i].submenu[j].link}">{$menu[i].submenu[j].testo}</a></li>
                    {/section}
                    </ul>
                {/if}
                </li>
        {/section}
      </ul>                       
    </div>    
  
    <!-- C. MAIN SECTION -->      
    <div class="main">
      

      <!-- C.1 CONTENT -->
      <div class="content">
        {$main_content}
      </div>
      
      

<!-- *******************************   END OF AVAILABLE CONTENT STYLES   ****************************** -->
          
    
    <!-- D. FOOTER -->      
    <div class="footer">
      <p>Copyright &copy; 2019 EnotecaOnline&nbsp;&nbsp;|&nbsp;&nbsp;All Rights Reserved</p>
      
    </div>
    <div class="corner-page-bottom"></div>        
  </div> 
  
</body>
</html>



