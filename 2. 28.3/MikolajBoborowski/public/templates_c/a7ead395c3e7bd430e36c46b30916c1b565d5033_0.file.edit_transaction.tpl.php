<?php
/* Smarty version 4.3.4, created on 2025-01-31 21:11:02
  from 'C:\xampp\htdocs\MikolajBoborowski\app\views\edit_transaction.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_679d2e56509261_85644057',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a7ead395c3e7bd430e36c46b30916c1b565d5033' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MikolajBoborowski\\app\\views\\edit_transaction.tpl',
      1 => 1738353850,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_679d2e56509261_85644057 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1331149659679d2e564f5a32_14502346', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1838469217679d2e564f6574_42557451', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block "title"} */
class Block_1331149659679d2e564f5a32_14502346 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_1331149659679d2e564f5a32_14502346',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Edytuj Transakcję<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_1838469217679d2e564f6574_42557451 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1838469217679d2e564f6574_42557451',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<h1>Edytuj transakcję</h1>

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
        <label for="amount" class="form-label">Kwota</label>
        <input type="number" class="form-control" id="amount" name="amount" value="<?php echo $_smarty_tpl->tpl_vars['transaction']->value['kwota'];?>
" step="1" required>
    </div>
    <div class="mb-3">
        <label for="type" class="form-label">Typ</label>
        <select class="form-select" id="type" name="type" required>
            <option value="przychód" <?php if ($_smarty_tpl->tpl_vars['transaction']->value['typ'] == 'przychód') {?>selected<?php }?>>Przychód</option>
            <option value="wydatek" <?php if ($_smarty_tpl->tpl_vars['transaction']->value['typ'] == 'wydatek') {?>selected<?php }?>>Wydatek</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="category" class="form-label">Kategoria</label>
        <input type="text" class="form-control" id="category" name="category" value="<?php echo $_smarty_tpl->tpl_vars['transaction']->value['kategoria'];?>
" required>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Opis</label>
        <textarea class="form-control" id="description" name="description"><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['transaction']->value['opis'], ENT_QUOTES, 'UTF-8', true);?>
</textarea>
    </div>
    <div class="mb-3">
        <label for="date" class="form-label">Data</label>
        <input type="date" class="form-control" id="date" name="date" value="<?php echo $_smarty_tpl->tpl_vars['transaction']->value['data_transakcji'];?>
" required>
    </div>
    <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
</form>
<?php
}
}
/* {/block "content"} */
}
