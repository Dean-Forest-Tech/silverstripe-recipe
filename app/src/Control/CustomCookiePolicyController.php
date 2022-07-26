<?php

namespace App\Control;

use SilverStripe\Control\HTTPRequest;
use Fractas\CookiePolicy\CookiePolicyController;
use SilverStripe\SiteConfig\SiteConfig;

class CustomCookiePolicyController extends CookiePolicyController
{
    private static $allowed_actions = [
        'index',
    ];

    private static $url_handlers = [
        'fetchcookiepolicy' => 'index',
    ];

    public function index(HTTPRequest $request)
    {
        $config = SiteConfig::current_site_config();
        $active = (bool)$config->CookiePolicyIsActive;

        if ($active === false) {
            return $this->getResponse();
        }

        return parent::index($request);
    }
}
