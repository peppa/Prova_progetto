<?php /* Smarty version Smarty-3.1.18, created on 2014-12-16 11:09:49
         compiled from "Smarty_dir\templates\body_confirmPage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:203905490015927ad47-53863308%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd5902bae3fa7997265b97d8a040ad1e7c22da6ae' => 
    array (
      0 => 'Smarty_dir\\templates\\body_confirmPage.tpl',
      1 => 1418724561,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '203905490015927ad47-53863308',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54900159334730_17627317',
  'variables' => 
  array (
    'link' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54900159334730_17627317')) {function content_54900159334730_17627317($_smarty_tpl) {?><br>
Confermi di voler cancellare il paziente selezionato ?
<br>
Non sar&aacute possibile recuperare i dati in futuro
<br>
<br>
<br>

<form method="POST">
    <button type="submit" formaction="index.php?control=manageDB&action=delete&conf=yes&pat=<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
">conferma</button>
    <button type="submit" formaction="index.php?control=manageDB&action=getFullData&show=<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
">annulla</button>
</form><?php }} ?>
