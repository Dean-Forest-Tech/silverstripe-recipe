<?php

namespace App\Extensions;

use App\CMS\ContactPage;
use SilverStripe\Assets\Image;
use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataExtension;
use SilverStripe\CMS\Model\SiteTree;
use SilverStripe\Forms\CheckboxField;
use SilverStripe\AssetAdmin\Forms\UploadField;
use SilverStripe\Forms\DropdownField;

class SiteConfigExtension extends DataExtension
{
    private static $db = [
        'TileBackground' => 'Boolean'
    ];

    private static $has_one = [
        'Logo' => Image::class,
        'Icon' => Image::class,
        'Background' => Image::class,
        'ContactPage' => ContactPage::class
    ];
    
    private static $owns = [
        'Logo',
        'Icon',
        'Background'
    ];

    private static $field_labels = [
        'ContactPage' => '"Contact Page" for this site'
    ];

    public function updateCMSFields(FieldList $fields)
    {
        /** @var SiteTree */
        $owner = $this->getOwner();

        $fields->addFieldsToTab(
            'Root.Main',
            [
                UploadField::create(
                    "Logo",
                    "Site Logo"
                ),
                UploadField::create(
                    "Icon",
                    "Site Icon"
                )->setRightTitle('Used for favicon and touch icons - this must be a .png or .gif')
                ->setAllowedExtensions(['png', 'gif'])
            ],
            'Tagline'
        );

        $fields->addFieldsToTab(
            'Root.Main',
            [
                UploadField::create(
                    "Background",
                    "Site Background"
                ),
                CheckboxField::create("TileBackground"),
                DropdownField::create(
                    "ContactPageID",
                    $owner->fieldLabel('ContactPage')
                )->setSource(ContactPage::get()->map())
                ->setEmptyString('')
            ]
        );
    }
}
