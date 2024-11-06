<?php
 

use SilverStripe\Core\Config\Config;
use SilverStripe\View\Parsers\ShortcodeParser;
use SilverStripe\TagManager\Extension\TagInserter;
use SilverStripe\CMS\Controllers\ContentController;
use DFT\SilverStripe\DeferedImages\DeferedImageShortcodeProvider;

ShortcodeParser::get('default')
    ->register('image', [DeferedImageShortcodeProvider::class, 'handle_shortcode']);

$controller_extensions = Config::inst()
    ->get(ContentController::class, 'extensions');

$controller_extensions = array_diff(
    $controller_extensions,
    [TagInserter::class]
);

Config::modify()->set(
    ContentController::class,
    'extensions',
    $controller_extensions
);