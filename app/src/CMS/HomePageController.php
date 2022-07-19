<?php

namespace App\CMS;

use PageController;
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
            $page->Layout = $page->renderWith([
                $page->ClassName.'_homepage',
                'Layout/Page_homepage',
                'HomePage_section'
            ]);
            
            $sections->push($page);
        }

		return $sections;
    }
}
