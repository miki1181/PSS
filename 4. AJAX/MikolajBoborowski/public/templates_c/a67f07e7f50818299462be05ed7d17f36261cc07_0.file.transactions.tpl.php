<?php
/* Smarty version 4.3.4, created on 2025-04-23 12:37:30
  from 'C:\xampp\htdocs\MikolajBoborowski\app\views\transactions.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6808c2ea67dc21_48784212',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a67f07e7f50818299462be05ed7d17f36261cc07' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MikolajBoborowski\\app\\views\\transactions.tpl',
      1 => 1745404594,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:transactionsTable.tpl' => 1,
  ),
),false)) {
function content_6808c2ea67dc21_48784212 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10677544356808c2ea66aec6_09543808', "title");
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20211163806808c2ea66b737_95764636', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "templates/main.tpl");
}
/* {block "title"} */
class Block_10677544356808c2ea66aec6_09543808 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_10677544356808c2ea66aec6_09543808',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Transakcje<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_20211163806808c2ea66b737_95764636 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_20211163806808c2ea66b737_95764636',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\MikolajBoborowski\\lib\\smarty\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>

    <h1>Transakcje</h1>

    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
      <div class="alert 
                  <?php if ($_smarty_tpl->tpl_vars['msg']->value->isInfo()) {?>alert-success<?php }?>
                  <?php if ($_smarty_tpl->tpl_vars['msg']->value->isWarning()) {?>alert-warning<?php }?>
                  <?php if ($_smarty_tpl->tpl_vars['msg']->value->isError()) {?>alert-danger<?php }?>"
           role="alert">
        <?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>

      </div>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

        <form id="add-transaction-form" class="mb-4"
          onsubmit="
            ajaxPostForm(
              'add-transaction-form',
              '<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
addTransactionPart',
              'transactions-table'
            );
            return false;
          "
          method="POST">
      <div class="mb-3">
        <label for="amount" class="form-label">Kwota</label>
        <input type="number" step="0.01" class="form-control" id="amount" name="amount" required>
      </div>
      <div class="mb-3">
        <label for="type" class="form-label">Typ</label>
        <select class="form-select" id="type" name="type" required>
          <option value="przychód">Przychód</option>
          <option value="wydatek">Wydatek</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="category" class="form-label">Kategoria</label>
        <input type="text" class="form-control" id="category" name="category" required>
      </div>
      <div class="mb-3">
        <label for="description" class="form-label">Opis</label>
        <textarea class="form-control" id="description" name="description"
                  placeholder="*Opis niewymagany*"></textarea>
      </div>
      <div class="mb-3">
        <label for="date" class="form-label">Data</label>
        <input type="date" class="form-control" id="date" name="date"
               value="<?php echo smarty_modifier_date_format(time(),'%Y-%m-%d');?>
" required>
      </div>
      <button type="submit" class="btn btn-primary">Dodaj transakcję</button>
    </form>

    <div id="transactions-table">
      <?php $_smarty_tpl->_subTemplateRender("file:transactionsTable.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </div>
<?php
}
}
/* {/block "content"} */
}
