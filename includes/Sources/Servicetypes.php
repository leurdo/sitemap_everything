<?php
namespace ASE\Sources;

class Servicetypes
{

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

add_filter( 'sources_class_names', function($class_names) {
    return $class_names['ASE\Sources\Servicetypes'];
} );
