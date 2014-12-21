<?php /* Smarty version Smarty-3.1.18, created on 2014-12-04 17:34:41
         compiled from "Smarty_dir\templates\addPatient.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1980354808d21ebef22-79501678%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9d59a2330c30fcb68550ee0cd4a66a47fd8d6005' => 
    array (
      0 => 'Smarty_dir\\templates\\addPatient.tpl',
      1 => 1416586151,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1980354808d21ebef22-79501678',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54808d21eef584_30291805',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54808d21eef584_30291805')) {function content_54808d21eef584_30291805($_smarty_tpl) {?><!DOCTYPE HTML>
<html>
	<head>
		<title>Inserisci paziente</title>
	</head>

	<body>
		<br>
		Inserisci i dati del paziente
		<br>
	    <br>
		<form method="POST" action="index.php?controllerAction=manageDB&action=insert">
			<table>
				<tr>
					<td> Nome: </td>
					<td> <input type="text" name="name"/> </td>
				</tr>

				<tr>
					<td> Cognome: </td>
					<td> <input type="text" name="surname"/> </td>
				</tr>

				<tr>
                <td>Sesso: </td> 
                  <td>
                    <input type="radio" name="gender" value="male"> M 
                    <input type="radio" name="gender" value="female"> F 
                  </td>
                </tr>

                <tr>
                	<td>Data di nascita:</td>
                	<td> <input type="date" name="dateBirth" /> </td>
                </tr>

                <tr>
					<td> Codice Fiscale: </td>
					<td> <input type="text" name="CF"/> </td>
				</tr>

				<tr>
                	<td>Data visita:</td>
                	<td> <input type="date" name="dateCheck" /> </td>
                </tr>

				<tr>
					<td> Anamnesi: </td>
					<td> <textarea rows="5" cols="60" name="medHistory"></textarea>
				</tr>

				<tr>
					<td> Esame obiettivo: </td>
					<td> <textarea rows="5" cols="60" name="medExam"></textarea>
				</tr>

				<tr>
					<td> Conclusioni: </td>
					<td> <textarea rows="5" cols="60" name="conclusions"></textarea>
				</tr>

				<tr>
					<td> Prescrizione esami: </td>
					<td> <textarea rows="5" cols="60" name="toDoExams"></textarea>
				</tr>

				<tr>
					<td> Terapia: </td>
					<td> <textarea rows="5" cols="60" name="terapy"></textarea>
				</tr>

				<tr>
					<td> Controllo: </td>
					<td> <textarea rows="5" cols="60" name="checkup"></textarea>
				</tr>

				<tr>
					<td> <input type="submit" value="invia dati" /> </td>
                    <td> <input type="reset" value = "reset" /> </td>
                </tr>
            </table>
        </form>









	</body>
</html><?php }} ?>
