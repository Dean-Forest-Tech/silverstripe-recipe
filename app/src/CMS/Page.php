<?php

namespace {
    use SilverStripe\CMS\Model\SiteTree;

    class Page extends SiteTree
    {
        private static $controller_name = null;

        private static $db = [
            'HomeSort' => 'Int'
        ];

        private static $has_one = [
            'HomePage' => HomePage::class
        ];
    }
}
