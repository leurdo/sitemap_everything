<?php
/*
Plugin Name: Am Sitemap Everything
Description: Make xml sitemap for special sections
Version: 1.0.0
Author: Katya Leurdo
Texdomain: responsive
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

if ( ! defined( 'ASE_PATH' ) ) {
    /**
     * Path to the plugin dir.
     */
    define( 'ASE_PATH', dirname( __FILE__ ) );
}

if ( ! isset( $ase_plugin ) ) {
    require_once ASE_PATH . '/vendor/autoload.php';

    try {
        $ase_plugin = ( new \ASE\Main\Main() )->init();
    } catch (Exception $e) {
        if ( is_admin() ) {
            echo 'Ошибка: ',  $e->getMessage(), "\n";
        }
    }

}

