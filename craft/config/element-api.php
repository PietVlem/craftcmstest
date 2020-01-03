<?php 

namespace Craft;

use craft\elements\Entry;
use craft\helpers\UrlHelper;

return [
    'endpoints' => [
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
                        'mainImage' => $entry->blogImage,
                        'blogIntroduction' => $entry->blogIntroduction,
                        'blogBody' => $entry->blogBody,
                        'author' => $entry->author,
                        'postDate' => $entry->postDate,
                        'categories2' => $entry->category->all(),
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
                        'mainImage' => $entry->blogImage,
                        'blogIntroduction' => $entry->blogIntroduction,
                        'blogBody' => $entry->blogBody,
                        'author' => $entry->author,
                        'postDate' => $entry->postDate,
                        'categories' => $categories,
                    ];
                },
            ];
        },
    ]
];