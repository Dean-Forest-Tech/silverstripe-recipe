<?php

use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridFieldConfig_RelationEditor;
use Heyday\GridFieldVersionedOrderableRows\GridFieldVersionedOrderableRows;
use SilverStripe\Lumberjack\Forms\GridFieldSiteTreeEditButton;
use SilverStripe\Lumberjack\Forms\GridFieldSiteTreeState;
use SilverStripe\Forms\GridField\GridFieldEditButton;

class HomePage extends Page
{
    private static $db = [];

    private static $has_one = [];

    private static $has_many = [
        'Sections' => Page::class
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $config = GridFieldConfig_RelationEditor::create();
        $config->addComponent(new GridFieldVersionedOrderableRows('HomeSort'))
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