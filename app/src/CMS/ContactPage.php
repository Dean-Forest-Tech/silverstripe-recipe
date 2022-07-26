<?php

namespace App\CMS;

use Page;
use SilverStripe\View\HTML;

/**
 * @property string PhoneNumber
 * @property string MobileNumber
 * @property string Email
 * @property string Address
 * @property string MapEmbedURL
 * @property string InlineAddress
 * @property string TrimmedPhoneNumber
 * @property string TrimmedMobileNumber
 * @property string MapEmbedCode
 */
class ContactPage extends Page
{
    private static $table_name = 'ContactPage';

    private static $icon_class = 'font-icon-p-mail';

    private static $db = [
        "PhoneNumber"   => "Varchar(20)",
        "MobileNumber"  => "Varchar(20)",
        "Email"         => "Varchar(50)",
        "Address"       => "Text",
        "MapEmbedURL"   => "Text"
    ];

    private static $casting = [
        'InlineAddress' => 'Varchar',
        'TrimmedPhoneNumber' => 'Varchar',
        'TrimmedMobileNumber' => 'Varchar',
        'MapEmbedCode' => 'HTMLText'
    ];

    public function isContactPage(): bool
    {
        return true;
    }

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
                    ->dbObject('MobileNumber')
                    ->scaffoldFormField($this->fieldLabel('MobileNumber')),
                $this
                    ->dbObject('Email')
                    ->scaffoldFormField($this->fieldLabel('Email')),
                $this
                    ->dbObject('Address')
                    ->scaffoldFormField($this->fieldLabel('Address')),
                $this
                    ->dbObject('MapEmbedURL')
                    ->scaffoldFormField($this->fieldLabel('MapEmbedURL'))
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

    public function getPhoneLink(): string
    {
        return "tel:" . $this->TrimmedPhoneNumber;
    }

    public function getTrimmedMobileNumber(): string
    {
        return trim(str_replace(" ","",$this->MobileNumber));
    }

    public function getMobileLink(): string
    {
        return "tel:" . $this->TrimmedMobileNumber;
    }

    public function getMapEmbedCode(): string
    {
        if (empty($this->MapEmbedURL)) {
            return "";
        }

        return HTML::createTag(
            'iframe',
            [
                'src' => $this->MapEmbedURL,
                'class' => 'embed-responsive-item',
                'loading' => "lazy",
                'referrerpolicy' => "no-referrer-when-downgrade"
            ]
        );
    }
}