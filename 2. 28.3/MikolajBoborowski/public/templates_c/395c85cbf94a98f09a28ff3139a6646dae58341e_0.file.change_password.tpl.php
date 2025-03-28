<?php
/* Smarty version 4.3.4, created on 2025-01-31 22:07:56
  from 'C:\xampp\htdocs\MikolajBoborowski\app\views\change_password.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_679d3bac71b8b8_32656355',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '395c85cbf94a98f09a28ff3139a6646dae58341e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MikolajBoborowski\\app\\views\\change_password.tpl',
      1 => 1738357656,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_679d3bac71b8b8_32656355 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_217407091679d3bac70cc40_60739497', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_520239850679d3bac70d709_44361733', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block "title"} */
class Block_217407091679d3bac70cc40_60739497 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_217407091679d3bac70cc40_60739497',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Zmiana hasła<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_520239850679d3bac70d709_44361733 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_520239850679d3bac70d709_44361733',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <h1>Zmiana hasła</h1>

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
            <label for="current_password" class="form-label">Obecne hasło</label>
            <input type="password" id="current_password" name="current_password" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="new_password" class="form-label">Nowe hasło</label>
            <input type="password" id="new_password" name="new_password" class="form-control" required minlength="8">
        </div>
        <div class="mb-3">
            <label for="confirm_password" class="form-label">Potwierdź nowe hasło</label>
            <input type="password" id="confirm_password" name="confirm_password" class="form-control" required minlength="8">
        </div>
        <button type="submit" class="btn btn-primary">Zmień hasło</button>
    </form>
<?php
}
}
/* {/block "content"} */
}
