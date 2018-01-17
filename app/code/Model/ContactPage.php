<?php

use \SilverStripe\ORM\FieldType\DBVarchar;
use \SilverStripe\ORM\FieldType\DBHTMLText;
use \SilverStripe\ORM\FieldType\DBText;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\EmailField;
use SilverStripe\Forms\TextareaField;

class ContactPage extends Page
{
    private static $db = [
        "PhoneNumber"   => "Varchar(20)",
        "Email"         => "Varchar(50)",
        "Address"       => "Text",
        "MapEmbed"      => "HTMLText"        
    ];

    private static $has_one = [];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->addFieldsToTab(
            'Root.ContactInfo',
            [
                TextField::create(
                    'PhoneNumber'
                ),
                EmailField::create(
                    'Email'
                ),
                TextareaField::create(
                    'Address'
                ),
                TextareaField::create(
                    'MapEmbed'
                )
            ]
        );

        return $fields;
    }
}