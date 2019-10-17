<?php
namespace ASE;

class Main
{

    /*
    @$urls - urls list for sitemap generation
    structure:
    [ {file name} =>
        [
            'url' => {url}
            'lasmod' => {last modified date}
        ]
    ]

    urls are provided by filter 'ase_urls_list'
    */
    public $urls;

    public function __construct($urls) {
        $this->urls = $urls;
    }

    public function init() {
        if ( !is_array( $this->urls) || empty( $this->urls ) ) {
            throw new \Exception('Неправильный формат данных');
        } else {
            foreach ( $this->urls as $name => $section ) {
                $html = $this->generate_xml_file_content( $section );
                $this->output_to_file( $name, $html );
            }
        }

        return $this;
    }

    public function output_to_file( $name, $html ) {
        $path = ABSPATH . $name . '.xml';

        $dom = new \DOMDocument();
        $dom->preserveWhiteSpace = FALSE;
        $dom->loadXML( $html );

        $dom->save($path);
    }

    public function generate_xml_file_content($urls) {
        $sitemap = [];

        foreach( $urls as $url_array ) {

                $url = $url_array['url'];
                if ( is_ssl() ) {
                    $relative_url = explode('https://', $url)[0];
                } else {
                    $relative_url = explode('http://', $url)[0];
                }

                $url_parts = explode( '/', $relative_url);
                $priority = '0.5';
                $sitemap[] = array(
                    'loc' => $url,
                    'lastmod' => date('Y-m-d', $url_array['lastmod']),
                    'changefreq' => 'daily',
                    'priority' => $priority,
                );

        }

    $html = '<?xml version=\'1.0\' encoding=\'UTF-8\'?>';
    $html .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';

        foreach ($sitemap as $link) {
            $html .= "\t<url>\n";
            $html .= "\t\t<loc>" . htmlentities($link['loc']) . "</loc>\n";
            $html .= "\t\t<lastmod>{$link['lastmod']}</lastmod>\n";
            $html .= "\t\t<changefreq>{$link['changefreq']}</changefreq>\n";
            $html .= "\t\t<priority>{$link['priority']}</priority>\n";
            $html .= "\t</url>\n";
        }

    $html .= '</urlset>';

    return $html;
    }
}