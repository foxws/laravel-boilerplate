<?php

return [
    /*
    |--------------------------------------------------------------------------
    | MeiliSearch Host Address
    |--------------------------------------------------------------------------
    |
    | This value is used to connect to your MeiliSearch instance. It should
    | include the HTTP address and binding that the server is listening on.
    |
    | For more information on the host address, check out the MeiliSearch
    | documentation here:
    | https://docs.meilisearch.com/guides/advanced_guides/configuration.html
    |
    */

    'host' => env('MEILISEARCH_HOST', 'http://localhost:7700'),

    /*
    |--------------------------------------------------------------------------
    | MeiliSearch Master Key
    |--------------------------------------------------------------------------
    |
    | This value is used to authenticate with your MeiliSearch instance. During
    | development this is not required, but it MUST be set during a production
    | environment.
    |
    | For more information on the master key, check out the MeiliSearch
    | documentation here:
    | https://docs.meilisearch.com/guides/advanced_guides/configuration.html
    |
    */

    'key' => env('MEILISEARCH_KEY', null),

    /*
    |--------------------------------------------------------------------------
    | MeiliSearch Models
    |--------------------------------------------------------------------------
    |
    | Controls which models to be searchable and synced.
    |
    */

    'models' => [
        Domain\Users\Models\User::class,
        Domain\Posts\Models\Post::class,
        Domain\Tags\Models\Tag::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | MeiliSearch Indexes
    |--------------------------------------------------------------------------
    |
    | Used to create and set settings for indexes.
    |
    */

    'indexes' => [
        [
            'name' => 'users_index',
            'settings' => [
                'searchableAttributes' => [
                    'name',
                    'email',
                    'description',
                ],

                'filterableAttributes' => [
                    'id',
                    'name',
                    'email',
                    'state',
                    'created_at',
                    'updated_at',
                    'verified_at',
                    '__soft_deleted',
                ],

                'sortableAttributes' => [
                    'name',
                    'email',
                    'state',
                    'verified_at',
                    'created_at',
                    'updated_at',
                ],
            ],
        ],

        [
            'name' => 'posts_index',
            'settings' => [
                'searchableAttributes' => [
                    'name',
                    'content',
                    'summary',
                    'tags',
                ],

                'filterableAttributes' => [
                    'id',
                    'tags',
                    'state',
                    'created_at',
                    'updated_at',
                    '__soft_deleted',
                ],

                'sortableAttributes' => [
                    'name',
                    'created_at',
                    'updated_at',
                ],
            ],
        ],

        [
            'name' => 'tags_index',
            'settings' => [
                'searchableAttributes' => [
                    'name',
                    'description',
                    'type',
                ],

                'filterableAttributes' => [
                    'id',
                    'name',
                    'type',
                    'created_at',
                    'updated_at',
                    '__soft_deleted',
                ],

                'sortableAttributes' => [
                    'id',
                    'name',
                    'size',
                    'type',
                    'order',
                    'created_at',
                    'updated_at',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | MeiliSearch Settings
    |--------------------------------------------------------------------------
    |
    | Settings that apply for all indexes.
    |
    */

    'settings' => [
        'synonyms' => [
            '1' => ['01'],
            '2' => ['02'],
            '3' => ['03'],
            '4' => ['04'],
            '5' => ['05'],
            '6' => ['06'],
            '7' => ['07'],
            '8' => ['08'],
            '9' => ['09'],
            '01' => ['1'],
            '02' => ['2'],
            '03' => ['3'],
            '04' => ['4'],
            '05' => ['5'],
            '06' => ['6'],
            '07' => ['7'],
            '08' => ['8'],
            '09' => ['9'],
            '&' => ['and'],
            'and' => ['&'],
            '@' => ['at'],
            'at' => ['@'],
            '#' => ['hash', 'hashtag'],
        ],

        'stopWords' => [
            '.',
            ',',
            '-',
            '_',
            '|',
            '(',
            ')',
            '[',
            ']',
        ],

        'typoTolerance' => [
            'minWordSizeForTypos' => [
                'oneTypo' => 3,
                'twoTypos' => 4,
            ],
        ],

        'pagination' => [
            'maxTotalHits' => 50000,
        ],
    ],
];
