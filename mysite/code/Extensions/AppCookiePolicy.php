<?php

use SilverStripe\Core\Extension;
use SilverStripe\View\ArrayData;
use SilverStripe\View\Requirements;
use Fractas\CookiePolicy\CookiePolicy;
use SilverStripe\SiteConfig\SiteConfig;

class AppCookiePolicy extends CookiePolicy
{
    public function onAfterInit()
    {
        $config = SiteConfig::current_site_config();
        if (self::cookie_policy_notification_enabled()) {
            $cookiepolicyjssnippet = new ArrayData(array(
                'CookiePolicyButtonTitle' => $config->CookiePolicyButtonTitle,
                'CookiePolicyDescription' => $config->CookiePolicyDescription,
                'CookiePolicyPosition' => $config->CookiePolicyPosition,
            ));

            Requirements::customScript($cookiepolicyjssnippet->renderWith('CookiePolicyJSSnippet'));
        }
    }
}