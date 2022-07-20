<?php

namespace App\CMS;

use Page;

class ContactPage extends Page
{
    private static $icon_class = 'font-icon-p-mail';

    private static $db = [
        "PhoneNumber"   => "Varchar(20)",
        "Email"         => "Varchar(50)",
        "Address"       => "Text",
        "MapEmbed"      => "HTMLText"        
    ];

    private static $casting = [
        'InlineAddress' => 'Varchar',
        'TrimmedPhoneNumber' => 'Varchar'
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->addFieldsToTab(
            'Root.ContactInfo',
            [
                $this
                    ->dbObject('PhoneNumber')
                    ->scaffoldFormField($this->fieldLabel('PhoneNumber')),
                $this
                    ->dbObject('Email')
                    ->scaffoldFormField($this->fieldLabel('Email')),
                $this
                    ->dbObject('Address')
                    ->scaffoldFormField($this->fieldLabel('Address')),
                $this
                    ->dbObject('MapEmbed')
                    ->scaffoldFormField($this->fieldLabel('MapEmbed'))
            ]
        );

        return $fields;
    }

    public function getInlineAddress(): string
    {
        return trim(preg_replace('/\s\s+/', ', ', $this->Address));
    }

    public function getTrimmedPhoneNumber(): string
    {
        return trim(str_replace(" ","",$this->PhoneNumber));
    }
}