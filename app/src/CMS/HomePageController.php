<?php

namespace App\CMS;

use PageController;
use ReflectionClass;
use SilverStripe\ORM\ArrayList;

class HomePageController extends PageController
{
    public function getRenderedSections()
    {
		$sections = ArrayList::create();
        $pages = $this
            ->Sections()
            ->sort('HomeSort','ASC');

        foreach ($pages as $page) {
            $templates = $page->getViewerTemplates();
            $base_class = (new ReflectionClass($page))->getShortName();

            $templates = [
                [
                    'type' => 'Includes',
                    $base_class . '_homepage',
                    'Page_homepage',
                    'HomePage_section'
                ],
                $page->ClassName.'_homepage',
                'Layout/Page_homepage',
                'HomePage_section'
            ];

            $page->Layout = $page->renderWith($templates);
            $sections->push($page);
        }

		return $sections;
    }
}
