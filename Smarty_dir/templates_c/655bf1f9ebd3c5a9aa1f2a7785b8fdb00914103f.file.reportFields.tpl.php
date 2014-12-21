<?php /* Smarty version Smarty-3.1.18, created on 2014-12-05 19:04:25
         compiled from "Smarty_dir\templates\reportFields.tpl" */ ?>
<?php /*%%SmartyHeaderCode:137485481ed5e5cfb31-18642264%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '655bf1f9ebd3c5a9aa1f2a7785b8fdb00914103f' => 
    array (
      0 => 'Smarty_dir\\templates\\reportFields.tpl',
      1 => 1417802660,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '137485481ed5e5cfb31-18642264',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5481ed5e605700_80799374',
  'variables' => 
  array (
    'link' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5481ed5e605700_80799374')) {function content_5481ed5e605700_80799374($_smarty_tpl) {?><!DOCTYPE HTML>
<html>
	<head>
		<title>Stampa report</title>
	</head>

	<body>
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
