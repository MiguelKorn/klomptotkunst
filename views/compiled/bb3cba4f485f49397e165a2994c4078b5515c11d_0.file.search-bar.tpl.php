<?php
/* Smarty version 3.1.30, created on 2017-01-26 09:52:57
  from "/Applications/MAMP/htdocs/php2/klomptotkunst/views/partials/search-bar.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5889b8e95243e8_14985160',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bb3cba4f485f49397e165a2994c4078b5515c11d' => 
    array (
      0 => '/Applications/MAMP/htdocs/php2/klomptotkunst/views/partials/search-bar.tpl',
      1 => 1484813249,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5889b8e95243e8_14985160 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="search-container">
    <div class="container">
        
        <form action="?action=search" method="post" class="centerform">
            <input type="text" name="search" id="searchfield" placeholder="Keywords...">
            <input type="submit" id="postsearch" value="Zoeken">
        </form>

    </div>
</div><?php }
}
