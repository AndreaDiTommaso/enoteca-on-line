<?php /* Smarty version 2.6.26, created on 2019-05-06 17:06:51
         compiled from ordine_email_conferma.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'string_format', 'ordine_email_conferma.tpl', 17, false),)), $this); ?>
        <div class="corner-content-1col-top"></div>
        <div class="content-1col-nobox">
          <h1>Riepilogo Ordine</h1>
          <h5><?php echo $this->_tpl_vars['dati']['proprietario']; ?>
</h5>
          <h3>Buongiorno, con la seguente email confermiamo l'ordine da lei effettuato.</h3>
		  <h2> I prodotti riportati verranno inviati a nome di <?php echo $this->_tpl_vars['dati_utente']['nome']; ?>
 <?php echo $this->_tpl_vars['dati_utente']['cognome']; ?>
 residente a <?php echo $this->_tpl_vars['dati_utente']['citta']; ?>
 in via <?php echo $this->_tpl_vars['dati_utente']['via']; ?>
, <?php echo $this->_tpl_vars['dati_utente']['CAP']; ?>
.</h2>
          <table id="carrello">
            <tr><th class="top" scope="col">Titolo</th>
                <th class="top" scope="col">Autore</th>
                <th class="top" scope="col">Quantit&agrave;</th>
                <th class="top" scope="col">Prezzo</th>
                <th class="top" scope="col">Subtotale</th></tr>
            <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['ordine']['vini']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
            <tr><th scope="row" align="left"><?php echo $this->_tpl_vars['ordine']['vini'][$this->_sections['i']['index']]['nome']; ?>
</th>
                <td align="left"><?php echo $this->_tpl_vars['ordine']['vini'][$this->_sections['i']['index']]['autore']; ?>
</td>
                <td align="right"><?php echo $this->_tpl_vars['ordine']['vini'][$this->_sections['i']['index']]['quantita']; ?>
</td>
                <td align="right"><?php echo ((is_array($_tmp=$this->_tpl_vars['ordine']['vini'][$this->_sections['i']['index']]['prezzo'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
</td>
                <td align="right"><?php echo ((is_array($_tmp=$this->_tpl_vars['ordine']['vini'][$this->_sections['i']['index']]['quantita']*$this->_tpl_vars['ordine']['vini'][$this->_sections['i']['index']]['prezzo'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
</td></tr>
                <?php $this->assign('sub', ($this->_tpl_vars['ordine']['vini'][$this->_sections['i']['index']]['quantita']*$this->_tpl_vars['ordine']['vini'][$this->_sections['i']['index']]['prezzo'])); ?>
                <?php $this->assign('totale', ($this->_tpl_vars['totale']+$this->_tpl_vars['sub'])); ?>
            <?php endfor; endif; ?>
            <tr><th scope="row" id="numero" colspan="3"></th><th scope="col">Totale:</th><td align="right"><?php echo ((is_array($_tmp=$this->_tpl_vars['totale'])) ? $this->_run_mod_handler('string_format', true, $_tmp, "%.2f") : smarty_modifier_string_format($_tmp, "%.2f")); ?>
</td></tr>
          </table>
        </div>
        <div class="corner-content-1col-bottom"></div>