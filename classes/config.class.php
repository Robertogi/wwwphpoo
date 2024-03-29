<?php

require_once('db.class.php');

class Site_config extends Db {

    protected $site_config;

    public function __construct($config_file) {

        Db::__construct($config_file);

        $this->config();

    }

    public function config() {

        $res = $this->dbquery("SELECT * FROM config");
        while ($data = $res->fetch_assoc()):

            if(substr($data['var'], 0, 7) == 'social_') {

                // Obtém lista de redes sociais
                $var = str_ireplace('social_', '', $data['var']);
                $this->site_config['social_'][$var] = $data['val'];
            } else if(substr($data['var'], 0, 5) == 'meta_') {
        
                // Obtém lista de meta tags. Atributo "name"
                $var = str_ireplace('meta_', '', $data['var']);
                $this->site_config['meta_'][$var] = $data['val'];        
            } else {
        
                // Todas as outras variáveis
                $this->site_config[$data['var']] = $data['val'];
            }

        endwhile;
    }

    public function get_config() {
        return $this->site_config;
    }

}

// Teste unitáro
// $config = new Site_config('../_config.ini');
// print_r($config->get_config());