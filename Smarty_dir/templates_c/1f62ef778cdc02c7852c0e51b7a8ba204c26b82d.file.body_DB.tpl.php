<?php /* Smarty version Smarty-3.1.18, created on 2014-12-21 16:41:38
         compiled from "Smarty_dir\templates\body_DB.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3030754804680db1215-23766542%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1f62ef778cdc02c7852c0e51b7a8ba204c26b82d' => 
    array (
      0 => 'Smarty_dir\\templates\\body_DB.tpl',
      1 => 1419176333,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3030754804680db1215-23766542',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54804680e0e883_78575193',
  'variables' => 
  array (
    'people' => 0,
    'patient' => 0,
    'part1' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54804680e0e883_78575193')) {function content_54804680e0e883_78575193($_smarty_tpl) {?>PAGINA DI GESTIONE DEL DATABASE PAZIENTI

		<form method="POST" action="index.php?control=manageDB&action=insert">
			<div>
				<input type="submit" value="inserisci">
			</div>
		</form>

		<form method="POST" action="index.php?control=manageDB&action=search">
			<div>
				<input type="submit" value="cerca">
			</div>
		</form>



		<!-- show all patients in DB -->

		<br>
		<br>
		<br>
		Tutti i pazienti nel DB (Nome, Cognome, CF)
		<br>
		<br>

		<ul>
		<?php  $_smarty_tpl->tpl_vars['patient'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['patient']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['people']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['patient']->key => $_smarty_tpl->tpl_vars['patient']->value) {
$_smarty_tpl->tpl_vars['patient']->_loop = true;
?>
	    <li> <?php echo $_smarty_tpl->tpl_vars['patient']->value['name'];?>
 <?php echo $_smarty_tpl->tpl_vars['patient']->value['surname'];?>
 <?php echo $_smarty_tpl->tpl_vars['patient']->value['cf'];?>

	    <a href="<?php echo $_smarty_tpl->tpl_vars['part1']->value;?>
<?php echo $_smarty_tpl->tpl_vars['patient']->value['link'];?>
">vai </a>
	    </li>
	    <br>
	    <?php } ?>
	    </ul>

<?php }} ?>