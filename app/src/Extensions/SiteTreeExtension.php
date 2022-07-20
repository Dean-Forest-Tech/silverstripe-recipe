<?php

namespace App\Extensions;

use App\CMS\HomePage;
use SilverStripe\ORM\DataExtension;

class SiteTreeExtension extends DataExtension
{
    private static $db = [
        'HomeSort' => 'Int'
    ];

    private static $has_one = [
        'HomePage' => HomePage::class
    ];
}
