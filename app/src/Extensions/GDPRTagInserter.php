<?php

namespace App\Extensions;

use SilverStripe\Control\Cookie;
use SilverStripe\View\ViewableData;
use SilverStripe\Control\HTTPRequest;
use SilverStripe\ORM\FieldType\DBField;
use SilverStripe\SiteConfig\SiteConfig;
use SilverStripe\TagManager\Extension\TagInserter;

/**
 * Overwrite default Tag Manager Tag inserter
 * so that it listens for cookie policy agreement
 * and only injects tag code if set
 */
class GDPRTagInserter extends TagInserter
{
    public function afterCallActionHandler(HTTPRequest $request, $action, $response)
    {
        /** @var ViewableData */
        $owner = $this->getOwner();
        $gdpr_cookie = (bool)Cookie::get('cookie_policy');
        $config = SiteConfig::current_site_config();

        // If response invalid, return default
        if (!$response instanceof DBField) {
            return $response;
        }

        // If cookie policy enabled but not agreed
        // then return default
        if (isset($config->CookiePolicyIsActive)
            && $config->CookiePolicyIsActive
            && $gdpr_cookie === false) {
            return $response;
        }

        // Finally, inject tags if valid data
        if ($owner->hasMethod('data')) {
            $response->setValue(
                $this->insertSnippetsIntoHTML(
                    $response->getValue(),
                    $owner->data()
                )
            );
        }

        return $response;
    }
}
