<?php
/* Smarty version 4.3.4, created on 2025-04-23 12:37:30
  from 'C:\xampp\htdocs\MikolajBoborowski\app\views\transactionsTable.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6808c2ea780465_72510362',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4daf3e155a3fcae789a4449ee332f22bda3770d7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MikolajBoborowski\\app\\views\\transactionsTable.tpl',
      1 => 1745403448,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6808c2ea780465_72510362 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\MikolajBoborowski\\lib\\smarty\\plugins\\modifier.number_format.php','function'=>'smarty_modifier_number_format',),));
?>
<table class="table table-striped">
  <thead>
    <tr>
      <th>Data</th>
      <th>Opis</th>
      <th>Kategoria</th>
      <th>Kwota</th>
      <th>Akcje</th>
    </tr>
  </thead>
  <tbody>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['transactions']->value, 'tr');
$_smarty_tpl->tpl_vars['tr']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['tr']->value) {
$_smarty_tpl->tpl_vars['tr']->do_else = false;
?>
      <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['tr']->value['data_transakcji'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['tr']->value['opis'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['tr']->value['kategoria'];?>
</td>
        <td><?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['tr']->value['kwota'],2,'.',',');?>
</td>
        <td>
          <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
editTransaction?id=<?php echo $_smarty_tpl->tpl_vars['tr']->value['id'];?>
"
             class="btn btn-sm btn-warning me-1">
            Edytuj
          </a>
          <form id="del-<?php echo $_smarty_tpl->tpl_vars['tr']->value['id'];?>
"
                onsubmit="ajaxPostForm(
                            this.id,
                            '<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
deleteTransaction',
                            'transactions-table'
                          ); return false;"
                method="POST" style="display:inline">
            <input type="hidden" name="transaction_id" value="<?php echo $_smarty_tpl->tpl_vars['tr']->value['id'];?>
" />
            <button type="submit" class="btn btn-sm btn-danger">Usuń transakcję</button>
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
" aria-label="Poprzednia">&laquo;</a>
        </li>
      <?php } else { ?>
        <li class="page-item disabled"><span class="page-link">&laquo;</span></li>
      <?php }?>

      <?php
$__section_pg_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['total_pages']->value+1) ? count($_loop) : max(0, (int) $_loop));
$__section_pg_0_start = min(1, $__section_pg_0_loop);
$__section_pg_0_total = min(($__section_pg_0_loop - $__section_pg_0_start), $__section_pg_0_loop);
$_smarty_tpl->tpl_vars['__smarty_section_pg'] = new Smarty_Variable(array());
if ($__section_pg_0_total !== 0) {
for ($__section_pg_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_pg']->value['index'] = $__section_pg_0_start; $__section_pg_0_iteration <= $__section_pg_0_total; $__section_pg_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_pg']->value['index']++){
?>
        <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_section_pg']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_pg']->value['index'] : null) == $_smarty_tpl->tpl_vars['current_page']->value) {?>
          <li class="page-item active"><span class="page-link"><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_pg']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_pg']->value['index'] : null);?>
</span></li>
        <?php } else { ?>
          <li class="page-item"><a class="page-link" href="?page=<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_pg']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_pg']->value['index'] : null);?>
"><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_pg']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_pg']->value['index'] : null);?>
</a></li>
        <?php }?>
      <?php
}
}
?>

      <?php if ($_smarty_tpl->tpl_vars['current_page']->value < $_smarty_tpl->tpl_vars['total_pages']->value) {?>
        <li class="page-item">
          <a class="page-link" href="?page=<?php echo $_smarty_tpl->tpl_vars['current_page']->value+1;?>
" aria-label="Następna">&raquo;</a>
        </li>
      <?php } else { ?>
        <li class="page-item disabled"><span class="page-link">&raquo;</span></li>
      <?php }?>
    </ul>
  </nav>
</div>
<?php }
}
