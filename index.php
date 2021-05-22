<?php

define('PATH', $_SERVER['DOCUMENT_ROOT']);

require_once(PATH . '/classes/page.class.php');

$content = <<<HTML

<h3>Só Exemplo</h3>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid ex quas eligendi nisi tenetur dignissimos corrupti iste dolorum velit. Alias velit nam similique itaque dolores cupiditate obcaecati. In, dolorum beatae!</p>

HTML;

$sidebar = <<<HTML

<h4>Sidebar</h4>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum aperiam dolorum delectus nam officiis, amet accusantium non.</p>

HTML;

$page_title = "Cadastro do Joca";

$page = new Page('./_config.ini');
$page->set_page_content($content);
$page->set_page_sidebar($sidebar);
$page->set_page_title($page_title);
$page->set_page_css('./css/template.css');
$page->set_page_javascript('./js/template.js');

$page->get_page('./template/page01.html');
