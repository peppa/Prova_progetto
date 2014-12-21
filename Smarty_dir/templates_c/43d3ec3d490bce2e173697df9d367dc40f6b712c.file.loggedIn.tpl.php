<?php /* Smarty version Smarty-3.1.18, created on 2014-12-04 12:33:20
         compiled from "Smarty_dir\templates\loggedIn.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1699254804680e2f1e7-78092252%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '43d3ec3d490bce2e173697df9d367dc40f6b712c' => 
    array (
      0 => 'Smarty_dir\\templates\\loggedIn.tpl',
      1 => 1417344724,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1699254804680e2f1e7-78092252',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'username' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54804680e39368_44432957',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54804680e39368_44432957')) {function content_54804680e39368_44432957($_smarty_tpl) {?><div>
	<form method="POST" action="index.php?control=logout">
		<p>Ciao <?php echo ucfirst($_smarty_tpl->tpl_vars['username']->value);?>
</p> <!-- ucfirst capitalizes first letter -->
		<input type="submit" value="Esci">
	</form>
</div><?php }} ?>
