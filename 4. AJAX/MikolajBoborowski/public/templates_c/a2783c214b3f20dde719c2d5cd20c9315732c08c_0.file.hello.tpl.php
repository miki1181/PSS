<?php
/* Smarty version 4.3.4, created on 2025-04-23 12:37:29
  from 'C:\xampp\htdocs\MikolajBoborowski\app\views\hello.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6808c2e937c685_63251174',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a2783c214b3f20dde719c2d5cd20c9315732c08c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MikolajBoborowski\\app\\views\\hello.tpl',
      1 => 1743164060,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6808c2e937c685_63251174 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11057390766808c2e93686b6_01389871', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13143417566808c2e9368fb6_54945706', "content");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.tpl");
}
/* {block "title"} */
class Block_11057390766808c2e93686b6_01389871 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_11057390766808c2e93686b6_01389871',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Strona główna<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_13143417566808c2e9368fb6_54945706 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_13143417566808c2e9368fb6_54945706',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\MikolajBoborowski\\lib\\smarty\\plugins\\modifier.count.php','function'=>'smarty_modifier_count',),1=>array('file'=>'C:\\xampp\\htdocs\\MikolajBoborowski\\lib\\smarty\\plugins\\modifier.number_format.php','function'=>'smarty_modifier_number_format',),));
?>

    <h1>Witaj w aplikacji Budżet Domowy!</h1>
    <p>Wybierz opcję z menu powyżej.</p>
    <?php if (smarty_modifier_count($_smarty_tpl->tpl_vars['recent_transactions']->value) > 0) {?>
    <h3>Twoje ostatnie transakcje:</h3>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Data</th>
                <th>Kategoria</th>
                <th>Kwota</th>
                <th>Typ</th>
            </tr>
        </thead>
        <tbody>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['recent_transactions']->value, 'transaction');
$_smarty_tpl->tpl_vars['transaction']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['transaction']->value) {
$_smarty_tpl->tpl_vars['transaction']->do_else = false;
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['transaction']->value['data_transakcji'];?>
</td>
                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['transaction']->value['kategoria'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                    <td><?php echo smarty_modifier_number_format($_smarty_tpl->tpl_vars['transaction']->value['kwota'],2);?>
 zł</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['transaction']->value['typ'];?>
</td>
                </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tbody>
    </table>
<?php }?>

<?php
}
}
/* {/block "content"} */
}
