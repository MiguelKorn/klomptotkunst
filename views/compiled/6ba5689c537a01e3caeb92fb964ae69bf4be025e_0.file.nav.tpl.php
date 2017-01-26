<?php
/* Smarty version 3.1.30, created on 2017-01-26 09:52:57
  from "/Applications/MAMP/htdocs/php2/klomptotkunst/views/partials/nav.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5889b8e9529942_67400679',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6ba5689c537a01e3caeb92fb964ae69bf4be025e' => 
    array (
      0 => '/Applications/MAMP/htdocs/php2/klomptotkunst/views/partials/nav.tpl',
      1 => 1484899683,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5889b8e9529942_67400679 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Navigation -->
<nav class="cbp-spmenu-push" id="nav">
    <div class="container">
        <div class="logo">
            <a href="?action=home">Van <strong>klomp</strong> tot <strong>kunst</strong></a>
        </div>
        <div class="search" id="search"></div>
        <div class="languageswitch">
            <div class="ned"></div>
            <div class="eng"></div>
        </div>

        <div class="hamburger" id="showRightPush"></div>

        <ul>
            <li><a href="?action=home" class="active">Home</a></li>
            <li>
                <a href="#" class="locations">Locations</a>

                <div class="dropdown">
                    <div class="row"><a href="?action=locations&loc=edam">Edam</a></div>
                    <div class="row"><a href="?action=locations&loc=volendam">Volendam</a></div>
                    <div class="row"><a href="?action=locations&loc=warder">Warder</a></div>
                    <div class="row"><a href="?action=locations&loc=kwadijk">Kwadijk</a></div>
                    <div class="row"><a href="?action=locations&loc=oosthuizen">Oosthuizen</a></div>
                    <div class="row"><a href="?action=locations&loc=schardam">Schardam</a></div>
                    <div class="row"><a href="?action=locations&loc=beets">Beets</a></div>
                    <div class="row"><a href="?action=locations&loc=middelie">Middelie</a></div>
                    <div class="row"><a href="?action=locations&loc=hobrede">Hobrede</a></div>
                </div>
            </li>
            <li><a href="?action=agenda" id="agenda">Agenda</a></li>
            <li><a href="?action=contact">Contact</a></li>
        </ul>
    </div>
</nav>
<!-- End Navigation -->

<!-- Mobile Navigation -->
<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-right" id="cbp-spmenu-s2">
    <h1>Menu</h1>
    <a href="?action=home">Home</a>
    <a href="#" id="locaties">Locaties
        <div class="arrow"></div>
    </a>

    <!-- Mobile subnav -->
    <ul class="subnav">
        <li><a href="?action=locations&loc=edam">Edam</a></li>
        <li><a href="?action=locations&loc=volendam">Volendam</a></li>
        <li><a href="?action=locations&loc=warder">Warder</a></li>
        <li><a href="?action=locations&loc=kwadijk">Kwadijk</a></li>
        <li><a href="?action=locations&loc=oosthuizen">Oosthuizen</a></li>
        <li><a href="?action=locations&loc=shardam">Schardam</a></li>
        <li><a href="?action=locations&loc=beets">Beets</a></li>
        <li><a href="?action=locations&loc=middelie">Middelie</a></li>
        <li><a href="?action=locations&loc=hobrede">Hobrede</a></li>
    </ul>
    <!-- End Mobile subnav -->

    <a href="?action=agenda" id="agenda">Agenda</a>
    <a href="?action=contact">Contact</a>

    <form action="#" method="POST">
        <!-- <div class="search-btn"></div> -->
        <input type="text" placeholder="Zoeken...">
        <input type="submit" class="search-btn">
    </form>

    <div class="languages">
        <div class="ned"></div>
        <div class="eng"></div>
    </div>
</div>
<!-- End Mobile Navigation --><?php }
}
