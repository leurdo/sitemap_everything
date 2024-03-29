<?php
namespace ASE\Sources;

use ASE\Main\Main;

class Servicetypes extends Main
{

    public function __construct() {
        parent::__construct();

        parent::$urls = array_merge( parent::$urls, $this->get_urls_list() );
    }

    public function get_urls_list() {
        return [
            'test' => [
                [
                    'url' => 'http://test.ru/',
                    'lastmod' => time()
                ],
                [
                    'url' => 'http://test.ru/kredity/',
                    'lastmod' => time()
                ]
            ]
        ];
    }

}

