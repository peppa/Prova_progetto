<?php /* Smarty version Smarty-3.1.18, created on 2014-12-16 10:12:24
         compiled from "Smarty_dir\templates\modifyPatient.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6123548ff778779ca7-52528987%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e8b305883c7964ee0c1539a3800b2fc5e3ac4ce4' => 
    array (
      0 => 'Smarty_dir\\templates\\modifyPatient.tpl',
      1 => 1416833667,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6123548ff778779ca7-52528987',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
    'name' => 0,
    'surname' => 0,
    'checkedM' => 0,
    'checkedF' => 0,
    'cf' => 0,
    'medHistory' => 0,
    'medExam' => 0,
    'conclusions' => 0,
    'toDoExams' => 0,
    'terapy' => 0,
    'checkup' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_548ff7788774a4_95662371',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_548ff7788774a4_95662371')) {function content_548ff7788774a4_95662371($_smarty_tpl) {?><!DOCTYPE HTML>
<html>
	<head>
		<title>Inserisci paziente</title>
	</head>

	<body>
		<br>
		Modifica i dati del paziente
		<br>
	    <br>
		<form method="POST" action="index.php?controllerAction=manageDB&action=modify&mod=completed&pat=<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
">
			<table>

				<tr>
					<td> Nome: </td>
					<td> <input type="text" name="name" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
"/> </td>
				</tr>

				<tr>
					<td> Cognome: </td>
					<td> <input type="text" name="surname" value="<?php echo $_smarty_tpl->tpl_vars['surname']->value;?>
"/> </td>
				</tr>

				<tr>
                <td>Sesso: </td> 
                  <td>
                    <input type="radio" name="gender" value="male" <?php echo $_smarty_tpl->tpl_vars['checkedM']->value;?>
> M 
                    <input type="radio" name="gender" value="female" <?php echo $_smarty_tpl->tpl_vars['checkedF']->value;?>
> F 
                  </td>
                </tr>

                <tr>
                	<td>Data di nascita:</td>
                	<td> <input type="date" name="dateBirth" /> </td>
                </tr>

                <tr>
					<td> Codice Fiscale: </td>
					<td> <input type="text" name="CF" value="<?php echo $_smarty_tpl->tpl_vars['cf']->value;?>
"/> </td>
				</tr>

				<tr>
                	<td>Data visita:</td>
                	<td> <input type="date" name="dateCheck"/> </td>
                </tr>

				<tr>
					<td> Anamnesi: </td>
					<td> <textarea rows="5" cols="60" name="medHistory"><?php echo $_smarty_tpl->tpl_vars['medHistory']->value;?>
</textarea>
				</tr>

				<tr>
					<td> Esame obiettivo: </td>
					<td> <textarea rows="5" cols="60" name="medExam"><?php echo $_smarty_tpl->tpl_vars['medExam']->value;?>
</textarea>
				</tr>

				<tr>
					<td> Conclusioni: </td>
					<td> <textarea rows="5" cols="60" name="conclusions"><?php echo $_smarty_tpl->tpl_vars['conclusions']->value;?>
</textarea>
				</tr>

				<tr>
					<td> Prescrizione esami: </td>
					<td> <textarea rows="5" cols="60" name="toDoExams" ><?php echo $_smarty_tpl->tpl_vars['toDoExams']->value;?>
</textarea>
				</tr>

				<tr>
					<td> Terapia: </td>
					<td> <textarea rows="5" cols="60" name="terapy" ><?php echo $_smarty_tpl->tpl_vars['terapy']->value;?>
</textarea>
				</tr>

				<tr>
					<td> Controllo: </td>
					<td> <textarea rows="5" cols="60" name="checkup"><?php echo $_smarty_tpl->tpl_vars['checkup']->value;?>
</textarea>
				</tr>

				<tr>
					<td> <input type="submit" value="invia dati" /> </td>
                    <td> <input type="reset" value = "reset" /> </td>
                </tr>
            </table>
        </form>









	</body>
</html><?php }} ?>
