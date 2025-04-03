<?php
/* Smarty version 4.3.4, created on 2025-04-03 16:20:54
  from 'C:\xampp\htdocs\MikolajBoborowski\app\views\transactions.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_67ee9946a9f801_03905348',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a67f07e7f50818299462be05ed7d17f36261cc07' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MikolajBoborowski\\app\\views\\transactions.tpl',
      1 => 1743690040,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_67ee9946a9f801_03905348 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_60969604267ee9946a7e606_93780027', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_195007068867ee9946a7f139_99646018', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block "title"} */
class Block_60969604267ee9946a7e606_93780027 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_60969604267ee9946a7e606_93780027',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Transakcje<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_195007068867ee9946a7f139_99646018 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_195007068867ee9946a7f139_99646018',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\MikolajBoborowski\\lib\\smarty\\plugins\\modifier.number_format.php','function'=>'smarty_modifier_number_format',),));
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
                    <?php if ($_smarty_tpl->tpl_vars['msg']->value->isError()) {?>alert-danger<?php }?>" role="alert">
            <?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>

        </div>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

    <form method="POST" class="mb-4">
        <h3>Dodaj nową transakcję</h3>
        <div class="mb-3">
            <label for="amount" class="form-label">Kwota</label>
            <input type="number" class="form-control" id="amount" name="amount" step="1" required>
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
            <textarea class="form-control" id="description" placeholder="*Opis niewymagany*" name="description"></textarea>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Data</label>
            <input type="date" class="form-control" id="date" name="date" value="<?php echo date('Y-m-d');?>
" required>
        </div>
        <button type="submit" class="btn btn-primary">Dodaj transakcję</button>
    </form>

    <h3>Historia transakcji</h3>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Data</th>
                <th>Kwota</th>
                <th>Typ</th>
                <th>Kategoria</th>
                <th>Opis</th>
                <th>Akcje</th>
            </tr>
        </thead>
        <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['transactions']->value, 'transaction');
$_smarty_tpl->tpl_vars['transaction']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['transaction']->value) {
$_smarty_tpl->tpl_vars['transaction']->do_else = false;
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['transaction']->value['data_transakcji'];?>
</td>
                    <td><?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['transaction']->value['kwota'],2);?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['transaction']->value['typ'];?>
</td>
                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['transaction']->value['kategoria'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['transaction']->value['opis'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                    <td>
                        <a href="editTransaction?id=<?php echo $_smarty_tpl->tpl_vars['transaction']->value['id'];?>
" class="btn btn-warning btn-sm">Edytuj</a>
                    <form method="POST" action="deleteTransaction" style="display: inline;">
                        <input type="hidden" name="transaction_id" value="<?php echo $_smarty_tpl->tpl_vars['transaction']->value['id'];?>
">
                        <button type="submit" class="btn btn-danger btn-sm">Usuń transakcję</button>
                    </form>
                </td>
                </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tbody>
    </table>
    <div class="pagination mt-4">
    <nav aria-label="Page navigation">
        <ul class="pagination">
          
            <?php if ($_smarty_tpl->tpl_vars['current_page']->value > 1) {?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?php echo $_smarty_tpl->tpl_vars['current_page']->value-1;?>
" aria-label="Poprzednia">
                        &laquo;
                    </a>
                </li>
            <?php } else { ?>
                <li class="page-item disabled">
                    <span class="page-link">&laquo;</span>
                </li>
            <?php }?>
            
            <?php
$_smarty_tpl->tpl_vars['page'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['page']->step = 1;$_smarty_tpl->tpl_vars['page']->total = (int) ceil(($_smarty_tpl->tpl_vars['page']->step > 0 ? $_smarty_tpl->tpl_vars['total_pages']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['total_pages']->value)+1)/abs($_smarty_tpl->tpl_vars['page']->step));
if ($_smarty_tpl->tpl_vars['page']->total > 0) {
for ($_smarty_tpl->tpl_vars['page']->value = 1, $_smarty_tpl->tpl_vars['page']->iteration = 1;$_smarty_tpl->tpl_vars['page']->iteration <= $_smarty_tpl->tpl_vars['page']->total;$_smarty_tpl->tpl_vars['page']->value += $_smarty_tpl->tpl_vars['page']->step, $_smarty_tpl->tpl_vars['page']->iteration++) {
$_smarty_tpl->tpl_vars['page']->first = $_smarty_tpl->tpl_vars['page']->iteration === 1;$_smarty_tpl->tpl_vars['page']->last = $_smarty_tpl->tpl_vars['page']->iteration === $_smarty_tpl->tpl_vars['page']->total;?>
                <li class="page-item <?php if ($_smarty_tpl->tpl_vars['current_page']->value == $_smarty_tpl->tpl_vars['page']->value) {?>active<?php }?>">
                    <a class="page-link" href="?page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</a>
                </li>
            <?php }
}
?>

            <?php if ($_smarty_tpl->tpl_vars['current_page']->value < $_smarty_tpl->tpl_vars['total_pages']->value) {?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?php echo $_smarty_tpl->tpl_vars['current_page']->value+1;?>
" aria-label="Następna">
                        &raquo;
                    </a>
                </li>
            <?php } else { ?>
                <li class="page-item disabled">
                    <span class="page-link">&raquo;</span>
                </li>
            <?php }?>

        </ul>
    </nav>
</div>


<?php
}
}
/* {/block "content"} */
}
