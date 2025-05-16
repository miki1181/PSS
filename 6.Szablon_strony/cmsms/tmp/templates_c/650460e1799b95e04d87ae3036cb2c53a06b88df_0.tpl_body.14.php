<?php
/* Smarty version 4.2.1, created on 2025-05-16 18:09:43
  from 'tpl_body:14' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_682763470f92a8_48455084',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '650460e1799b95e04d87ae3036cb2c53a06b88df' => 
    array (
      0 => 'tpl_body:14',
      1 => '1747411453',
      2 => 'tpl_body',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_682763470f92a8_48455084 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.global_content.php','function'=>'smarty_function_global_content',),1=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.root_url.php','function'=>'smarty_function_root_url',),));
echo smarty_function_global_content(array('name'=>'a_part_top'),$_smarty_tpl);?>

<?php echo smarty_function_global_content(array('name'=>'a_menu_main'),$_smarty_tpl);?>


<!-- Main -->
<div id="main">

  <!-- Intro / Banner -->
  <section id="intro" class="main special">
    <div class="inner">
      <h1><?php echo $_smarty_tpl->tpl_vars['sitename']->value;?>
</h1>
      <p>Witaj na naszej stronie!</p>
      <ul class="actions special">
        <li><a href="#one" class="button primary">Dowiedz się więcej</a></li>
      </ul>
    </div>
  </section>

  <!-- One -->
  <section id="one" class="main special">
    <div class="spotlight">
      <div class="image">
        <img src="<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/templates/hyperspace/images/pic01.jpg" alt="" />
      </div>
      <div class="content">
        <h2>Who We Are</h2>
        <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'one'),$_smarty_tpl); ?>
      </div>
    </div>
  </section>

  <!-- Two -->
  <section id="two" class="main special">
    <div class="spotlight">
      <div class="image">
        <img src="<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/templates/hyperspace/images/pic02.jpg" alt="" />
      </div>
      <div class="content">
        <h2>What We Do</h2>
        <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'two'),$_smarty_tpl); ?>
      </div>
    </div>
  </section>

  <!-- Three -->
  <section id="three" class="main special">
    <div class="spotlight">
      <div class="image">
        <img src="<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/templates/hyperspace/images/pic03.jpg" alt="" />
      </div>
      <div class="content">
        <h2>Get In Touch</h2>
        <?php CMS_Content_Block::smarty_internal_fetch_contentblock(array('block'=>'three'),$_smarty_tpl); ?>
      </div>
    </div>
  </section>

</div> <!-- /main -->

<?php echo smarty_function_global_content(array('name'=>'a_part_bottom'),$_smarty_tpl);
}
}
