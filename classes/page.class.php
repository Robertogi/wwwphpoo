<?php

require_once(PATH . "/classes/config.class.php");

class Page extends Site_config
{

    private $page_title;
    private $page_css;
    private $page_content;
    private $page_sidebar;
    private $page_javascript;

    public function __construct($config_file)
    {

        Site_config::__construct($config_file);
    }

    public function set_page_title($title = '')
    {

        if ($title == '')
            $this->page_title = "{$this->site_config['siteName']} - {$this->site_config['siteSlogan']}";
        else
            $this->page_title = "{$this->site_config['siteName']} - {$title}";
    }

    public function get_page_title()
    {
        return $this->page_title;
    }

    public function set_page_css($page_css = '')
    {

        if (file_exists($page_css))
            $this->page_css = "<link rel=\"stylesheet\" href=\"{$page_css}\">";
        else
            $this->page_css = '';
    }

    public function set_page_content($html)
    {

        $this->page_content = $html;
    }

    public function set_page_sidebar($html)
    {
        $this->page_sidebar = $html;
    }

    public function set_page_javascript($javascript = '')
    {

        if (file_exists($javascript))
            $this->page_javascript = "<script src=\"{$javascript}\"></script>";
        else
            $this->page_javascript = '';
    }

    public function get_page($template)
    {

        if (!file_exists($template))
            exit('ERRO: arquivo de template não encontrado.');

        if ($this->site_config['siteYear'] < date('Y')) {
            $year = date('Y');
            $copyright = "&copy; Copyright {$this->site_config['siteYear']} {$year} {$this->site_config['siteOwner']}.";
        } else {
            $copyright = "&copy; Copyright {$this->site_config['siteYear']} {$this->site_config['siteOwner']}.";
        }

        $page = file_get_contents($template);

        $replace_this = array(
            '{{PAGE_CSS}}',
            '{{PAGE_TITLE}}',
            '{{SITE_LOGO}}',
            '{{SITE_NAME}}',
            '{{SITE_SLOGAN}}',
            '{{PAGE_CONTENT}}',
            '{{PAGE_SIDEBAR}}',
            '{{SITE_COPYRIGHT}}',
            '{{PAGE_JAVASCRIPT}}'
        );
        $replace_forthis = array(
            $this->page_css,
            $this->page_title,
            $this->site_config['siteLogo'],
            $this->site_config['siteName'],
            $this->site_config['siteSlogan'],
            $this->page_content,
            $this->page_sidebar,
            $copyright,
            $this->page_javascript
        );

        echo str_ireplace($replace_this, $replace_forthis, $page);
    }
}
