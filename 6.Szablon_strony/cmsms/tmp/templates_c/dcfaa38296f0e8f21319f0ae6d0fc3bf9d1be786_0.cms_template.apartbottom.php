<?php
/* Smarty version 4.2.1, created on 2025-05-16 18:09:43
  from 'cms_template:a_part_bottom' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_682763473b6b10_96139848',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'dcfaa38296f0e8f21319f0ae6d0fc3bf9d1be786' => 
    array (
      0 => 'cms_template:a_part_bottom',
      1 => '1747411487',
      2 => 'cms_template',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_682763473b6b10_96139848 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\smarty\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),1=>array('file'=>'C:\\xampp\\htdocs\\cmsms\\lib\\plugins\\function.root_url.php','function'=>'smarty_function_root_url',),));
?>
<!-- Footer -->
    <footer id="footer">
      <div class="inner">
        <ul class="icons">
          <li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
          <li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
          <li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
        </ul>
        <ul class="copyright">
          <li>&copy; <?php echo smarty_modifier_date_format(time(),"%Y");?>
 <?php echo $_smarty_tpl->tpl_vars['sitename']->value;?>
</li>
          <li>Design: <a href="https://html5up.net">HTML5 UP</a></li>
        </ul>
      </div>
    </footer>

  </div> <!-- /wrapper -->

  <!-- Hyperspace JS -->
  <?php echo '<script'; ?>
 src="<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/templates/hyperspace/assets/js/jquery.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/templates/hyperspace/assets/js/browser.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/templates/hyperspace/assets/js/breakpoints.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/templates/hyperspace/assets/js/util.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo smarty_function_root_url(array(),$_smarty_tpl);?>
/templates/hyperspace/assets/js/main.js"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
