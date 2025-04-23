<?php
/* Smarty version 4.3.4, created on 2025-04-23 12:37:33
  from 'C:\xampp\htdocs\MikolajBoborowski\app\views\sorting.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6808c2ed1be344_14514097',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '534a80ebabd6330b63a356e695846ac1386e4796' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MikolajBoborowski\\app\\views\\sorting.tpl',
      1 => 1744972216,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6808c2ed1be344_14514097 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11474188586808c2ed1a70d3_29312867', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_950441006808c2ed1a78f6_15243974', "content");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block "title"} */
class Block_11474188586808c2ed1a70d3_29312867 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_11474188586808c2ed1a70d3_29312867',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Filtrowanie i Sortowanie Transakcji<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_950441006808c2ed1a78f6_15243974 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_950441006808c2ed1a78f6_15243974',
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

    <div class="pagination mt-4">
        <nav aria-label="Page navigation">
            <ul class="pagination">

                <?php if ($_smarty_tpl->tpl_vars['current_page']->value > 1) {?>
                    <li class="page-item">
                        <a class="page-link"
                           href="?page=<?php echo $_smarty_tpl->tpl_vars['current_page']->value-1;?>

&amp;type=<?php echo rawurlencode((string)$_smarty_tpl->tpl_vars['filter']->value['type']);?>

&amp;category=<?php echo rawurlencode((string)$_smarty_tpl->tpl_vars['filter']->value['category']);?>

&amp;sort=<?php echo rawurlencode((string)$_smarty_tpl->tpl_vars['filter']->value['sort']);?>
"
                           aria-label="Poprzednia">
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
                        <a class="page-link"
                           href="?page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>

&amp;type=<?php echo rawurlencode((string)$_smarty_tpl->tpl_vars['filter']->value['type']);?>

&amp;category=<?php echo rawurlencode((string)$_smarty_tpl->tpl_vars['filter']->value['category']);?>

&amp;sort=<?php echo rawurlencode((string)$_smarty_tpl->tpl_vars['filter']->value['sort']);?>
">
                            <?php echo $_smarty_tpl->tpl_vars['page']->value;?>

                        </a>
                    </li>
                <?php }
}
?>

                <?php if ($_smarty_tpl->tpl_vars['current_page']->value < $_smarty_tpl->tpl_vars['total_pages']->value) {?>
                    <li class="page-item">
                        <a class="page-link"
                           href="?page=<?php echo $_smarty_tpl->tpl_vars['current_page']->value+1;?>

&amp;type=<?php echo rawurlencode((string)$_smarty_tpl->tpl_vars['filter']->value['type']);?>

&amp;category=<?php echo rawurlencode((string)$_smarty_tpl->tpl_vars['filter']->value['category']);?>

&amp;sort=<?php echo rawurlencode((string)$_smarty_tpl->tpl_vars['filter']->value['sort']);?>
"
                           aria-label="Następna">
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
