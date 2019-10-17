<?php
namespace ASE;

class Servicetypes
{
    public static function init() {
        $class = __CLASS__;
        new $class;

        add_filter( 'ase_urls_list', [$class, 'get_urls_list'] );
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

add_action( 'ase_init_classes', ['ASE\Servicetypes', 'init'] );
