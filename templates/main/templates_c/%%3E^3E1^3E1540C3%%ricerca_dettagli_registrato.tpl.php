<?php /* Smarty version 2.6.26, created on 2019-05-27 10:44:45
         compiled from ricerca_dettagli_registrato.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'string_format', 'ricerca_dettagli_registrato.tpl', 12, false),)), $this); ?>
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
              <?php $this->assign('somma', ($this->_tpl_vars['dati']['commento'][$this->_sections['i']['index']]['voto']+$this->_tpl_vars['somma'])); ?>
              <?php $this->assign('max', ($this->_sections['i']['max'])); ?>
          <?php endfor; endif; ?>
			<p class="details">
				<ul>
				<li><b>Media Voti:</b> <a href="#"><?php if ($this->_tpl_vars['max'] > 0): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['somma']/$this->_tpl_vars['max'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
<?php else: ?>-<?php endif; ?></a> </li>
				<li>Categoria: <a href="#"><?php echo $this->_tpl_vars['dati']['categoria']; ?>
</a> </li>
				<li>Prezzo: <a href="#"><?php echo $this->_tpl_vars['dati']['prezzo']; ?>
</a> </li>
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
                   <input type="hidden" name="controller" value="commento" task="Inserisci"/>
                   <input type="hidden" name="id_vino" value="<?php echo $this->_tpl_vars['dati']['ISBN']; ?>
" />
                <p><input type="submit" name="task" class="button" value="Inserisci" tabindex="6" /></p>
              </fieldset>
            </form>
          </div>
          <?php unset($this->_sections['j']);
$this->_sections['j']['name'] = 'j';
$this->_sections['j']['loop'] = is_array($_loop=$this->_tpl_vars['dati']['commento']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['j']['show'] = true;
$this->_sections['j']['max'] = $this->_sections['j']['loop'];
$this->_sections['j']['step'] = 1;
$this->_sections['j']['start'] = $this->_sections['j']['step'] > 0 ? 0 : $this->_sections['j']['loop']-1;
if ($this->_sections['j']['show']) {
    $this->_sections['j']['total'] = $this->_sections['j']['loop'];
    if ($this->_sections['j']['total'] == 0)
        $this->_sections['j']['show'] = false;
} else
    $this->_sections['j']['total'] = 0;
if ($this->_sections['j']['show']):

            for ($this->_sections['j']['index'] = $this->_sections['j']['start'], $this->_sections['j']['iteration'] = 1;
                 $this->_sections['j']['iteration'] <= $this->_sections['j']['total'];
                 $this->_sections['j']['index'] += $this->_sections['j']['step'], $this->_sections['j']['iteration']++):
$this->_sections['j']['rownum'] = $this->_sections['j']['iteration'];
$this->_sections['j']['index_prev'] = $this->_sections['j']['index'] - $this->_sections['j']['step'];
$this->_sections['j']['index_next'] = $this->_sections['j']['index'] + $this->_sections['j']['step'];
$this->_sections['j']['first']      = ($this->_sections['j']['iteration'] == 1);
$this->_sections['j']['last']       = ($this->_sections['j']['iteration'] == $this->_sections['j']['total']);
?>
          <blockquote>
            <p><?php echo $this->_tpl_vars['dati']['commento'][$this->_sections['j']['index']]['testo']; ?>
</p>
            <p>voto: <?php echo $this->_tpl_vars['dati']['commento'][$this->_sections['j']['index']]['voto']; ?>
</p>
          </blockquote>
          <?php endfor; endif; ?>
        </div>
        <div class="corner-content-1col-bottom"></div>