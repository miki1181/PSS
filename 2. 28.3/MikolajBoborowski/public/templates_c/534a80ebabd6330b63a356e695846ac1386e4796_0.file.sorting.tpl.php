<?php
/* Smarty version 4.3.4, created on 2025-01-31 16:07:35
  from 'C:\xampp\htdocs\MikolajBoborowski\app\views\sorting.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_679ce737d70b10_62569463',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '534a80ebabd6330b63a356e695846ac1386e4796' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MikolajBoborowski\\app\\views\\sorting.tpl',
      1 => 1738334949,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_679ce737d70b10_62569463 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_388129140679ce737d587e6_85019671', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_592151192679ce737d59266_22367087', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block "title"} */
class Block_388129140679ce737d587e6_85019671 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_388129140679ce737d587e6_85019671',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Filtrowanie i Sortowanie Transakcji<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_592151192679ce737d59266_22367087 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_592151192679ce737d59266_22367087',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\MikolajBoborowski\\lib\\smarty\\plugins\\modifier.number_format.php','function'=>'smarty_modifier_number_format',),));
?>

    <h1>Filtrowanie i Sortowanie Transakcji</h1>

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

    <form method="GET" class="mb-4">
        <div class="row">
            <div class="col-md-3">
                <label for="type" class="form-label">Typ</label>
                <select name="type" id="type" class="form-select">
                    <option value="">Wszystkie</option>
                    <option value="przychód" <?php if ($_smarty_tpl->tpl_vars['filter']->value['type'] == 'przychód') {?>selected<?php }?>>Przychód</option>
                    <option value="wydatek" <?php if ($_smarty_tpl->tpl_vars['filter']->value['type'] == 'wydatek') {?>selected<?php }?>>Wydatek</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="category" class="form-label">Kategoria</label>
                <input type="text" name="category" id="category" class="form-control" value="<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['filter']->value['category'], ENT_QUOTES, 'UTF-8', true);?>
">
            </div>
            <div class="col-md-3">
                <label for="sort" class="form-label">Sortuj według</label>
                <select name="sort" id="sort" class="form-select">
                    <option value="data_transakcji_desc" <?php if ($_smarty_tpl->tpl_vars['filter']->value['sort'] == 'data_transakcji_desc') {?>selected<?php }?>>Data (najnowsze)</option>
                    <option value="data_transakcji_asc" <?php if ($_smarty_tpl->tpl_vars['filter']->value['sort'] == 'data_transakcji_asc') {?>selected<?php }?>>Data (najstarsze)</option>
                    <option value="kwota_desc" <?php if ($_smarty_tpl->tpl_vars['filter']->value['sort'] == 'kwota_desc') {?>selected<?php }?>>Kwota (malejąco)</option>
                    <option value="kwota_asc" <?php if ($_smarty_tpl->tpl_vars['filter']->value['sort'] == 'kwota_asc') {?>selected<?php }?>>Kwota (rosnąco)</option>
                </select>
            </div>
            <div class="col-md-3 d-flex align-items-end">
                <button type="submit" class="btn btn-primary w-100">Filtruj</button>
            </div>
        </div>
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
