<?php

use SilverStripe\Forms\TreeDropdownField;
use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataExtension;
use SilverStripe\Assets\Image;
use SilverStripe\AssetAdmin\Forms\UploadField;

class AppSiteConfig extends DataExtension
{
    private static $has_one = [
        'Logo' => Image::class,
        'ContactPage' => ContactPage::class
    ];

    public function updateCMSFields(FieldList $fields)
    {
        $fields->addFieldToTab(
            'Root.Main',
            UploadField::create(
                "Logo",
                "Site Logo"
            ),
            'Tagline'
        );

        $fields->addFieldToTab(
            'Root.Main',
            TreeDropdownField::create(
                "ContactPageID",
                "Link to 'contact' page",
                'ContactPage'
            )
        );
    }
}
