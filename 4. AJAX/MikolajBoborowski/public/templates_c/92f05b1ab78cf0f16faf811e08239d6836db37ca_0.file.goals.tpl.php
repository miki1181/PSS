<?php
/* Smarty version 4.3.4, created on 2025-04-23 12:40:13
  from 'C:\xampp\htdocs\MikolajBoborowski\app\views\goals.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6808c38d888e48_34041264',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '92f05b1ab78cf0f16faf811e08239d6836db37ca' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MikolajBoborowski\\app\\views\\goals.tpl',
      1 => 1743164060,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6808c38d888e48_34041264 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1831398536808c38d875ad1_69154677', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20123097006808c38d876460_74084966', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block "title"} */
class Block_1831398536808c38d875ad1_69154677 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_1831398536808c38d875ad1_69154677',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Cele Oszczędnościowe<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_20123097006808c38d876460_74084966 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_20123097006808c38d876460_74084966',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\MikolajBoborowski\\lib\\smarty\\plugins\\modifier.number_format.php','function'=>'smarty_modifier_number_format',),1=>array('file'=>'C:\\xampp\\htdocs\\MikolajBoborowski\\lib\\smarty\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>

    <h1>Cele Oszczędnościowe</h1>

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
        <h3>Dodaj nowy cel</h3>
        <div class="mb-3">
            <label for="goal_name" class="form-label">Nazwa celu</label>
            <input type="text" id="goal_name" name="goal_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="target_amount" class="form-label">Kwota docelowa</label>
            <input type="number" id="target_amount" name="target_amount" class="form-control" step="1" required>
        </div>
        <div class="mb-3">
            <label for="deadline" class="form-label">Termin</label>
            <input type="date" id="deadline" name="deadline" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Dodaj cel</button>
    </form>

    <h3>Twoje cele</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nazwa</th>
                <th>Kwota docelowa</th>
                <th>Aktualna kwota</th>
                <th>Termin</th>
                <th>Akcje</th>
            </tr>
        </thead>
        <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['goals']->value, 'goal');
$_smarty_tpl->tpl_vars['goal']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['goal']->value) {
$_smarty_tpl->tpl_vars['goal']->do_else = false;
?>
                <tr>
                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['goal']->value['nazwa_celu'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                    <td><?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['goal']->value['kwota_docelowa'],2);?>
 zł</td>
                    <td><?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['goal']->value['aktualna_kwota'],2);?>
 zł</td>
                    <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['goal']->value['termin'],"%Y-%m-%d");?>
</td>
                    <td>
                        <form method="POST" class="d-inline">
                            <input type="hidden" name="goal_id" value="<?php echo $_smarty_tpl->tpl_vars['goal']->value['id'];?>
">
                            <div class="input-group">
                                <input type="number" name="amount" class="form-control" placeholder="Kwota" step="1" required>
                                <button type="submit" class="btn btn-success">Wpłać</button>
                            </div>
                        </form>
                    </td>
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
