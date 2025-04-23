<?php
/* Smarty version 4.3.4, created on 2025-04-23 12:38:48
  from 'C:\xampp\htdocs\MikolajBoborowski\app\views\budgetAnalysis.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6808c3382075c1_70164319',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bfbf1246de32550635751bb176e98fb8472cb8aa' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MikolajBoborowski\\app\\views\\budgetAnalysis.tpl',
      1 => 1743164060,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6808c3382075c1_70164319 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2442635786808c3381f7749_57978193', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7397406616808c3381f7f42_95156851', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "templates/main.tpl");
}
/* {block "title"} */
class Block_2442635786808c3381f7749_57978193 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_2442635786808c3381f7749_57978193',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Analiza Budżetu<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_7397406616808c3381f7f42_95156851 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_7397406616808c3381f7f42_95156851',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\MikolajBoborowski\\lib\\smarty\\plugins\\modifier.number_format.php','function'=>'smarty_modifier_number_format',),));
?>

    <h1>Analiza Budżetu</h1>

    <form method="GET" class="mb-4">
        <div class="row">
            <div class="col-md-4">
                <label for="start_date" class="form-label">Data początkowa</label>
                <input type="date" id="start_date" name="start_date" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['startDate']->value;?>
">
            </div>
            <div class="col-md-4">
                <label for="end_date" class="form-label">Data końcowa</label>
                <input type="date" id="end_date" name="end_date" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['endDate']->value;?>
">
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <button type="submit" class="btn btn-primary w-100">Analizuj</button>
            </div>
        </div>
    </form>

    <h3>Podsumowanie</h3>
    <ul class="list-group mb-4">
        <li class="list-group-item">Suma przychodów: <strong><?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['incomeSum']->value,2);?>
 zł</strong></li>
        <li class="list-group-item">Suma wydatków: <strong><?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['expenseSum']->value,2);?>
 zł</strong></li>
        <li class="list-group-item">Bilans: 
            <strong class="<?php if ($_smarty_tpl->tpl_vars['balance']->value >= 0) {?>text-success<?php } else { ?>text-danger<?php }?>">
                <?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['balance']->value,2);?>
 zł
            </strong>
        </li>
    </ul>

    <h3>Podział wydatków na kategorie</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Kategoria</th>
                <th>Suma wydatków</th>
            </tr>
        </thead>
        <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['expenseBreakdown']->value, 'expense');
$_smarty_tpl->tpl_vars['expense']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['expense']->value) {
$_smarty_tpl->tpl_vars['expense']->do_else = false;
?>
                <tr>
                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['expense']->value['kategoria'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                    <td><?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['expense']->value['suma'],2);?>
 zł</td>
                </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tbody>
    </table>

    <h3>Podział przychodów na kategorie</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Kategoria</th>
                <th>Suma przychodów</th>
            </tr>
        </thead>
        <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['incomeBreakdown']->value, 'income');
$_smarty_tpl->tpl_vars['income']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['income']->value) {
$_smarty_tpl->tpl_vars['income']->do_else = false;
?>
                <tr>
                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['income']->value['kategoria'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                    <td><?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['income']->value['suma'],2);?>
 zł</td>
                </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tbody>
    </table>
<?php
}
}
/* {/block "content"} */
}
