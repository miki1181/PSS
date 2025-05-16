<?php
/* Smarty version 4.2.1, created on 2025-05-16 18:09:43
  from 'cms_template:a_part_top' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_682763471e8fa0_57338862',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5e52a7ff02015b3437281cd41feed83ce74fdc3f' => 
    array (
      0 => 'cms_template:a_part_top',
      1 => '1747411616',
      2 => 'cms_template',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_682763471e8fa0_57338862 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.cms_stylesheet.php','function'=>'smarty_function_cms_stylesheet',),1=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.root_url.php','function'=>'smarty_function_root_url',),2=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.global_content.php','function'=>'smarty_function_global_content',),));
?>
<!DOCTYPE HTML>
<html>
<head>
  <title><?php echo $_smarty_tpl->tpl_vars['sitename']->value;?>
 – <?php echo $_smarty_tpl->tpl_vars['pagetitle']->value;?>
</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <?php echo smarty_function_cms_stylesheet(array(),$_smarty_tpl);?>


  <!-- Hyperspace CSS -->
  <link rel="stylesheet" href="<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/templates/hyperspace/assets/css/main.css" />
  <noscript>
    <link rel="stylesheet" href="<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/templates/hyperspace/assets/css/noscript.css" />
  </noscript>
</head>
<body class="is-preload">

  <!-- Wrapper -->
  <div id="wrapper">

    <!-- Header -->
    <header id="header">
      <a href="<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
" class="logo"><?php echo $_smarty_tpl->tpl_vars['sitename']->value;?>
</a>
    </header>
     <?php echo smarty_function_global_content(array('name'=>'a_menu_main'),$_smarty_tpl);
}
}
