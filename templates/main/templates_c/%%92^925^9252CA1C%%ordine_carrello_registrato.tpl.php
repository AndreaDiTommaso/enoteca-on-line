<?php /* Smarty version 2.6.26, created on 2019-04-26 17:18:15
         compiled from ordine_carrello_registrato.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'string_format', 'ordine_carrello_registrato.tpl', 13, false),)), $this); ?>
        <div class="corner-content-1col-top"></div>
        <div class="content-1col-nobox">
          <h1>Carrello</h1>
          <?php if ($this->_tpl_vars['dati'] != false): ?>
          <form action="index.php" method="post">
          <table id="carrello">
            <tr style="width:978px"><th class="top" scope="col">Nome</th>
                <th class="top" scope="col">Quantit&agrave;</th>
                <th class="top" scope="col">Prezzo</th>
            <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['dati']['oggetti']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
            <tr><th scope="row"><?php echo $this->_tpl_vars['dati']['oggetti'][$this->_sections['i']['index']]['nome']; ?>
</th>
                <td id="numero"><input type="text" name="quantita[<?php echo $this->_sections['i']['iteration']; ?>
]" value="<?php echo $this->_tpl_vars['dati']['oggetti'][$this->_sections['i']['index']]['quantita']; ?>
" size="1" /></td>
                <td id="numero"><?php echo ((is_array($_tmp=$this->_tpl_vars['dati']['oggetti'][$this->_sections['i']['index']]['prezzo'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
</td>
            <?php endfor; endif; ?>
            <tr><th scope="row" id="numero" colspan="1"></th><th scope="col">Totale:<?php echo ((is_array($_tmp=$this->_tpl_vars['dati']['totale'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
<th></th></tr>
            <tr><td></td><td colspan="5"><input id="button" type="submit" name="task" value="Svuota" /><input id="button" type="submit" name="task" value="Aggiorna Carrello" />
                      <input type="hidden" name="controller" value="ordine" />
          </form>
<form action="index.php" method="post"><input id="button" type="submit" name="task" value="Ordina" /><input type="hidden" name="controller" value="ordine" /></form>
</td></tr>
          </table>
          <?php else: ?>
            <p>Il carrello &egrave; vuoto.</p>
          <?php endif; ?>
        </div>
        <div class="corner-content-1col-bottom"></div>