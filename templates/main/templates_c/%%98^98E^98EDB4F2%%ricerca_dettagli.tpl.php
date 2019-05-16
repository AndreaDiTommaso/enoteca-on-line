<?php /* Smarty version 2.6.26, created on 2019-05-15 16:04:07
         compiled from ricerca_dettagli.tpl */ ?>
        <div class="corner-content-1col-top"></div>
        <div class="content-1col-nobox">
          <h1><?php echo $this->_tpl_vars['dati']['nome']; ?>
</h1>
          <h5><?php echo $this->_tpl_vars['dati']['autore']; ?>
</h5>
          <p><img height="350" src="copertine/<?php echo $this->_tpl_vars['dati']['immagine']; ?>
" alt="<?php echo $this->_tpl_vars['dati']['nome']; ?>
" title="<?php echo $this->_tpl_vars['dati']['nome']; ?>
"><?php echo $this->_tpl_vars['dati']['descrizione']; ?>
</p>
          <?php if ($this->_tpl_vars['dati']['commento'] != false): ?>
          <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['dati']['commento']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
              <?php $this->assign('somma', ($this->_tpl_vars['dati']['commento'][$this->_sections['i']['index']]['votazione']+$this->_tpl_vars['somma'])); ?>
              <?php $this->assign('max', ($this->_sections['i']['max'])); ?>
          <?php endfor; endif; ?>
          <?php endif; ?>
          <p class="details">
			<ul>
				<li>Categoria: <a href="#"><?php echo $this->_tpl_vars['dati']['categoria']; ?>
</a> </li>
				<li>Prezzo: <a href="#"><?php echo $this->_tpl_vars['dati']['prezzo']; ?>
</a> </li>
			</ul>
		</p>
         
        </div>
        <div class="corner-content-1col-bottom"></div>