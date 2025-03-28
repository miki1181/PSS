<?php
/* Smarty version 4.3.4, created on 2025-01-31 22:39:26
  from 'C:\xampp\htdocs\MikolajBoborowski\app\views\admin_change_password.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_679d430e949085_13211212',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1a21f8a5725d13e496787354b1400a69c2cd7a4e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MikolajBoborowski\\app\\views\\admin_change_password.tpl',
      1 => 1738359556,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_679d430e949085_13211212 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_789408950679d430e92b480_66405264', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1919057388679d430e92bf16_02610207', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block "title"} */
class Block_789408950679d430e92b480_66405264 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_789408950679d430e92b480_66405264',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Zmiana hasła użytkownika<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_1919057388679d430e92bf16_02610207 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1919057388679d430e92bf16_02610207',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <h1>Zmiana hasła użytkownika</h1>

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
            <label for="email" class="form-label">Adres e-mail użytkownika</label>
            <input type="email" id="email" name="email" class="form-control" required>
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
