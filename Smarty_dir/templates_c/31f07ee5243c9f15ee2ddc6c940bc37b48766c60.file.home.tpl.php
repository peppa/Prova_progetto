<?php /* Smarty version Smarty-3.1.18, created on 2014-12-17 15:39:10
         compiled from "Smarty_dir\templates\home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:155065480467fd30421-62378531%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '31f07ee5243c9f15ee2ddc6c940bc37b48766c60' => 
    array (
      0 => 'Smarty_dir\\templates\\home.tpl',
      1 => 1418827070,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '155065480467fd30421-62378531',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5480467fd46002_49100032',
  'variables' => 
  array (
    'loginBox' => 0,
    'body' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5480467fd46002_49100032')) {function content_5480467fd46002_49100032($_smarty_tpl) {?><!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
	<head>
		<title>Healthy Website Template | Home :: W3layouts</title>
		<link href='http://fonts.googleapis.com/css?family=Noto+Sans' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" type="image/x-icon" href="images/pageicon.png" /><!-- website icon -->
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<link rel="stylesheet" href="css/camera.css" type="text/css" media="all" />
		<meta name="keywords" content="Healthy iphone web template, Andriod web template, Smartphone web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
		<link rel="stylesheet" href="css/responsiveslides.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="js/responsiveslides.min.js"></script>
		  
	</head>
	<body>
			<div class="header">
				<div class="wrap">
				<div class="logo">
					<a href="index.php"><img src="images/logo.png" title="logo" /></a>
				</div>

<!-- login -->
            <div>
            	<?php echo $_smarty_tpl->tpl_vars['loginBox']->value;?>

			</div>

				    
	            


				</div>
				<div class="clear"> </div>
				</div>
			</div>
				<div class="clear"> </div>
				<div class="topnav">
				<ul id="topnav">


			        <li class="nav_top"><a href="index.php">Home</a></li>
				        <li class="nav_top">
				            <a href="index.php?control=manageDB">DB</a>
				        </li>
				        <li class="nav_top">
				            <a href="index.php?control=Checkup">Prenota visita</a>
				        </li>
				        <li class="nav_top">
				            <a href="index.php?control=Registration">Registrazione</a>
				        </li>
				       
        		<li class="nav_top"><a href="index.php?control=Contacts">Contatti</a></li>
    		</ul>
    	</div>

		<?php echo $_smarty_tpl->tpl_vars['body']->value;?>

		
			<div class="clear"> </div>
			<div class="footer">
				<div class="left-content">
					<a href="index.php"><img src="images/logo1.png" title="logo" /></a>
				</div>
				<div class="right-content">
					<p>Healthy  &#169	 All Rights Reserved | Design By <a href="http://w3layouts.com/">W3Layouts</a></p>
				</div>
				<div class="clear"> </div>
			</div>
		</div>
	</body>
</html>

<?php }} ?>
