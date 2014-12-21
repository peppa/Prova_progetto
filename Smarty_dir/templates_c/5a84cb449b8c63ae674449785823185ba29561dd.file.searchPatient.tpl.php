<?php /* Smarty version Smarty-3.1.18, created on 2014-12-04 18:36:35
         compiled from "Smarty_dir\templates\searchPatient.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1354754809b83c4d233-31549435%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5a84cb449b8c63ae674449785823185ba29561dd' => 
    array (
      0 => 'Smarty_dir\\templates\\searchPatient.tpl',
      1 => 1417714584,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1354754809b83c4d233-31549435',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54809b83c81e25_24222384',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54809b83c81e25_24222384')) {function content_54809b83c81e25_24222384($_smarty_tpl) {?><!DOCTYPE HTML>
<html>
	<head>
		<title>Ricerca paziente</title>
	</head>

	<body>
		<br>
		Inserisci nome, cognome o codice fiscale del paziente
		<br>

		<form method="POST" action="index.php?control=manageDB&action=search">
			<table>
				<tr>
					<td> <input type="text" name="keyValue"> </td>
					<td> <input type="submit" value="cerca"> 
                    <td> <input type="reset" value = "reset"> </td>
                </tr>
            </table>
        </form>
    </body>

</html><?php }} ?>
