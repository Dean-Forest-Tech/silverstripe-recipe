<?php

use SilverStripe\Core\Extension;
use SilverStripe\View\Requirements;
use Fractas\CookiePolicy\CookiePolicy;
use SilverStripe\View\ArrayData;

class AppCookiePolicy extends CookiePolicy
{
    public function onAfterInit()
    {
        if (self::cookie_policy_notification_enabled()) {
            $cookiepolicyjssnippet = new ArrayData(array(
                'CookiePolicyButtonTitle' => self::$current_site_config->CookiePolicyButtonTitle,
                'CookiePolicyDescription' => self::$current_site_config->CookiePolicyDescription,
                'CookiePolicyPosition' => self::$current_site_config->CookiePolicyPosition,
            ));

            Requirements::customScript($cookiepolicyjssnippet->renderWith('CookiePolicyJSSnippet'));
        }
    }
}