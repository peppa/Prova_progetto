<?php /* Smarty version Smarty-3.1.18, created on 2014-12-25 21:21:33
         compiled from "Smarty_dir\templates\body_registration.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1490654915763b24a46-04346182%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '36d71ef5e28c2339ccf885117b1ed008e9b0bb94' => 
    array (
      0 => 'Smarty_dir\\templates\\body_registration.tpl',
      1 => 1419176333,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1490654915763b24a46-04346182',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_54915763c172d1_06166106',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54915763c172d1_06166106')) {function content_54915763c172d1_06166106($_smarty_tpl) {?><br>
	<p>Compila la form per registrarti</p>
	<br>

	<form method="POST" action="index.php?control=Registration&action=addUser">
		<div>
			<div>
				<div>
			    	<label>Nome</label>
			    	<input type="text" name="name" placeholder="Nome">
			  	</div>
			</div>
		</div>

		<div>
	  		<div>
			  	<div>
			    	<label>Cognome</label>
			    	<input type="text" name="surname" placeholder="Cognome">
			  	</div>
			</div>
		</div>

		<div>
			<div>
				<div>
			    	<label>Codice Fiscale</label>
			    	<input type="text" name="CF" placeholder="Codice Fiscale">
			  	</div>
			</div>
		</div>
		

		<div>
	  		<div>
				<div>
			    	<label>Indirizzo Email</label>
			    	<input type="email" name="email" placeholder="Inserici email">
			  	</div>
			</div>
		</div>


		<div>
	  		<div>
				<div>
			    	<label>Username</label>
			    	<input type="text" name="username" placeholder="Username">
			  	</div>
			</div>
		</div>

		<div>
	  		<div>
			  	<div>
			   		<label>Password</label>
			   		<input type="password" name="password" placeholder="Password">
			  	</div>
			</div>
		</div>

	  	<input type="submit" value="Registrati">

	</form><?php }} ?>
