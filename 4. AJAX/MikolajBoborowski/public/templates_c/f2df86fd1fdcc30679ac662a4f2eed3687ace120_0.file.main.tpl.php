<?php
/* Smarty version 4.3.4, created on 2025-04-23 12:37:29
  from 'C:\xampp\htdocs\MikolajBoborowski\app\views\templates\main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6808c2e94b6f99_09191658',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f2df86fd1fdcc30679ac662a4f2eed3687ace120' => 
    array (
      0 => 'C:\\xampp\\htdocs\\MikolajBoborowski\\app\\views\\templates\\main.tpl',
      1 => 1745402019,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6808c2e94b6f99_09191658 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!doctype html>
<html lang="pl">
<head>
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/css/styles.css">
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11070385316808c2e94afae1_64444583', "title");
?>
</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">
    <header class="bg-primary text-white py-3">
        <div class="container">
            <h1 class="h3">Budżet Domowy</h1>
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
main">Strona główna</a>
                            </li>
                            <?php if ((isset($_SESSION['user']))) {?>
        <?php if ($_SESSION['user']['role_id'] != 1) {?> 
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
transactions">Transakcje</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
sorting">Sortowanie i Filtrowanie</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
budgetAnalysis">Analiza Budżetu</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
goals">Cele Oszczędnościowe</a>
            </li>
            <li class="nav-item">
        <a class="nav-link" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
changePassword">Zmień hasło</a>
    </li>
        <?php }?>
        
        <?php if ($_SESSION['user']['role_id'] == 1) {?>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
adminPanel">Panel Admina</a>
            </li>
             <li class="nav-item">
        <a class="nav-link" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
adminChangePassword">Zmień hasło użytkownika</a>
    </li>
        <?php }?>

        <li class="nav-item">
            <a class="nav-link" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
logout">Wyloguj</a>
        </li>
    <?php } else { ?>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
login">Logowanie</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
register">Rejestracja</a>
        </li>
    <?php }?>
</ul>
                    </div>
                </div>
            </nav>
        </div>

    </header>

    <main class="container my-4 ">
        
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8296097316808c2e94b6650_37037813', "content");
?>

    </main>

    <footer class="bg-dark text-white text-center py-3 mt-auto">
        <div class="container">
            <p>&copy; 2025 Budżet Domowy. Wszelkie prawa zastrzeżone.</p>
        </div>
    </footer>

    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['conf']->value->app_url;?>
/js/functions.js"><?php echo '</script'; ?>
>
</body>
</html><?php }
/* {block "title"} */
class Block_11070385316808c2e94afae1_64444583 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_11070385316808c2e94afae1_64444583',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Budżet Domowy<?php
}
}
/* {/block "title"} */
/* {block "content"} */
class Block_8296097316808c2e94b6650_37037813 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_8296097316808c2e94b6650_37037813',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "content"} */
}
