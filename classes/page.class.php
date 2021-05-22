<?php

require_once('./config.class.php');

class Page extends Site_config {

    private $page_title;
    private $page_css;
    private $page_content;
    private $page_sidebar;

    public function set_page_title($title = '') {

        $config = $this->config();

        if ($title == '')
            $this->page_title = "{$config['siteName']} - {$config['siteSlogan']}";
        else
            $this->page_title = "{$config['siteName']} - {$title}";

        echo $this->page_title;
    }

    
    
}

$page = new Page('../_config.ini');
$page->set_page_title('Cadastro de Usuário');