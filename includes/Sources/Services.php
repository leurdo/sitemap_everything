<?php
namespace ASE\Sources;

use ASE\Main\Main;

class Services extends Main
{

    public function __construct() {
        parent::__construct();

        parent::$urls = array_merge( parent::$urls, $this->get_urls_list() );
    }

    public function get_urls_list() {
        return [
            'test1' => [
                [
                    'url' => 'http://1test.ru/',
                    'lastmod' => time()
                ],
                [
                    'url' => 'http://1test.ru/kredity/',
                    'lastmod' => time()
                ]
            ]
        ];
    }

}

