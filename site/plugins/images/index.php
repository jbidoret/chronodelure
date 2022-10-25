<?php

Kirby::plugin('timelure/images', [
    'tags' => [
        'image' => [
            'attr' => [
                'alt',
                'caption',
                'class',
                'height',
                'imgclass',
                'link',
                'linkclass',
                'rel',
                'target',
                'title',
                'width',
                'layout'
            ],
            'html' => function ($tag) {
                if ($tag->file = $tag->file($tag->value)) {
                    $tag->file     = $tag->file;
                    $tag->src     = $tag->file->url();
                    $tag->alt     = $tag->alt     ?? $tag->file->alt()->or(' ')->value();
                    $tag->title   = $tag->title   ?? $tag->file->title()->value();
                    $tag->caption = $tag->caption ?? $tag->file->caption()->value();
                    $tag->color = $tag->color ?? $tag->file->color()->value();
                    $tag->layout = $tag->layout ?? $tag->file->layout()->value();

                    $figcaption = $tag->caption != "" ? "<figcaption>". kirbytext($tag->caption). "</figcaption>" : "";

                    $thumb_preset = option('thumbs.presets.default');
                    $thumb_srcset = $tag->file->srcset(option('thumbs.srcsets.default'));
                    $thumb_src = $tag->file->thumb($thumb_preset['width'])->url();
                
                    $html =
                        '<figure class="' . $tag->layout. '">
                            <img src="' . $thumb_src . '" srcset="' . $thumb_srcset . '" alt="' . $tag->alt . '">
                            '. $figcaption .'
                        </figure>';

                    $html = str_replace(array("\r", "\n"), '', $html);

                    return $html;
                   
                }
            }
        ]
    ]
]);
