<?php

namespace App\CMS;

use Page;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor;
use Heyday\GridFieldVersionedOrderableRows\GridFieldVersionedOrderableRows;
use SilverStripe\Lumberjack\Forms\GridFieldSiteTreeEditButton;
use SilverStripe\Lumberjack\Forms\GridFieldSiteTreeState;
use SilverStripe\Forms\GridField\GridFieldEditButton;

class HomePage extends Page
{
    private static $table_name = 'HomePage';

    private static $icon_class = 'font-icon-p-home';

    private static $has_many = [
        'Sections' => Page::class
    ];

    private static $owns = [
        'Sections'
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $config = GridFieldConfig_RelationEditor::create()
            ->addComponent(new GridFieldVersionedOrderableRows('HomeSort'))
            ->removeComponentsByType(GridFieldEditButton::class)
            ->addComponent(new GridFieldSiteTreeState())
            ->addComponent(new GridFieldSiteTreeEditButton());

        $fields->addFieldToTab(
            'Root.Sections',
            GridField::create(
                'Sections',
                'Sections',
                $this->Sections()
            )->setConfig($config)
        );
        
        return $fields;
    }
}
