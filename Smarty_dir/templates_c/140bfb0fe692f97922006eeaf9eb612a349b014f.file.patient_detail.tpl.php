<?php /* Smarty version Smarty-3.1.18, created on 2014-12-05 18:37:33
         compiled from "Smarty_dir\templates\patient_detail.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1308154804682215db1-70354937%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '140bfb0fe692f97922006eeaf9eb612a349b014f' => 
    array (
      0 => 'Smarty_dir\\templates\\patient_detail.tpl',
      1 => 1417801046,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1308154804682215db1-70354937',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5480468226a4d5_43068823',
  'variables' => 
  array (
    'name' => 0,
    'surname' => 0,
    'gender' => 0,
    'dateBirth' => 0,
    'CF' => 0,
    'dateCheck' => 0,
    'medHistory' => 0,
    'medExam' => 0,
    'conclusions' => 0,
    'toDoExams' => 0,
    'terapy' => 0,
    'checkup' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5480468226a4d5_43068823')) {function content_5480468226a4d5_43068823($_smarty_tpl) {?><br>
		Scheda del paziente <?php echo $_smarty_tpl->tpl_vars['name']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['surname']->value;?>

		<br>
		<br>

		<form method="POST">

			<div>

		Nome: <?php echo $_smarty_tpl->tpl_vars['name']->value;?>

		<br>
		Cognome: <?php echo $_smarty_tpl->tpl_vars['surname']->value;?>

		<br>
		Sesso: <?php echo $_smarty_tpl->tpl_vars['gender']->value;?>

		<br>
		DataNascita: <?php echo $_smarty_tpl->tpl_vars['dateBirth']->value;?>

		<br>
		Codice Fiscale: <?php echo $_smarty_tpl->tpl_vars['CF']->value;?>

		<br>
		Data Visita: <?php echo $_smarty_tpl->tpl_vars['dateCheck']->value;?>

		<br>
		Anamnesi: <?php echo $_smarty_tpl->tpl_vars['medHistory']->value;?>

		<br>
		Esame Obiettivo: <?php echo $_smarty_tpl->tpl_vars['medExam']->value;?>

		<br>
		Conclusione: <?php echo $_smarty_tpl->tpl_vars['conclusions']->value;?>

		<br>
		Prescrizione Esami: <?php echo $_smarty_tpl->tpl_vars['toDoExams']->value;?>

		<br>
		Terapia: <?php echo $_smarty_tpl->tpl_vars['terapy']->value;?>

		<br>
		Controllo: <?php echo $_smarty_tpl->tpl_vars['checkup']->value;?>


	</div>

	<br>
	<br>


		<button type="submit" formaction="index.php?control=manageDB&action=modify&mod=<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
">modifica</button>
		<button type="submit" formaction="index.php?control=manageDB&action=printReport&pat=<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
">stampa report</button>
		<button type="submit" formaction="index.php?control=manageDB&action=delete&pat=<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
">cancella</button>
	</form><?php }} ?>
