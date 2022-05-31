<?php

/**
 * The config file is optional. It accepts a return array with config options
 * Note: Never include more than one return statement, all options go within this single return array
 * In this example, we set debugging to true, so that errors are displayed onscreen.
 * This setting must be set to false in production.
 * All config options: https://getkirby.com/docs/reference/system/options
 */
return [
  'debug' => true,

  // Markdown plugin
  'community.markdown-field.buttons'    => [['h1', 'h2', 'h3', 'h4', 'h5', 'h6'], 'bold', 'italic', 'divider', 'link','pagelink', 'email', 'file', 'divider', 'ul', 'ol', 'blockquote'],
  'community.markdown-field.font'       => [
      'family'  => 'sans-serif',
      'scaling' => true,
      'size'    => 'regular',
  ],
  'community.markdown-field.query'      => [
      'pagelink' => null,
      'images'   => 'page.images',
      'files'    => 'page.files.filterBy("type", "!=", "image")',
  ],
  'community.markdown-field.modals'     => true,
  'community.markdown-field.blank'      => false,
  'community.markdown-field.invisibles' => false,

  // autoresize
  // 'medienbaecker.autoresize.maxWidth' => 2000,
  // 'medienbaecker.autoresize.maxHeight' => 2000,
  // 'medienbaecker.autoresize.quality' => 90,

  // thumbs
  'thumbs' => [
    'quality' => 80,
    'driver' => 'im',
    'bin' => '/usr/bin/convert',
    'presets' => [
      'tiny' => [ 'width' => 200, 'height' => 112],
      'small' => [ 'width' => 300 ],
      'default' => [ 'width' => 600 ],
      'square' => [ 'width' => 300, 'height' => 300, 'crop' => 'center' ],
      'listitem' => [ 'width' => 300, 'height' => 170, 'crop' => 'center' ],
      'cover' => [ 'width' => 600],
    ],
    'srcsets' => [
      'tiny' => [200, 350],
      'small' => [300, 450],
      'default' => [300, 600, 800, 1024],
      'cover' => [600, 800, 1000],
      'square' => [
        '300vw' => [ 'width' => 300, 'height' => 300, 'crop' => 'center' ],
        '600vw' => [ 'width' => 600, 'height' => 600, 'crop' => 'center' ],
        '800vw' => [ 'width' => 800, 'height' => 800, 'crop' => 'center' ],
      ],
    ]
    ]
];
