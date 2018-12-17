<?php
 

use SilverStripe\View\Parsers\ShortcodeParser;
use ilateral\SilverStripe\DeferedImages\DeferedImageShortcodeProvider;

ShortcodeParser::get('default')
    ->register('image', [DeferedImageShortcodeProvider::class, 'handle_shortcode']);