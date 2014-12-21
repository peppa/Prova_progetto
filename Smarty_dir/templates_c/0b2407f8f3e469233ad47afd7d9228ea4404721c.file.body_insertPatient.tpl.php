<?php /* Smarty version Smarty-3.1.18, created on 2014-12-04 17:57:24
         compiled from "Smarty_dir\templates\body_insertPatient.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11877548091f9dcb814-22397379%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0b2407f8f3e469233ad47afd7d9228ea4404721c' => 
    array (
      0 => 'Smarty_dir\\templates\\body_insertPatient.tpl',
      1 => 1417712235,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11877548091f9dcb814-22397379',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_548091f9df4c52_78450184',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_548091f9df4c52_78450184')) {function content_548091f9df4c52_78450184($_smarty_tpl) {?>
		<br>
		Inserisci i dati del paziente
		<br>
	    <br>
		<form method="POST" action="index.php?control=manageDB&action=insert&sent=y">
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
        </form><?php }} ?>
