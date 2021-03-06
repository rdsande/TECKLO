<?php

if ( ! defined('ABSPATH') ) {
    exit('restricted access');
}

return [
    'id'               => 'deal_and_sale_page',
    'title'            => 'Deal and Sale Page',
    'thumbnail'        => $local_dir_url . 'thumbnail.jpg',
    'tmpl_created'     => time(),
    'author'           => 'WPSM',
    'url'              => 'http://recart.wpsoul.com/deal-sale-page/',
    'type'             => 'page',
    'subtype'          => 'wpsm',
    'tags'             => ['deal'],
    'menu_order'       => 0,
    'popularity_index' => 10,
    'trend_index'      => 1,
    'is_pro'           => 0,
    'has_page_settings'=> 1
];
