# Kirby Footnotes

This plugin extends [Kirby 3](http://getkirby.com) with some basic, extremely easy and unopinionated footnote functionalities.

![footnotes-screenshot](https://user-images.githubusercontent.com/14079751/76997929-79cf0080-6954-11ea-87ce-bcb86b9d959f.jpg)

## Overview

> This plugin is completely free and published under the MIT license. However, if you are using it in a commercial project and want to help me keep up with maintenance, please consider [making a donation of your choice](https://www.paypal.me/sylvainjl) or purchasing your license(s) through [my affiliate link](https://a.paddle.com/v2/click/1129/36369?link=1170).

- [1. Installation](#1-installation)
- [2. Basic usage](#2-basic-usage)
- [3. Frontend customization](#3-frontend-customization)
- [4. Options](#4-options)
- [5. Methods](#5-methods)
- [6. Compatibility with blocks](#6-compatibility-with-blocks)
- [7. License](#7-license)
- [8. Credits](#8-credits)

<br/>

## 1. Installation

Download and copy this repository to ```/site/plugins/footnotes```

Alternatively, you can install it with composer: ```composer require sylvainjule/footnotes```

<br/>

## 2. Basic usage

Use the footnotes method on your field: `$page->text()->footnotes()` or `$page->text()->ft()` (no need to call `->kirbytext()` before or after, this method will take care of it).

Adding footnotes to your Kirbytext field is simple. Just type them inline in your post in square brackets like this:

```
[^This is a footnote.]
[^ This is another.]
```

Each footnote must start with a caret (`^`) and will be numbered automatically. Footnotes can contain anything you want including links or images, but please note that **you should not include square brackets [] inside a footnote.**

For example, with the default setup this text:

> This is a footnote.[^Right here!] Here is a test with a footnote that contains a link.[^ Yes, there is indeed (link: https://getkirby.com text: a link.)] And, well, just to be sure things are working I'm throwing a third footnote in here.[^ All good!]

Will output:

![Footnotes example](https://user-images.githubusercontent.com/14079751/76996677-32e00b80-6952-11ea-8ed5-870981fd0305.jpg)

<br/>

## 3. Frontend customization

As you can see with the raw output above, the plugin is completely unopinionated. It doesn't ship with any CSS or JS code but provides the markup to adjust its styling to suit your website.

Here is a reference of the outputted markup and classes to grab for styling:

```html
<p>
    This is a footnote.<sup class="footnote"><a id="fnref-1" href="#fn-1">1</a></sup> Here is a test with a footnote that contains a link.<sup class="footnote"><a id="fnref-2" href="#fn-2">2</a></sup> And, well, just to be sure things are working I'm throwing a third footnote in here.<sup class="footnote"><a id="fnref-3" href="#fn-3">3</a></sup>
</p>
<div id="footnotes" class="footnotes-container">
    <ol class="footnotes-list">
        <li id="fn-1" value="1">
            Right here! <span class="footnotereverse"><a href="#fnref-1">↩</a></span>
        </li>
        <li id="fn-2" value="2">
            Yes, there is indeed <a href="https://getkirby.com">a link.</a><span class="footnotereverse"><a href="#fnref-2">↩</a></span>
        </li>
        <li id="fn-3" value="3">
            All good! <span class="footnotereverse"><a href="#fnref-3">↩</a></span>
        </li>
    </ol>
</div>
```

In your stylesheet:

```css
sup.footnote {}         /* Footnote reference within text */
.footnotes-container {} /* Footnotes container */
.footnotes-list {}      /* Footnotes ordered list */
.footnotes-list li {}   /* Footnote entry */
.footnotereverse {}     /* Footnote back link ↩ */
```

<br/>

## 4. Options

There are a few options:

### 4.1. Wrapper

For semantic purposes, you can manually set which HTML tag to use as footnotes container, `aside`, `footer`, etc. (default is a simple `div`)

```php
'sylvainjule.footnotes.wrapper'  => 'div'
```

### 4.2. Back

The string displayed at the end of a footnote, linking to its reference within the text. Default is `&#8617;` / ↩.

```php
'sylvainjule.footnotes.back'  => '&#8617;'
```

If you don't want any return link to appear, set this value to `false`.

### 4.3. Links

If you don't want the footnote references and footnotes to be links, for example if you are displaying them as sidenotes instead of footnotes, set this to `false`. Default is `true`.

```php
'sylvainjule.footnotes.links'  => false
```

If set to `false`, the footnote's _back_ link won't be appended to the footnote, and the syntax of the footnote reference within the text changes :

```html
<!-- from -->
<sup class="footnote">
    <a id="fnref-1" href="#fn-1">1</a>
</sup>

<!-- to -->
<sup id="fnref-1" class="footnote" data-ref="#fn-1">1</sup>
```

<br/>

## 5. Methods

```php
// returns the text with footnotes references and a bottom footnote container
echo $page->text()->footnotes();

// returns the text without footnotes references nor bottom footnotes container
echo $page->text()->removeFootnotes();

// returns the text with footnotes references but no bottom footnotes container
echo $page->text()->withoutFootnotes();

// returns only the footnotes container
echo $page->text()->onlyFootnotes();
```

<br/>

## 6. Compatibility with Blocks

Kirby 3.5 introduced a new `blocks` field, to which the usual `->footnotes()` method won't apply.

There is currently no Blocks methods to hook this plugin onto, so I have put together a **temporary** way of solving the issue until this is added. Please note that it'll require some extra work by manually looping into the Blocks object:

```php
<?php $blocks  = $page->text()->toBlocks();
      $startAt = 1;
      $notes   = [];
      $applyTo = ['text', 'markdown']; ?>

      <div class="text-container">
        <?php foreach($blocks as $block):
              if(in_array($block->type(), $applyTo)):
                  // we get the text with footnotes references but no bottom footnotes container
                  $text     = $block->text()->withoutBlocksFootnotes($startAt);
                  // instead, we get an array of the block's footnotes, and append it to our $notes array
                  $notesArr = $block->text()->onlyBlocksFootnotes($startAt);
                  if($notesArr !== '') {
                    foreach($notesArr as $f) { $notes[] = $f; }
                  }
                  // the first note of the next block will now start at (number of current notes + 1)
                  $startAt = count($notes) + 1;
                  echo $text;
              else:
                echo $block;
              endif;
              endforeach; ?>
        </div>

        // if there were notes
        <?php if(count($notes)): ?>
        <div class="notes-container">
            // we manually call the 'footnotes_container' snippet
            <?php snippet('footnotes_container', ['footnotes' => implode('', $notes)]) ?>
        </div>
        <?php endif; ?>
```

<br/>

## 7. License

MIT

<br/>

## 8. Credits

This plugin has been built on top of the K2 version by [@distantnative](https://github.com/distantnative/footnotes). 🙏
