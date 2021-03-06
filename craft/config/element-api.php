<?php 

namespace Craft;

use craft\elements\Entry;
use craft\helpers\UrlHelper;



return [
    'endpoints' => [
        /* Blog */
        'api/posts.json' => function() {
            
            return [
                'elementType' => Entry::class,
                'criteria' => ['section' => 'blog'],
                'transformer' => function(Entry $entry) {
                    $categories = [];
                    foreach ($entry->category->all() as $category) {
                        $categories[] = (object) [
                            'id' => $category->id,
                            'slug' => $category->slug,
                        ];
                    }
                    return [
                        'url' => $entry->url,
                        'jsonUrl' => UrlHelper::url("api/posts/{$entry->id}.json"),
                        'title' => $entry->title,
                        'mainImage' => $entry->blogImage->one()->url,
                        'blogIntroduction' => $entry->blogIntroduction,
                        'blogBody' => $entry->blogBody,
                        'author' => $entry->author->name,
                        'postDate' => $entry->postDate,
                        'categories' => $categories,
                    ];
                },
            ];
        },
        'api/posts/<entryId:\d+>.json' => function($entryId) {
            return [
                'elementType' => Entry::class,
                'criteria' => ['id' => $entryId],
                'one' => true,
                'transformer' => function(Entry $entry) {
                    $categories = [];
                    foreach ($entry->category->all() as $category) {
                        $categories[] = $category->slug;
                    }
                    return [
                        'url' => $entry->url,
                        'title' => $entry->title,
                        'mainImage' => $entry->blogImage->one()->url,
                        'blogIntroduction' => $entry->blogIntroduction,
                        'blogBody' => $entry->blogBody,
                        'author' => $entry->author->name,
                        'postDate' => $entry->postDate,
                        'categories' => $categories,
                    ];
                },
            ];
        },
        /* Cocktails */
        'api/cocktails.json' => function() {
            \Craft::$app->response->headers->set('Access-Control-Allow-Origin', '*');
            return [
                'elementType' => Entry::class,
                'criteria' => ['section' => 'cocktails'],
                'transformer' => function(Entry $entry) {
                    return [
                        'url' => $entry->url,
                        'jsonUrl' => UrlHelper::url("api/cocktails/{$entry->id}.json"),
                        'id' => $entry->id,
                        'title' => $entry->title,
                        'info' => $entry->info,
                        'image' => $entry->image->one()->url
                    ];
                },
            ];
        },
        'api/cocktails/<entryId:\d+>.json' => function($entryId) {
            \Craft::$app->response->headers->set('Access-Control-Allow-Origin', '*');
            return [
                'elementType' => Entry::class,
                'criteria' => ['id' => $entryId],
                'transformer' => function(Entry $entry) {
                    return [
                        'url' => $entry->url,
                        'id' => $entry->id,
                        'title' => $entry->title,
                        'info' => $entry->info,
                        'ingredients' => $entry->ingredients,
                        'instructions' => $entry->instructions,
                        'image' => $entry->image->one()->url
                    ];
                },
            ];
        },
    ]
];