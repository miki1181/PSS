<?php
/* Smarty version 4.3.4, created on 2025-02-01 10:09:14
  from 'C:\xampp\htdocs\MikolajBoborowski\app\views\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_679de4ba18b216_92147250',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f741b9740f2b7873f194053e7c609d427ad30943' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MikolajBoborowski\\app\\views\\login.tpl',
      1 => 1738400952,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_679de4ba18b216_92147250 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_635454686679de4ba17b667_65753523', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_940661186679de4ba17c084_77669595', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block "title"} */
class Block_635454686679de4ba17b667_65753523 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_635454686679de4ba17b667_65753523',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Logowanie<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_940661186679de4ba17c084_77669595 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_940661186679de4ba17c084_77669595',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <h1>Logowanie</h1>

    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
        <div class="alert 
                    <?php if ($_smarty_tpl->tpl_vars['msg']->value->isInfo()) {?>alert-success<?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['msg']->value->isWarning()) {?>alert-warning<?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['msg']->value->isError()) {?>alert-danger<?php }?>" role="alert">
            <?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>

        </div>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

    <form method="POST">
         <div class="mb-3">
        <label class="form-label">Email: <input type="email" name="email" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['email']->value, ENT_QUOTES, 'UTF-8', true);?>
" class="form-control" required></label><br>
         </div>
          <div class="mb-3">
        <label class="form-label">Hasło: <input type="password" name="password" class="form-control" required></label><br>
          </div>
        <button type="submit" class="btn btn-primary">Zaloguj</button>
    </form>
<?php
}
}
/* {/block "content"} */
}
