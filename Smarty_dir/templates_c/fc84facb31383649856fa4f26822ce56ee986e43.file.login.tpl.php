<?php /* Smarty version Smarty-3.1.18, created on 2014-12-30 18:33:40
         compiled from "Smarty_dir\templates\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:273805480467fcc0467-97140706%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fc84facb31383649856fa4f26822ce56ee986e43' => 
    array (
      0 => 'Smarty_dir\\templates\\login.tpl',
      1 => 1419960819,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '273805480467fcc0467-97140706',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_5480467fcf2122_53912466',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5480467fcf2122_53912466')) {function content_5480467fcf2122_53912466($_smarty_tpl) {?><div>
  <form method="POST" action="index.php?control=login">

    <div>
      <input type="text" name="username" placeholder="username">
      <input type="password" name="password" placeholder="password">
      <input type="submit" value="Login">
    </div>

    <div>
      <input type="checkbox" name="keepLogged" value="yes"> Ricordami
    </div>

  </form>
</div>

<div>
  <form method="POST" action="index.php?control=recoverPass">
    <a href=""> Password dimenticata ? </a>
  </form>
</div><?php }} ?>
