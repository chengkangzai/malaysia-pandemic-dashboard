<?php
/**
 * @see https://github.com/artesaos/seotools
 */

return [
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults' => [
            'title' => 'Malaysia Covid 19 Dashboard', // set false to total remove
            'titleBefore' => false, // Put defaults.title before page title, like 'It's Over 9000! - Dashboard'
            'description' => 'A Dashboard to monitoring Covid 19 Cases, HealthCare Facilities and Vaccine Status', // set false to total remove
            'separator' => ' - ',
            'keywords' => ['chengkangzai', 'Ching Cheng Kang', 'Cheng Kang', 'Malaysia Laravel Developer'],
            'canonical' => null, // Set null for using Url::current(), set false to total remove
            'robots' => 'all', // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
        ],
        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google' => true,
            'bing' => true,
            'alexa' => true,
            'pinterest' => true,
            'yandex' => true,
            'norton' => true,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title' => 'Malaysia Covid 19 Dashboard', // set false to total remove
            'description' => 'A Dashboard to monitoring Covid 19 Cases, HealthCare Facilities and Vaccine Status', // set false to total remove
            'url' => null, // Set null for using Url::current(), set false to total remove
            'type' => false,
            'site_name' => false,
            'images' => [config('app.url').'/src/ss_pandemic.png'],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            'card' => 'summary',
            'site' => '@chengkangzai',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title' => 'Malaysia Covid 19 Dashboard', // set false to total remove
            'description' => 'A Dashboard to monitoring Covid 19 Cases, HealthCare Facilities and Vaccine Status', // set false to total remove
            'url' => null, // Set null for using Url::current(), set false to total remove
            'type' => 'WebPage',
            'images' => [config('app.url').'/src/ss_pandemic.png'],
        ],
    ],
];
