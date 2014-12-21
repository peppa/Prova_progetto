<?php /* Smarty version Smarty-3.1.18, created on 2014-12-16 09:53:14
         compiled from "Smarty_dir\templates\body_reportFields.tpl" */ ?>
<?php /*%%SmartyHeaderCode:29953548ff2faf22f84-44492145%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1c332c328b38af5fe1dece324baf9fc693f58cd1' => 
    array (
      0 => 'Smarty_dir\\templates\\body_reportFields.tpl',
      1 => 1418719723,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29953548ff2faf22f84-44492145',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_548ff2fb2e1872_35266080',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_548ff2fb2e1872_35266080')) {function content_548ff2fb2e1872_35266080($_smarty_tpl) {?>
		<br>
		Scegli i campi da stampare
		<br>
	    <br>

	    <form method="POST" action="index.php?control=manageDB&action=printReport&fields=sent&pat=<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
">
	    	<!-- Nome e Cognome, CF e Data di nascita vengono mostrati sempre -->

	    	<input type="checkbox" name="allFields"/>Tutti
	    	<br>
	    	<input type="checkbox" name="dateCheck"/> Data visita
	    	<br>
	    	<input type="checkbox" name="medHistory"/> Anamnesi
	    	<br>
	    	<input type="checkbox" name="medExam"/> Esame obiettivo
	    	<br>
	    	<input type="checkbox" name="conclusions"/> conclusioni
	    	<br>
	    	<input type="checkbox" name="toDoExams"/> prescrizione esami
	    	<br>
	    	<input type="checkbox" name="terapy"/> terapia
	    	<br>
	    	<input type="checkbox" name="checkup"/> controllo
	    	<br>

	    	<input type="submit" value="stampa">
	    </form><?php }} ?>
